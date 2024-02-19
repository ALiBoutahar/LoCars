@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h3>Assurances</h3></div>
            <div><a href="{{ url('assurance/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
        </div>
        @if (count($assurances)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune assurances enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Date d</th>
                                <th scope="col">Date f</th>
                                <th scope="col">Societe</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assurances as $a)
                                <tr class="text-center">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->voitures->matricule }}</td>
                                    <td>{{ $a->date_d }}</td>
                                    <td>{{ $a->date_f }}</td>
                                    <td>{{ $a->ste }}</td>
                                    <td>{{ $a->prix }}</td>
                                    <td>
                                        <form action="{{ url('assurance/'. $a->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <a href="{{url('assurance/'. $a->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('assurance/'. $a->id .'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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


@endsection