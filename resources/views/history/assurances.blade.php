@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            @include('history.nav')
            <div class="pt-3"><h5>History / Assurances</h5></div>
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
                                <th scope="col">Id</th>
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
                                    <td>{{ $a->voiture_id }}</td>
                                    <td>{{ $a->date_d }}</td>
                                    <td>{{ $a->date_f }}</td>
                                    <td>{{ $a->ste }}</td>
                                    <td>{{ $a->prix }}</td>
                                    <td class="d-flex justify-content-center">
                                        <form class="pe-2" action="{{ url('h_assurances/'. $a->id.'/recovery') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm" style="background-color:  #FFA500;" type="submit" onclick="return confirm('Are You Sure ??')" title="recovery this assurance">
                                                <i class="fa fa-history"></i>
                                            </button>
                                        </form>
                                        <form class="ps-2" action="{{ url('h_assurances/'. $a->id.'/destroy') }}" method="POST">
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