@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h3>Controles</h3></div>
            <div><a href="{{ url('controle/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
        </div>
        @if (count($controles)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune Controles enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Id</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Date d</th>
                                <th scope="col">Date f</th>
                                <th scope="col">Societe</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($controles as $a)
                                <tr class="text-center">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->voiture_id }}</td>
                                    <td>{{ $a->nom }}</td>
                                    <td>{{ $a->date_d }}</td>
                                    <td>{{ $a->date_f }}</td>
                                    <td>{{ $a->ste }}</td>
                                    <td>{{ $a->prix }}</td>
                                    <td>
                                        <form action="{{ url('controle/'. $a->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <a href="{{url('controle/'. $a->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('controle/'. $a->id .'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure ??')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
                
            </div>
        @endif
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
                    var layout = {title:"les clients du dernier Année"};
                    Plotly.newPlot("myPlot3", data, layout);
                </script>
            </div>
        </div>
    </div>

@endsection