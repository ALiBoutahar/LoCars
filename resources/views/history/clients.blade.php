@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            @include('history.nav')
            <div class="pt-3"><h5>History / Clients</h5></div>
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
                                <th scope="col">Id</th>
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
                                    <td class="d-flex justify-content-center">
                                        <form class="pe-2" action="{{ url('h_clients/'. $a->id.'/recovery') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm" style="background-color: #FFA500;" type="submit" onclick="return confirm('Are You Sure ??')" title="recovery this client">
                                                <i class="fa fa-history"></i>
                                            </button>
                                        </form>
                                        <form class="ps-2" action="{{ url('h_clients/'. $a->id.'/destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
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