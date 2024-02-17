<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LoCars</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/user.jpg" rel="icon')}}">

    <link rel="stylesheet"  href="{{asset('assets/vendor/aos/aos.css')}}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

     <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <style>
        #myTable_length , #myTable_info{
            display: flex;
            justify-content: flex-start;
        }
    </style>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Inclure les fichiers CSS et JavaScript de Toastr dans votre fichier de mise en page principal -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body >
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{url('/')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>LoCars</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{url('/')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Accuel</a>
                    <a href="{{url('/reservations')}}" class="nav-item nav-link"><i class="fa fa-bookmark me-2"></i>Reservations</a>
                    <a href="{{url('/clients')}}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Clients</a>
                    <a href="{{url('/voitures')}}" class="nav-item nav-link"><i class="fa fa-car me-2"></i>Voitures</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Voitures Options</a>
                        <div class="dropdown-menu bg-transparent border-0 ps-5">
                            <a href="{{url('/assurances')}}" class="dropdown-item">Assurances</a>
                            <a href="{{url('/controles')}}" class="dropdown-item">Controles-Technique</a>
                            <a href="{{url('/accidents')}}" class="dropdown-item">Accidents</a>
                        </div>
                    </div>
                    <a href="{{url('/statistiques')}}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Statistiques</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-history me-2"></i>Historiques</a>
                        <div class="dropdown-menu bg-transparent border-0 ps-5">
                            <a href="{{url('/history')}}" class="dropdown-item">History</a>
                            <a href="{{url('/history/clients')}}" class="dropdown-item">Clients</a>
                            <a href="{{url('/history/voitures')}}" class="dropdown-item">Voitures</a>
                            <a href="{{url('/history/reservations')}}" class="dropdown-item">Reservations</a>
                            <a href="{{url('/history/controles')}}" class="dropdown-item">Controles-Technique</a>
                            <a href="{{url('/history/assurances')}}" class="dropdown-item">Assurances</a>
                            <a href="{{url('/history/accidents')}}" class="dropdown-item">Accidents</a>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user me-2"></i>
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{url('/profile')}}" style="color: rgb(151, 151, 151)"  class="dropdown-item ps-4">Profile</a>
                            <a href="{{url('/history')}}" style="color: rgb(151, 151, 151)"  class="dropdown-item ps-4">Historique</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link class="dropdown-item" style="color: rgb(151, 151, 151)" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <div >
                <script>
                    // Afficher les messages Toastr
                    @if(Session::has('success'))
                        toastr.success("{{ Session::get('success') }}", "Succès");
                    @endif
                
                    @if(Session::has('warning'))
                        toastr.info("{{ Session::get('warning') }}", "Info");
                    @endif

                    @if(Session::has('danger'))
                        toastr.warning("{{ Session::get('danger') }}", "Avertissement");
                    @endif

                    // @if(Session::has('danger'))
                    //     toastr.error("{{ Session::get('danger') }}", "Erreur");
                    // @endif
                </script>
                {{-- @if ($message = Session::get('success'))
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "{{$message}}",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @elseif($message = Session::get('warning'))
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "info",
                            title: "{{$message}}",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @elseif($message = Session::get('danger'))
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "{{$message}}",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif --}}
            </div>

            @yield('main')
            </main>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>