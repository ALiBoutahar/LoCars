@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            @include('history.nav')
            <div class="pt-3"><h5>History / Voitures</h5></div>
        </div>
        @if (count($voitures)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune voitures enregistrer</b></p>
            </div>
        @else
        <div class="bg-secondary text-center rounded p-2">
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voitures as $a)
                            <tr class="text-center">
                                <td>{{ $a->image }}</td>
                                <td>{{ $a->matricule }}</td>
                                <td>{{ $a->model }}</td>
                                <td>{{ $a->km }}</td>
                                <td>{{ $a->marque }}</td>
                                <td>{{ $a->color }}</td>
                                <td class="d-flex justify-content-center">
                                    <form class="pe-2" action="{{ url('h_voitures/'. $a->id.'/recovery') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm" style="background-color: #FFA500;" type="submit" onclick="return confirm('Are You Sure ??')" title="recovery this voiture">
                                            <i class="fa fa-history"></i>
                                        </button>
                                    </form>
                                    <form class="ps-2" action="{{ url('h_voitures/'. $a->id.'/destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
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