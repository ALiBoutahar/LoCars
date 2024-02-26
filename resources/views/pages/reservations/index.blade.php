@extends('app')
@section('main')
    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        @if (count($reservations)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune reservations enregistrer</b></p>
            </div>
        @else
        <div class="bg-secondary text-center rounded p-2">
            <div class="d-flex justify-content-between">
                <div><h3>Reservations</h3></div>
                <div>
                    <a href="{{url('reservations/pdf')}}" class="btn btn-info btn-sm me-2" onclick="return confirm('Are you sure you want to download the PDF?')">Télécharger pdf</a>
                    <a href="{{ url('reservation/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">#</th>
                            <th scope="col">Cin Client</th>
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
                        @foreach($reservations as $a)
                                <tr class="text-center">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->clients->cin }}</td>
                                    <td>{{ $a->voitures->matricule }}</td>
                                    <td>{{ $a->date_d }}</td>
                                    <td>{{ $a->date_f }}</td>
                                    <td>{{ $a->avance }}</td>
                                    <td>{{ $a->prix }}</td>
                                    <td>{{ $a->ttc }}</td>
                                    <td>
                                        <form action="{{ url('reservation/'. $a->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <a href="{{url('reservation/'. $a->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('reservation/'. $a->id .'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure ??')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
            </div>
        </div>
        @endif
    </div>

@endsection