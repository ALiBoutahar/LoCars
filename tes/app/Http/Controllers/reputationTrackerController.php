<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class reputationTrackerController extends Controller
{
    public function index()
    {
        Session::flash('max_requests_ips', 0);
        Session::flash('max_requests_domains', 0);

        return view('reputation');
    }

    public function checkIps(Request $request)
    {
        $value = Session::get('max_requests_ips');
        
        if($value >= 100) return response()->json(['success'=>false, 'msg'=>'You have reached max requests witch is 100/page_load, Login/Register to get more requests !!']);
        $value += 1;
        Session::put('max_requests_ips', $value);

        if($request->ips == null) return response()->json(['success'=>false, 'msg'=>'Ips Field is required !!']);
        $ips = explode("\n" ,$request->ips);

        $arr = [];

        foreach($ips as $ip)
        {
            $checkSpamIp = new \stdClass;
            $checkSpamIp->ip = $ip;
            // set spamhaus
            try
            {
                $reverse_ip = implode(".", array_reverse(explode(".", $ip)));

                $checkSpamIp->ptr = trim(shell_exec("dig +short -x " . $ip));

                $response_pbl = shell_exec("dig +short " . $reverse_ip . ".pbl.spamhaus.org")."";
                if(str_contains($response_pbl, "127.0.0.10") || str_contains($response_pbl, "127.0.0.11")) $checkSpamIp->pbl_spamhaus = "Blacklisted";
                else $checkSpamIp->pbl_spamhaus = "OK";

                $response_sbl = shell_exec("dig +short " . $reverse_ip . ".sbl.spamhaus.org")."";
                if(str_contains($response_sbl, "127.0.0.2") || str_contains($response_sbl, "127.0.0.3") || str_contains($response_sbl, "127.0.0.9")) $checkSpamIp->sbl_spamhaus = "Blacklisted";
                else $checkSpamIp->sbl_spamhaus = "OK";

                $response_xbl = shell_exec("dig +short " . $reverse_ip . ".xbl.spamhaus.org")."";
                if(str_contains($response_xbl, "127.0.0.4")) $checkSpamIp->xbl_spamhaus = "Blacklisted";
                else $checkSpamIp->xbl_spamhaus = "OK";

                if($checkSpamIp->sbl_spamhaus == "Blacklisted" || $checkSpamIp->xbl_spamhaus == "Blacklisted") $checkSpamIp->sbl_xbl_spamhaus = "Blacklisted";
                else $checkSpamIp->sbl_xbl_spamhaus = "OK";

                if($checkSpamIp->pbl_spamhaus == "Blacklisted" || $checkSpamIp->sbl_spamhaus == "Blacklisted" || $checkSpamIp->xbl_spamhaus == "Blacklisted" || $checkSpamIp->sbl_xbl_spamhaus == "Blacklisted") $checkSpamIp->zen_spamhaus = "Blacklisted";
                else $checkSpamIp->zen_spamhaus = "OK";
            }
            catch(\Exception $e)
            {
                info($e);
            }

            // set sender score
            try
            {
                $url = implode(".", array_reverse(explode(".", $ip))) . ".score.senderscore.com";

                $command = "dig +short " . $url;
                $response = shell_exec($command)."";

                if(str_contains($response, "127.0.4."))
                {
                    $score = str_replace("127.0.4.", "", $response);
                    if((int) $score >= 0 && (int) $score >= 100); $checkSpamIp->sender_score = trim($score);
                }
            }
            catch(\Exception $e)
            {
                info($e);
            }

            // set fcrdns_test
            try
            {
                $fcrdnsCommand1 = "dig -x " . $ip . " +short";
                $fcrdnsCommandResult1 = shell_exec($fcrdnsCommand1);

                if($fcrdnsCommandResult1 == null)
                {
                    $checkSpamIp->fcrdns_test_1 = "Failed";
                    $checkSpamIp->fcrdns_test_2 = null;
                    $checkSpamIp->fcrdns_test_3 = null;
                }
                else
                {
                    $checkSpamIp->fcrdns_test_1 = "OK";

                    $fcrdnsCommand2 = "dig ".trim($fcrdnsCommandResult1)." +short";
                    $fcrdnsCommandResult2 = shell_exec($fcrdnsCommand2);

                    if($fcrdnsCommandResult2 == null)
                    {
                        $checkSpamIp->fcrdns_test_2 = "Failed";
                        $checkSpamIp->fcrdns_test_3 = null;
                    }
                    else
                    {
                        $checkSpamIp->fcrdns_test_2 = "OK";

                        if(trim($fcrdnsCommandResult2) == $ip)
                        {
                            $checkSpamIp->fcrdns_test_3 = "OK";
                        }
                        else
                        {
                            $checkSpamIp->fcrdns_test_3 = "Failed";
                        }
                    }
                }
            }
            catch(\Exception $e)
            {
                info($e);
            }
            array_push($arr, $checkSpamIp);
        }

        return response()->json(['success'=>true, 'results'=>$arr]);
    }
    
    public function checkDomains(Request $request)
    {
        $value = Session::get('max_requests_domains');
        
        if($value >= 100) return response()->json(['success'=>false, 'msg'=>'You have reached max requests witch is 100/page_load, Login/Register to get more requests !!']);
        $value += 1;
        Session::put('max_requests_domains', $value);

        if($request->domains == null) return response()->json(['success'=>false, 'msg'=>'Domains Field is required !!']);
        $domains = explode("\n", $request->domains);

        $bad_responses = [
            "127.0.1.2",
            "127.0.1.4",
            "127.0.1.5",
            "127.0.1.6",
            "127.0.1.102",
            "127.0.1.103",
            "127.0.1.104",
            "127.0.1.105",
            "127.0.1.106",
        ];
        $arr = [];

        foreach($domains as $domain)
        {
            $checkSpamDomain = new \StdClass;
            $checkSpamDomain->domain = $domain;

            try
            {
                $command = "dig +short " . $domain . ".dbl.spamhaus.org";
                $response = shell_exec($command)."";

                if($response == "") $checkSpamDomain->dbl_spamhaus = "OK";
                elseif(in_array(trim($response), $bad_responses)) $checkSpamDomain->dbl_spamhaus = "Blacklisted";

                $command_2 = shell_exec("dig +short A " . $domain);
                if($command_2 == "") $checkSpamDomain->a_record = "Null";
                else $checkSpamDomain->a_record = trim($command_2);

                $command_3 = shell_exec("dig +short " . $domain . ".hostkarma.junkemailfilter.com");
                if($command_3 == "") $checkSpamDomain->hostkarma = "Null";
                elseif(trim($command_3) == '127.0.0.1') $checkSpamDomain->hostkarma = 'Whitelist';
                elseif(trim($command_3) == '127.0.0.2') $checkSpamDomain->hostkarma = 'Blacklist';
                elseif(trim($command_3) == '127.0.0.3') $checkSpamDomain->hostkarma = 'Yellowlist';
                elseif(trim($command_3) == '127.0.0.4') $checkSpamDomain->hostkarma = 'Brownlist';
                elseif(trim($command_3) == '127.0.0.5') $checkSpamDomain->hostkarma = 'NOBL';
                else $checkSpamDomain->hostkarma = "Null";

                $command_4 = shell_exec("dig +short ".$domain.".bl.spamcop.net");
                if($command_4 == "127.0.0.2") $checkSpamDomain->spamcop = 'Blacklist';
                else $checkSpamDomain->spamcop = 'OK';

                $command_5 = shell_exec("dig +short ".$domain.".multi.surbl.org");
                if($command_5 == "127.0.0.2") $checkSpamDomain->surbl = 'Blacklist';
                else $checkSpamDomain->surbl = 'OK';

                $command_6 = shell_exec("dig +short ".$domain.".abusebutler.com");
                if($command_6 == "127.0.0.2") $checkSpamDomain->abusebutler = 'Blacklist';
                else $checkSpamDomain->abusebutler = 'OK';

                $command_7 = shell_exec("dig +short ".$domain.".multi.uribl.com");
                if($command_7 == "127.0.0.2") $checkSpamDomain->uribl = 'Blacklist';
                else $checkSpamDomain->uribl = 'OK';
            }
            catch(Exception $e)
            {

            }

            array_push($arr, $checkSpamDomain);
        }

        return response()->json(['success'=>true, 'results'=>$arr]);
    }
}
