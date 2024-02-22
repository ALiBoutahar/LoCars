<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Reputation Tracker</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css')}}">
      <!-- Responsive-->
      <!-- <link rel="stylesheet" href="{{ asset('css/responsive.css')}}"> -->
      <link rel="icon" href="{{ asset('images/fevicon.png')}}" type="image/gif" />

      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" media="screen">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{ asset('waitMe/waitMe.min.css') }}">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      {{-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div> --}}
      <!-- end loader -->

        @include('menu')

        <!-- header -->
        <header>
            <!-- header inner -->
            <div class="header" style="background-color:#7b57ff;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" style="display:flex;justify-content:space-between;">
                            <div class="sea_icon d_none ">
                                <a href="/"><h1 style="color:#fff;">Reputation Tracker</h1></a>
                            </div>
                            <div class="right_bottun">
                                <button class="openbtn" onclick="openNav()" style="padding:0 !important;"><img src="images/menu_icon.png" alt="#" style="width:60%;"/> </button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="content d-flex justify-content-center">
            {{-- <h1 style="text-align: center;margin-top:20px;">Reputation Tracking System</h1> --}}

            <div class="custom_card">
                <img id="cookieSvg" srcset="https://img.icons8.com/?size=256&amp;id=47745&amp;format=png 1x, https://img.icons8.com/?size=512&amp;id=47745&amp;format=png 2x" width="256" height="256" alt="Domain icon" class="app-preview__image-origin" style="filter: invert(0%) sepia(95%) saturate(0%) hue-rotate(134deg) brightness(93%) contrast(104%);">

                <p class="cookieHeading">Reputation Tracking System.</p>
                <p class="cookieDescription">This website uses advanced algorithms to ensure you get the most accurate results.</p>
                
                <div class="card_body">
                    <div class="textarea_container">
                        <textarea name="" id="domains_area" cols="30" rows="10" placeholder="Domains"></textarea>
                        <div><button class="acceptButton" onclick="checkDomains()">Check Domain(s)</button></div>
                    </div>

                    <div class="textarea_container">
                        <textarea name="" id="ips_area" cols="30" rows="10" placeholder="IPs"></textarea>
                        <div><button class="declineButton" onclick="checkIps()">Check Ip(s)</button></div>
                    </div>
                </div>
                
                <div class="buttonContainer">
                </div>
                
                
                
                <div class="row" style="width:100%;">
                    <div class="col-12 d-flex" id="toggleColors" style="display: none !important;">
                        <p class="cookieDescription">Toggle Colors Mode.</p>
                        <label class="switch">
                            <input type="checkbox" id="setMode">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="col-12" id="domains_table_container">
                        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <div class="card-header with-border">
                                <h3 class="card-title">Domains</h3>
                            </div>

                            <div class="card-body p-15">
                                <div class="table-responsive">
                                    <table id="domains" class="table mt-0 table-hover no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Domain</th>
                                                <th>A Record</th>
                                                <th>DBL Spamhaus</th>
                                                <th>HostKarma</th>
                                                <th>SpamCop</th>
                                                <th>SURBL</th>
                                                <th>AbuseBulter</th>
                                                <th>URIBL</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" id="ips_table_container">
                        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <div class="card-header with-border">
                                <h3 class="card-title">Ips</h3>
                            </div>

                            <div class="card-body p-15">
                                <div class="table-responsive">
                                    <table id="ips" class="table mt-0 table-hover no-wrap">
                                        <thead>
                                            <tr>
                                                <th>IP</th>
                                                <th title="Pointer Record. It's a type of DNS record that resolves an IP address to a domain name">PTR</th>
                                                <th title="The Ip has a ptr record">FCrDNS<br>Test 1</th>
                                                <th title="the ptr has A or AAAA records">FCrDNS<br>Test 2</th>
                                                <th title="One of the interfaces this ptr has is the main ip">FCrDNS<br>Test 3</th>
                                                <th title="Stands for Policy Block List. It's a DNSBL (DNS-based Blackhole List) that lists IP addresses that should not be sending email">PBL<br>Spamhaus</th>
                                                <th title="Spamhaus Block List. Lists confirmed spam sources">SBL<br>Spamhaus</th>
                                                <th title="Exploits Block List. Lists IP addresses of known spam sources that have been found to be hijacked or compromised">XBL<br>Spamhaus</th>
                                                <th title="A combination of SBL and XBL">SBL-XBL<br>Spamhaus</th>
                                                <th title="Spamhaus' aggregate zone for all their blocklists">ZEN<br>Spamhaus</th>
                                                <th title="A measure of the reputation of an email sender's IP address">Sender<br>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      <!--  footer -->

      @include('footer')


      <!-- end footer -->
      <!-- Javascript files-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="{{ asset('waitMe/waitMe.min.js') }}"></script>
      {{-- <script src="{{ asset('js/popper.min.js')}}"></script> --}}
      {{-- <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script> --}}
      {{-- <script src="{{ asset('js/datatables.min.js') }}"></script> --}}
      {{-- <script src="{{ asset('js/custom.js')}}"></script> --}}

      <script>
        table = $('#ips').DataTable({
                order: [[0, 'desc']],
                'autoWidth': false,
                'pageLength': -1,
                'columns': [
                    { "data": "IP" },
                    { "data": "PTR" },
                    { "data": "FCrDNS Test 1" },
                    { "data": "FCrDNS Test 2" },
                    { "data": "FCrDNS Test 3" },
                    { "data": "PBL Spamhaus" },
                    { "data": "SBL Spamhaus" },
                    { "data": "XBL Spamhaus" },
                    { "data": "SBL-XBL Spamhaus" },
                    { "data": "ZEN Spamhaus" },
                    { "data": "Sender Score" },
                ]
            });

        table_2 = $('#domains').DataTable({
            order: [[0, 'desc']],
            'autoWidth': false,
            'pageLength': -1,
            'columns': [
                { "data": "Domain" },
                { "data": "A Record" },
                { "data": "DBL Spamhaus" },
                { "data": "HostKarma" },
                { "data": "SpamCop" },
                { "data": "SURBL" },
                { "data": "AbuseBulter" },
                { "data": "URIBL" },
            ]
        });

        function openNav() {
           document.getElementById("mySidepanel").style.width = "250px";
        }

        function closeNav()
        {
           document.getElementById("mySidepanel").style.width = "0";
        }

        $('#ips_table_container').hide();
        $('#domains_table_container').hide();

        $('#setMode').change(function()
        {
            var elementsToHide = document.querySelectorAll('.circle-wrapper_1');
            var elementstoShow = document.querySelectorAll('.text_response');

            elementsToHide.forEach(function(element) {
                element.classList.toggle('hidden');
            });
            elementstoShow.forEach(function(element) {
                element.classList.toggle('hidden');
            });
        });

        clear_table = false;
        function checkIps(index = 0)
        {
            if(!clear_table)
            {
                $('.card_body').waitMe("hide");

                $('#ips_table_container').show();
                $('#domains_table_container').hide();
                $('#toggleColors').hide();

                $('.declineButton').attr("disabled", false);
                $('.acceptButton').attr("disabled", false);

                $('#domains').DataTable().clear();
                table = $('#ips').DataTable();
                table.clear();

                clear_table = true;
            }
            ips = $('#ips_area').val();

            jQuery('.card_body').waitMe({
                effect: 'bounce',
                text: 'Please wait...',
                bg: 'rgba(255,255,255,0.7)',
                fontSize: '16px',
                color: '#7b57ff'
            });

            $('.declineButton').attr("disabled", true);
            $('.acceptButton').attr("disabled", true);

            ips = ips.split("\n");

            if (index < ips.length)
            {
                var ip = ips[index];

                $.ajax({
                    url: "{{url('/checkIps')}}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        ips: ip,
                    },
                    success: function(response)
                    {
                        if(response.success)
                        {
                            var success_code = '<div class="circle-wrapper_1"><div class="success_1 circle_1"></div></div>';
                            var warning_code = '<div class="circle-wrapper_1"><div class="warning_1 circle_1"></div></div>';
                            var error_code = '<div class="circle-wrapper_1"><div class="error_1 circle_1"></div></div>';
    
                            for(var i=0; i<response.results.length; i++)
                            {
                                var line = [];
            
                                line["IP"] = response.results[i]["ip"];
                                line["PTR"] = response.results[i]["ptr"];
                                if(response.results[i]["ptr"] == '') line["PTR"] = 'NULL';
        
                                line["FCrDNS Test 1"] = response.results[i]["fcrdns_test_1"];
                                if(response.results[i]["fcrdns_test_1"] == null) line["FCrDNS Test 1"] = `<span class="text_response hidden">NULL</span>${warning_code}`;
                                else if(response.results[i]["fcrdns_test_1"] == 'OK') line["FCrDNS Test 1"] = `<span class="text_response hidden">${response.results[i]["fcrdns_test_1"]}</span>${success_code}`;
                                else if(response.results[i]["fcrdns_test_1"] == 'Failed') line["FCrDNS Test 1"] = `<span class="text_response hidden">${response.results[i]["fcrdns_test_1"]}</span>${error_code}`;
        
                                line["FCrDNS Test 2"] = response.results[i]["fcrdns_test_2"];
                                // if(response.results[i]["fcrdns_test_2"] == null) line["FCrDNS Test 2"] = 'NULL';
                                if(response.results[i]["fcrdns_test_2"] == null) line["FCrDNS Test 2"] = `<span class="text_response hidden">NULL</span>${warning_code}`;
                                else if(response.results[i]["fcrdns_test_2"] == 'OK') line["FCrDNS Test 2"] = `<span class="text_response hidden">${response.results[i]["fcrdns_test_2"]}</span>${success_code}`;
                                else if(response.results[i]["fcrdns_test_2"] == 'Failed') line["FCrDNS Test 2"] = `<span class="text_response hidden">${response.results[i]["fcrdns_test_2"]}</span>${error_code}`;
        
                                line["FCrDNS Test 3"] = response.results[i]["fcrdns_test_3"];
                                // if(response.results[i]["fcrdns_test_3"] == null) line["FCrDNS Test 3"] = 'NULL';
                                if(response.results[i]["fcrdns_test_3"] == null) line["FCrDNS Test 3"] = `<span class="text_response hidden">NULL</span>${warning_code}`;
                                else if(response.results[i]["fcrdns_test_3"] == 'OK') line["FCrDNS Test 3"] = `<span class="text_response hidden">${response.results[i]["fcrdns_test_3"]}</span>${success_code}`;
                                else if(response.results[i]["fcrdns_test_3"] == 'Failed') line["FCrDNS Test 3"] = `<span class="text_response hidden">${response.results[i]["fcrdns_test_3"]}</span>${error_code}`;
        
                                line["PBL Spamhaus"] = response.results[i]["pbl_spamhaus"];
                                if(response.results[i]["pbl_spamhaus"] == 'OK') line["PBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["pbl_spamhaus"]}</span>${success_code}`;
                                else if(response.results[i]["pbl_spamhaus"] == 'Blacklisted') line["PBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["pbl_spamhaus"]}</span>${error_code}`;
        
                                line["SBL Spamhaus"] = '<a href="http://www.spamhaus.org/query/bl?ip='+response.results[i]["ip"]+'" target="_blank" style="color:#7b57ff;">'+response.results[i]["sbl_spamhaus"]+'</a>';
                                if(response.results[i]["sbl_spamhaus"] == 'OK') line["SBL Spamhaus"] = `<a  href="http://www.spamhaus.org/query/bl?ip=${response.results[i]["ip"]}" target="_blank" style="color:#7b57ff;"><span class="text_response hidden">${response.results[i]["sbl_spamhaus"]}</span>${success_code}</a>`;
                                else if(response.results[i]["sbl_spamhaus"] == 'Blacklisted') line["SBL Spamhaus"] = `<a href="http://www.spamhaus.org/query/bl?ip=${response.results[i]["ip"]}" target="_blank" style="color:#7b57ff;"><span class="text_response hidden">${response.results[i]["sbl_spamhaus"]}</span>${error_code}</a>`;
        
                                line["XBL Spamhaus"] = response.results[i]["xbl_spamhaus"];
                                if(response.results[i]["xbl_spamhaus"] == 'OK') line["XBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["xbl_spamhaus"]}</span>${success_code}`;
                                else if(response.results[i]["xbl_spamhaus"] == 'Blacklisted') line["XBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["xbl_spamhaus"]}</span>${error_code}`;
        
                                line["SBL-XBL Spamhaus"] = response.results[i]["sbl_xbl_spamhaus"];
                                if(response.results[i]["sbl_xbl_spamhaus"] == 'OK') line["SBL-XBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["sbl_xbl_spamhaus"]}</span>${success_code}`;
                                else if(response.results[i]["sbl_xbl_spamhaus"] == 'Blacklisted') line["SBL-XBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["sbl_xbl_spamhaus"]}</span>${error_code}`;
        
                                line["ZEN Spamhaus"] = response.results[i]["zen_spamhaus"];
                                if(response.results[i]["zen_spamhaus"] == 'OK') line["ZEN Spamhaus"] = `<span class="text_response hidden">${response.results[i]["zen_spamhaus"]}</span>${success_code}`;
                                else if(response.results[i]["zen_spamhaus"] == 'Blacklisted') line["ZEN Spamhaus"] = `<span class="text_response hidden">${response.results[i]["zen_spamhaus"]}</span>${error_code}`;
        
        
                                if(response.results[i]["sender_score"] != null) line["Sender Score"] = `<a href="https://senderscore.org/assess/get-your-score/?lookup=${response.results[i]["ip"]}" target="_blank" style="color:#7b57ff;">${response.results[i]["sender_score"]}</a>`;
                                if(response.results[i]["sender_score"] == null) line["Sender Score"] = 'NULL';
        
                                table.row.add(line);
                                table.draw();
                            }
    
                            checkIps(index + 1);
                        }
                        else
                        {
                            toastr.error(response.msg);
                            $('.card_body').waitMe("hide");
                            clear_table = false;
                            $('.declineButton').attr("disabled", false);
                            $('.acceptButton').attr("disabled", false);
                            $('#toggleColors').show();
                            return;
                        }
                    },
                    error: function(xhr, status, error)
                    {
                        console.error(error);
                        toastr.error(error);
                        $('.card_body').waitMe("hide");
                        clear_table = false;
                        $('.declineButton').attr("disabled", false);
                        $('.acceptButton').attr("disabled", false);
                        return;
                    }
                });
            }
            else
            {
                clear_table = false;
                $('.card_body').waitMe("hide");
                toastr.success('Done !!');
                $('#toggleColors').show();

                $('.declineButton').attr("disabled", false);
                $('.acceptButton').attr("disabled", false);
            }
        }

        function checkDomains(index = 0)
        {
            if(!clear_table)
            {
                $('.card_body').waitMe("hide");

                $('#ips_table_container').hide();
                $('#domains_table_container').show();
                $('#toggleColors').hide();

                $('.declineButton').attr("disabled", false);
                $('.acceptButton').attr("disabled", false);

                $('#isps').DataTable().clear();
                table = $('#domains').DataTable();
                table.clear();

                clear_table = true;
            }
            domains = $('#domains_area').val();

            jQuery('.card_body').waitMe({
                effect: 'bounce',
                text: 'Please wait...',
                bg: 'rgba(255,255,255,0.7)',
                fontSize: '16px',
                color: '#7b57ff'
            });

            $('.declineButton').attr("disabled", true);
            $('.acceptButton').attr("disabled", true);


            domains = domains.split("\n");

            if (index < domains.length)
            {
                var domain = domains[index];

                $.ajax({
                    url: "{{url('/checkDomains')}}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        domains: domain,
                    },
                    success: function(response)
                    {
                        if(response.success)
                        {
                            var success_code = '<div class="circle-wrapper_1"><div class="success_1 circle_1"></div></div>';
                            var warning_code = '<div class="circle-wrapper_1"><div class="warning_1 circle_1"></div></div>';
                            var error_code = '<div class="circle-wrapper_1"><div class="error_1 circle_1"></div></div>';
    
                            for(var i=0; i<response.results.length; i++)
                            {
                                var line = [];
    
                                line['Domain'] = response.results[i]['domain'];
    
                                line['DBL Spamhaus'] = response.results[i]['dbl_spamhaus'];
                                if(response.results[i]["dbl_spamhaus"] == 'OK') line["DBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["dbl_spamhaus"]}</span>${success_code}`;
                                else if(response.results[i]["dbl_spamhaus"] == 'Blacklisted') line["DBL Spamhaus"] = `<span class="text_response hidden">${response.results[i]["dbl_spamhaus"]}</span>${error_code}`;
    
                                line['HostKarma'] = response.results[i]['hostkarma'];
    
                                line['SpamCop'] = response.results[i]['spamcop'];
                                if(response.results[i]["spamcop"] == 'OK') line["SpamCop"] = `<span class="text_response hidden">${response.results[i]["spamcop"]}</span>${success_code}`;
                                else if(response.results[i]["spamcop"] == 'Blacklisted') line["SpamCop"] = `<span class="text_response hidden">${response.results[i]["spamcop"]}</span>${error_code}`;
    
                                line['AbuseBulter'] = response.results[i]['abusebutler'];
                                if(response.results[i]["abusebutler"] == 'OK') line["AbuseBulter"] = `<span class="text_response hidden">${response.results[i]["abusebutler"]}</span>${success_code}`;
                                else if(response.results[i]["abusebutler"] == 'Blacklisted') line["AbuseBulter"] = `<span class="text_response hidden">${response.results[i]["abusebutler"]}</span>${error_code}`;
    
                                line['SURBL'] = response.results[i]['surbl'];
                                if(response.results[i]["surbl"] == 'OK') line["SURBL"] = `<span class="text_response hidden">${response.results[i]["surbl"]}</span>${success_code}`;
                                else if(response.results[i]["surbl"] == 'Blacklisted') line["SURBL"] = `<span class="text_response hidden">${response.results[i]["surbl"]}</span>${error_code}`;
    
                                line['A Record'] = response.results[i]['a_record'];
    
                                line['URIBL'] = response.results[i]['uribl'];
                                if(response.results[i]["uribl"] == 'OK') line["URIBL"] = `<span class="text_response hidden">${response.results[i]["uribl"]}</span>${success_code}`;
                                else if(response.results[i]["uribl"] == 'Blacklisted') line["URIBL"] = `<span class="text_response hidden">${response.results[i]["uribl"]}</span>${error_code}`;
    
                                table.row.add(line);
                                table.draw();
                            }
                        }
                        else
                        {
                            toastr.error(response.msg);
                            $('.card_body').waitMe("hide");
                            clear_table = false;
                            $('.declineButton').attr("disabled", false);
                            $('.acceptButton').attr("disabled", false);
                            $('#toggleColors').show();
                            return;
                        }

                        checkDomains(index + 1);
                    },
                    error: function(xhr, status, error)
                    {
                        console.error(error);
                    }
                });
            }
            else
            {
                $('.card_body').waitMe("hide");
                $('#toggleColors').show();
                toastr.success('Done !!');
                clear_table = false;
                $('.declineButton').attr("disabled", false);
                $('.acceptButton').attr("disabled", false);
            }
        }

      </script>
   </body>
</html>

