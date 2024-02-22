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
        <title>Dashboard</title>
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.20/sweetalert2.min.css">
        <link rel="stylesheet" href="{{ asset('waitMe/waitMe.min.css') }}">
   </head>

   <style>
        @media only screen and (max-device-width: 768px)
        {
            .width-100
            {
                width: 100% !important;
            }
            .margin-0 
            {
                margin: 0 !important;
            }
            .width-93 
            {
                width: 93px !important;
            }
        }
   </style>
   <!-- body -->
   <body class="main-layout">


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

        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
        
                    <div class="row" style="padding:0 15px;">
                        <div class="col-12" style="margin-top: 100px;margin-bottom:15px;">
                            <div class="card">
                                <div class="card-header with-border" style="display: flex; justify-content: space-between; width: 100%; align-items: center; height:fit-content;background-color:#fff;flex-wrap: wrap">
                                    <h4 class="card-title">Spamhaus Listings</h4>
                                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;flex-wrap: wrap;margin-bottom:5px;">
                                        <div class="width-100">
                                            <label for="ip_test">IP</label>
                                            <input type="text" class="form-control width-100" id="ip_test" style="width: 150px; height: 35px">
                                        </div>
                                        <div class="width-100">
                                            <label for="type_test">Type</label>
                                            <select id="type_test" class="form-control select2 width-100" style="width: 150px">
                                                <option selected disabled value=""></option>
                                                <option value="xbl">XBL</option>
                                                <option value="css">CSS</option>
                                            </select>
                                        </div>
                                        <div class="width-100">
                                            <label for="number_of_records">Number of Records</label>
                                            <input type="text" id="number_of_records" class="form-control width-100" style="width: 150px; height: 35px">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-warning margin-0 width-93" onclick="newTest()" style="margin: 31px 0 0px 25px;">New Test</button>
                                    </div>
                                    @can('super_admin')
                                        <button type="button" class="btn btn-sm btn-primary margin-0 width-93" data-bs-toggle="modal" data-bs-target="#setAccount" style="margin: 31px 0 0px 25px;">Set Account</button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-12">
                        <div id="bigbox" class="card">
                            <div class="card-body p-15">
                                <div class="table-responsive">  
                                    <table id="spamhaus" class="table mt-0 table-hover no-wrap" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Record</th>
                                                <th>Dataset</th>
                                                <th>Ipaddress</th>
                                                <th>Asn</th>
                                                <th>CC</th>
                                                <th>Listed</th>
                                                <th>Seen</th>
                                                <th>Valid_until</th>
                                                <th>Rule</th>
                                                <th>Heuristic</th>
                                                <th>Lat</th>
                                                <th>Lon</th>
                                                <th>Srcip</th>
                                            </tr>
                                        </thead>
                                        <tbody>
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        
        {{-- modal add sold --}}
        <div id="setAccount" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="width: 80%; margin-left: 10%;" id="setAccount_content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Set Account</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form_group row mb-3">
                            <div class="col-3">
                                <label class="form-control-label" for="username">Account</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="form_group row">
                            <div class="col-3">
                                <label class="form-control-label" for="password">Password</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-primary pull-right" onclick="setAccount()">Confirm</button>
                        <button type="button" class="btn btn-danger pull-right" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        

        @include('footer', ['style' => 'style=position:absolute;bottom:0;width:100%;'])

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.20/sweetalert2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('waitMe/waitMe.min.js') }}"></script>

        <script>

            var table = $('#spamhaus').DataTable({
                "rowId": "id",
                "paging": true,
                "searching": true,
                "order": [[ 0, "desc" ]],
                'columns': [
                    { "data": "Record" },
                    { "data": "Dataset" },
                    { "data": "Ipaddress" },
                    { "data": "Asn" },
                    { "data": "CC" },
                    { "data": "Listed" },
                    { "data": "Seen" },
                    { "data": "Valid_until" },
                    { "data": "Rule" },
                    { "data": "Heuristic" },
                    { "data": "Lat" },
                    { "data": "Lon" },
                    { "data": "Srcip" },
                ],
            });

            function openNav()
            {
                document.getElementById("mySidepanel").style.width = "250px";
            }
            
            function closeNav()
            {
                document.getElementById("mySidepanel").style.width = "0";
            }

            function convertToDate(timestamp) {
                const date = new Date(timestamp * 1000);
                const formattedDate = date.toLocaleDateString('en-AU', { year: 'numeric', month: '2-digit', day: '2-digit' });
                return formattedDate;
            }
        
            function newTest()
            {
                $("#bigbox").waitMe({
                    effect: 'timer',
                    bg: 'rgba(255,255,255,0.7)',
                    color: '#000',
                    maxSize: 100,
                    waitTime: -1,
                    textPos: 'vertical',
                    fontSize: '20px',
                    source: ''
                });
        
                $.ajax({
                    type: "POST",
                    url: "/spamhausIpTest",
                    data: {
                        "ip": $("#ip_test").val(),
                        "number": $("#number_of_records").val(),
                        "type": $("#type_test").val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if(response.success == true)
                        {
                            records = response.records;
                            table.clear().draw();
                            if(records)
                            {
                                for(key in records)
                                {
                                    var line = {
                                        "Record": parseInt(key + 1),
                                        "Dataset": records[key]['dataset'],
                                        "Ipaddress": records[key]['ipaddress'],
                                        "Asn": records[key]['asn'],
                                        "CC": records[key]['cc'],
                                        "Listed": convertToDate(records[key]['listed']),
                                        "Seen": convertToDate(records[key]['seen']),
                                        "Valid_until": convertToDate(records[key]['valid_until']),
                                        "Rule": records[key]['rule'],
                                        "Heuristic": records[key]['heuristic'],
                                        "Lat": records[key]['lat'],
                                        "Lon": records[key]['lon'],
                                        "Srcip": records[key]['srcip']
                                    };
                                    table.row.add(line);
                                }
                                table.draw();
                                toastr.error(response.message);
                            }
                            else
                            {
                                toastr.success(response.message);
                            }
                            
                            $("#bigbox").waitMe('hide');
                        }
                        else
                        {
                            table.clear().draw();
                            toastr.error(response.message);
                            $("#bigbox").waitMe('hide');
                        }
                    }
                })
            }
        
            function setAccount()
            {
                $("#setAccount_content").waitMe({
                    effect: 'timer',
                    bg: 'rgba(255,255,255,0.7)',
                    color: '#000',
                    maxSize: 100,
                    waitTime: -1,
                    textPos: 'vertical',
                    fontSize: '20px',
                });
        
                $.ajax({
                    type: "POST",
                    url: "/setAccount",
                    data: {
                        "username": $("#username").val(),
                        "password": $("#password").val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if(response.success == true)
                        {
                            toastr.success(response.message);
                            $("#setAccount_content").waitMe('hide');
                            window.location.reload();
                        }
                        else
                        {
                            toastr.error(response.message);
                            $("#setAccount_content").waitMe('hide');
                        }
                    }
                })
            }
            
        </script>
   </body>
</html>

