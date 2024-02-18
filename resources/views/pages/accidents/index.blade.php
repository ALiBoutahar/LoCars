@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h3>Accidents</h3></div>
            <div><a href="{{ url('accident/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
        </div>
        @if (count($accidents)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune accidents enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Client</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accidents as $a)
                                <tr class="text-center">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->voitures->matricule }}</td>
                                    <td>{{ $a->clients->cin}}</td>
                                    <td>{{ $a->date }}</td>
                                    <td>
                                        <form action="{{ url('accident/'. $a->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <a href="{{url('accident/'. $a->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('accident/'. $a->id .'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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