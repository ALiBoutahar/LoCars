@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h3>Clients</h3></div>
            <div><a href="{{ url('client/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
        </div>
        @if (count($clients)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune clients enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Cin</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Phone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $a)
                                <tr class="text-center">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->cin }}</td>
                                    <td>{{ $a->nom }}</td>
                                    <td>{{ $a->prenom }}</td>
                                    <td>{{ $a->phone }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>
                                        <form action="{{ url('client/'. $a->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <a href="{{url('client/'. $a->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('client/'. $a->id .'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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