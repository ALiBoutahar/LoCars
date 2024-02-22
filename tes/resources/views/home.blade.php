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

        <div class="main_content">

            <div class="row" style="width:95%;margin-top:100px;">

                <div class="col-12" id="domains_table_container">
                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <div class="card-header with-border">
                            <h3 class="card-title">Users</h3>
                        </div>

                        <div class="card-body p-15">
                            <div class="table-responsive">
                                <table id="users" class="table mt-0 table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Verified</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if($user->status == true)
                                                        <span class="badge text-bg-success">Active</span>
                                                    @else
                                                        <span class="badge text-bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->email_verified_at != '')
                                                        <span class="badge text-bg-success" title="{{$user->email_verified_at}}">Verified</span>
                                                    @else
                                                        <span class="badge text-bg-danger">Not Verified</span>
                                                    @endif
                                                </td>
                                                <td>{{$user->created_at}}</td>
                                                <td>
                                                    <span class="badge text-bg-warning" onclick="getUser({{$user->id}})" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#userModal">Edit</span>
                                                    @if($user->email_verified_at != '')
                                                        <span class="badge text-bg-danger" onclick="verifyAccount({{$user->id}},false)" style="cursor:pointer;">Unverify</span>
                                                    @else
                                                        <span class="badge text-bg-info" onclick="verifyAccount({{$user->id}},true)" style="cursor:pointer;">Verify</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="modal fade" id="userModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="user_id" hidden />

                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" class="form-control" />
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-check-label mr-5" for="flexCheckDefault">
                                User Status
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateUser()">Save changes</button>
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
        table_2 = $('#users').DataTable({
            order: [[0, 'desc']],
            'autoWidth': false,
            'columns': [
                { "data": "ID" },
                { "data": "User" },
                { "data": "Email" },
                { "data": "Status" },
                { "data": "Verified" },
                { "data": "Created At" },
                { "data": "Actions" },
            ]
        });

        function openNav()
        {
           document.getElementById("mySidepanel").style.width = "250px";
        }
         
        function closeNav()
        {
           document.getElementById("mySidepanel").style.width = "0";
        }

        function getUser(id)
        {
            $.ajax({
                url: "{{url('/getUser')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    user_id: id,
                },
                success: function(response)
                {
                    if(response.success)
                    {
                        $('#user_id').val(id);
                        $('#email').val(response.user.email);
                        $('#password').val('*********');
                        if(response.user.status == true) $('#flexCheckDefault').prop('checked', true);
                        else $('#flexCheckDefault').prop('checked', false);
                    }
                    else
                    {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error)
                {
                    toastr.error('Big Error');
                }
            });
        }

        function updateUser()
        {
            var id = $('#user_id').val();

            var status = $('#flexCheckDefault').is(':checked');
            var email = $('#email').val();
            var password = $('#password').val();

            var data = {
                "_token": "{{ csrf_token() }}",
                "user_id": id,
                "status": status,
                "email": email,
                "password": password
            };
            $.ajax({
                url: "{{url('/updateUser')}}",
                method: "POST",
                data: data,
                success: function(response)
                {
                    if(response.success)
                    {
                        toastr.success('User updated successfullt !!');
                        setTimeout(() => {
                            location.reload();
                        }, 600);
                    }
                    else
                    {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error)
                {
                    toastr.error('Big Error');
                }
            });
        }

        function verifyAccount(id, verify)
        {
            Swal.fire({
                title: "Are you sure?",
                text: "this account will be verified/unverified!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes !",
                closeOnConfirm: false
            }).then((result) => {
                if (result.isConfirmed)
                {
                    $.ajax({

                        url: "{{url('/verifyAccount')}}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            user_id: id,
                            verify: verify
                        },
                        success: function(response)
                        {
                            if(response.success)
                            {
                                toastr.success('Account Verified !!');
                                setTimeout(() => {
                                    location.reload();
                                }, 600);
                            }
                            else
                            {
                                toastr.error(response.msg);
                            }
                        },
                        error: function(xhr, status, error)
                        {
                            toastr.error('Big Error');
                        }
                    });
                }
                else
                {
                    // console.log('SweetAlert closed.');
                }
            });

        }
      </script>
   </body>
</html>

