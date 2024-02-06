@extends('app')
@section('main')

    <div class="container-fluid pt-3 px-4">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
                <h5 class="">Accidents History</h5>
                <a class="btn btn-sm btn-primary" href="{{url('/history')}}">x</a>
            </div>
        </div>
    </div>
    <div class="container-fluid d-none d-lg-block pt-3 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="table-responsive">
                <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Code</th>
                            <th scope="col">Client</th>
                            <th scope="col">Voiture</th>
                            <th scope="col">Date-D</th>
                            <th scope="col">Date-F</th>
                            <th scope="col">Avance</th>
                            <th scope="col">Prix</th>
                            <th scope="col">TTC</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123</td>
                            <td>CB123456</td>
                            <td>3</td>
                            <td>12-01-2023</td>
                            <td>22-01-2023</td>
                            <td>500</td>
                            <td>1500</td>
                            <td>2000</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_accident')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_accident')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                        <tr>
                            <td>123</td>
                            <td>CB123456</td>
                            <td>3</td>
                            <td>12-01-2023</td>
                            <td>22-01-2023</td>
                            <td>500</td>
                            <td>1500</td>
                            <td>2000</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_accident')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_accident')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                        <tr>
                            <td>123</td>
                            <td>CB123456</td>
                            <td>3</td>
                            <td>12-01-2023</td>
                            <td>22-01-2023</td>
                            <td>500</td>
                            <td>1500</td>
                            <td>2000</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_accident')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_accident')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                        <tr>
                            <td>123</td>
                            <td>CB123456</td>
                            <td>3</td>
                            <td>12-01-2023</td>
                            <td>22-01-2023</td>
                            <td>500</td>
                            <td>1500</td>
                            <td>2000</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_accident')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_accident')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>

@endsection