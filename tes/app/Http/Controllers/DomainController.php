<?php

namespace App\Http\Controllers;
use App\Models\Domain;
use Exception;
use App\Models\Iprange;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function index()
    {
        if(auth()->user()->cannot('super_admin')) abort(403);
        
        return view('domain');        
    }

    public function get_domains()
    {
        $domains =  Domain::whereNotNull('domain_sup')->get();
        return response()->json(["success" => true, "domains" => $domains]);    
    }


// ********************************************************************************************************


    public function add(Request $request)
    {
        $domain = $request->domain;
        info($domain);

        $domains = array_filter(array_map("trim" ,explode("\n", $domain)));
        info($domains);

        $results =  Domain::whereIn('domain', $domains)->get()->pluck("domain")->toArray();
        $final_result = array_diff($domains, $results);

        info($final_result);
        foreach($final_result as $domain)
        {
            $this->SpfDomain($domain); 
        }
        
        $msg = "Processing completed successfully";
        
        $domains = Domain::whereNotNull('domain_sup')->get();

        return response()->json(["success" => true, "domains" => $domains, "msg" => $msg]);
    }

    
    public function SpfDomain($domain)
    {
        ini_set('max_execution_time', -1);

        // $existingDomain = Domain::where('domain', $domain)->orWhere('domain_sup',$domain)->first();
        // if(!$existingDomain)
        // {
            try
            {
                $records = dns_get_record($domain, DNS_TXT);
                if(count($records) > 0)
                {
                    $domain_id = Domain::insertGetId(['domain' => $domain, "created_at"=> now(), "updated_at"=> now()]);
                    foreach($records as $record)
                    {
                        if(strpos($record['txt'], 'v=') === 0)
                        {
                            $this->includeDomain($domain, $record['txt']);
                        }
                        if(strpos($record['txt'], 'v=spf1') === 0)
                        {
                            $this->saveRanges($domain_id, $record['txt']);
                        }
                    }
                }
            } catch (Exception $e)
            {
                info("Error doman: $domain\n$e");
            }
        // }
    }


    public function saveRanges($domain_id, $txt)
    {
        preg_match_all('/ip4:([\d\.]+\/\d+)/', $txt, $matches_ipv4);
        $ipranges_ipv4 = $matches_ipv4[1];
        if($ipranges_ipv4)
        {
            if($domain_id){
                $ipRangesData = [];
                foreach($ipranges_ipv4 as $ip)
                {
                    list($startIp, $subnet) = explode('/', $ip);
                    $startIpLong = ip2long($startIp);
                    $subnetLong = -1 << (32 - $subnet);
                    $endIpLong = $startIpLong | (~$subnetLong);
                    $ipRangesData[] = ['domain_id' => $domain_id, 'ip_range' => $ip, 'start' => $startIpLong, 'end' => $endIpLong, "created_at"=> now(), "updated_at"=> now()];
                }
                Iprange::insert($ipRangesData);
            }
        }
    }


    public function includeDomain($domain_sup, $txt)
    {
        preg_match_all('/include:([^\s]+)/', $txt, $include);
        preg_match_all('/redirect=([^\s]+)/', $txt, $redirect);
        $includes = $include[1];
        $redirects = $redirect[1];
        $domains = array_merge($includes, $redirects);

        foreach($domains as $domain)
        {
            $this->saveDomain($domain_sup, $domain);
        }
    }


    public function saveDomain($domain_sup, $domain)
    {
        $existingDomain = Domain::where('domain', $domain)->orWhere('domain_sup',$domain)->first();

        if($existingDomain && $existingDomain->domain_sup === null)
        {
            Domain::where('domain', $domain)->update(['domain_sup' => $domain_sup]);
        }
        elseif($existingDomain && $existingDomain->domain_sup != $domain_sup)
        {
            Domain::create(['domain' => $domain, 'domain_sup' => $domain_sup]);
        }
        
        if(!$existingDomain)
        {
            $this->spfDomain($domain);

            $existingDomain = Domain::where('domain', $domain)->first();
            if($existingDomain && $existingDomain->domain_sup === null)
            {
                Domain::where('domain', $domain)->update(['domain_sup' => $domain_sup]);
            }
            elseif($existingDomain && $existingDomain->domain_sup != $domain_sup)
            {
                Domain::create(['domain' => $domain, 'domain_sup' => $domain_sup]);
            }
        }
    }


// ********************************************************************************************************


    public function check_ip()
    {
        return view('check');
    }


    public function ipranges()
    {
        $ipranges = Iprange::join('domains', 'domains.id', '=', 'ipranges.domain_id')
        ->select('domains.domain as domain_name', 'ipranges.*')->get();
        return response()->json(["success" => true, "ipranges" => $ipranges]);
    }


    public function check(Request $request)
    {
        $ip = $request->ip;

        $ips = array_filter(array_map("trim" ,explode("\n", $ip)));

        $iprangesWithDomains = [];

        foreach ($ips as $value) {
            $checkip = ip2long($value);

            $ipranges = Iprange::where("start", "<=", $checkip)
                ->where("end", ">=", $checkip)
                ->get();
    
            if (count($ipranges) > 0) {
                $domainsIp = [];
                foreach($ipranges as $iprange) 
                {
                    $domain = Domain::where('id', $iprange->domain_id)->value('domain');
    
                    $domainsIp[] = $domain;
    
                    $domainSupérieurs = Domain::select('domain_sup')
                        ->where('domain', $domain)
                        ->union(function ($query) use ($domain) {
                            $query->select('d.domain_sup')
                                ->from('domains as d')
                                ->join('domains as dh', 'd.domain', '=', 'dh.domain_sup')
                                ->where('dh.domain', $domain);
                        })
                        ->distinct()
                        ->get();
    
                    foreach($domainSupérieurs as $domainSupérieur)
                    {
                        $domainsIp[] = $domainSupérieur->domain_sup;
                    }
    
                    $iprange->domain_name = $domain;
                    $iprangesWithDomains[] = $iprange;

                    info("This IP ".$value." exists in:");
                    info($domainsIp);
                }
            }

        }


        return response()->json(["success" => true, "ipranges" => $iprangesWithDomains]);
    }

}