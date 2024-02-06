@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="table-responsive">
                <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Image</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Model</th>
                            <th scope="col">Km</th>
                            <th scope="col">Marque</th>
                            <th scope="col">color</th>
                            <th scope="col">N'place</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="" alt="..."></td>
                            <td>123/A/12</td>
                            <td>2012</td>
                            <td>12343</td>
                            <td>clio</td>
                            <td>black</td>
                            <td>6</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_car')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_car')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                        <tr>
                            <td><img src="" alt="..."></td>
                            <td>123/A/12</td>
                            <td>2012</td>
                            <td>12343</td>
                            <td>clio</td>
                            <td>black</td>
                            <td>6</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_car')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_car')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                        <tr>
                            <td><img src="" alt="..."></td>
                            <td>123/A/12</td>
                            <td>2012</td>
                            <td>12343</td>
                            <td>clio</td>
                            <td>black</td>
                            <td>6</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_car')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_car')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                        <tr>
                            <td><img src="" alt="..."></td>
                            <td>123/A/12</td>
                            <td>2012</td>
                            <td>12343</td>
                            <td>clio</td>
                            <td>black</td>
                            <td>6</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_car')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_car')}}">Modifier</a>
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

    <!-- Modal -->
    <div class="modal fade" id="chart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="myPlot3" style="width:100%"></div>
                <script>
                    var y = [3,5,7,4,11,9,15,11,18,22,8,4];
                    var x = ["mois1", "mois2", "mois3", "mois4", "mois5", "mois6", "mois7", "mois8" , "mois9", "mois10", "mois11", "mois12"];
                    var data = [{
                        x:x,
                        y:y,
                        type:"line",
                        orientation:"h",
                        marker: {color:"blue"}
                    }];
                    var layout = {title:"gains des voitures dernier Année"};
                    Plotly.newPlot("myPlot3", data, layout);
                </script>
            </div>
        </div>
    </div>

@endsection