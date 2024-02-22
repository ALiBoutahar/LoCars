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
       <title>Check iPs</title>
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

      <style>
        td{
            text-align: center;
        }

        #submitIp {
            padding: 10px 20px; 
            background-color: #9041f7; 
            border-radius: 20px;
            color: #fff; 
            border: none; 
            cursor: pointer; 
        }

        #submitIp:hover {
            background-color: #4d04ad;
        }

        #ip{
            border-color:  #9041f7; 
            outline: none;
        }


    </style>

   </head>
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
        <div class="content d-flex justify-content-center">
            <div class="custom_card">
                <img id="cookieSvg" srcset="https://img.icons8.com/?size=256&amp;id=47745&amp;format=png 1x, https://img.icons8.com/?size=512&amp;id=47745&amp;format=png 2x" width="256" height="256" alt="Domain icon" class="app-preview__image-origin" style="filter: invert(0%) sepia(95%) saturate(0%) hue-rotate(134deg) brightness(93%) contrast(104%);">
                <p class="cookieHeading">Reputation Tracking System.</p>
                <p class="cookieDescription">This website uses advanced algorithms to ensure you get the most accurate results.</p>
                <div class="col-md-6 ">
                    <div class="">
                        <div class="rounded p-1" style="border:solid 1px #7b57ff;">
                            <textarea class="form-control col-md-12" id="ip" name="ip" cols="5" rows="8" placeholder="iPs" style="border-color:#7b57ff;"></textarea>
                        </div>
                        <div class="d-flex justify-content-center p-2">
                            <button type="button" data-bs-dismiss="modal" id="submitIp" onclick="add()">Check iPs</button>
                        </div>
                    </div>
                </div>
                <div class="container border shadow rounded">
                    <div class="row">
                        <div class="col-md-12 mb-3 p-3">
                            <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Domain Name</th>
                                        <th>IP Ranges</th>
                                        <th>Start IP</th>
                                        <th>End IP</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('footer')


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
        <script>
            var table = $('#myTable').DataTable();
            // getIpRanges()
            // function getIpRanges() {
            //     $.ajax({
            //         type: 'get',
            //         url: '{{ url("/ipranges") }}',
            //         success: function(data) {
            //             table.clear().draw();
            //             if (data.success && data.ipranges) {
            //                 $.each(data.ipranges, function(index, ipr) {
            //                     table.row.add([
            //                         ipr.id,
            //                         ipr.domain_name,
            //                         ipr.ip_range,
            //                         ipr.start,
            //                         ipr.end
            //                     ]);
            //                 });
            //                 table.draw();
            //             } else {
            //                 toastr.error('Error');
            //             }
            //         }
            //     });
            // };

            function add(e) {
                var ip = $('#ip').val();
                console.log(ip);
                if(ip) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("/check") }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            ip: ip
                        },
                        success: function(data) {
                            table.clear().draw();
                            if (data.success && data.ipranges) {
                                $.each(data.ipranges, function(index, ipr) {
                                    table.row.add([
                                        ipr.id,
                                        ipr.domain_name,
                                        ipr.ip_range,
                                        ipr.start,
                                        ipr.end
                                    ]);
                                });
                                table.draw();
                                $('#ip').val('');
                            }
                            if(data.ipranges.length > 0) 
                            {
                                toastr.success('Success ip exist');
                            }
                            else
                            {
                                toastr.error('error this ip not exist');
                            }    
                        },
                    });
                }                   
            };
    
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
            });

        function openNav() {
           document.getElementById("mySidepanel").style.width = "250px";
        }
         
        function closeNav()
        {
           document.getElementById("mySidepanel").style.width = "0";
        }
        </script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="{{ asset('waitMe/waitMe.min.js') }}"></script>


   </body>
</html>
