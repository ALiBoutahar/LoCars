@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h3>History / Accidents</h3></div>
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
                                <th scope="col">Id</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accidents as $a)
                                <tr class="text-center">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->voiture_id }}</td>
                                    <td>{{ $a->clientt_id }}</td>
                                    <td>{{ $a->date }}</td>
                                    <td class="d-flex justify-content-center">
                                        <form class="pe-2" action="{{ url('h_accidents/'. $a->id.'/recovery') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm" style="background-color: @if ($a->delete <> 0) #FFA500; @endif" type="submit" onclick="return confirm('Are You Sure ??')" title="recovery this accident">
                                                <i class="fa fa-history"></i>
                                            </button>
                                        </form>
                                        <form class="ps-2" action="{{ url('h_accidents/'. $a->id.'/destroy') }}" method="POST">
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