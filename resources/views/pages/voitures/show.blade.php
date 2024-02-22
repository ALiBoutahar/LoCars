@extends('app')
@section('main')

    <div class="container-fluid pt-4 mb-4 px-4">
        <div class="row g-4 d-flex justify-content-center p">
            <div class="col-lg-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-3">
                    <img class="img-fluid rounded mx-auto" src="{{asset('storage/'.$voiture->image)}}" style="max-width: 100%; max-height:200px;">
                </div>
                <div class="row rounded">
                    <div class="col-12 mt-2">
                        {{-- <a href="{{url('/assurances')}}"> --}}
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Assurances</b>
                                <b class="mb-0">{{count($assurances)}} Fois</b>
                            </div>
                        {{-- </a> --}}
                    </div>
                    <div class="col-12 mt-2">
                        {{-- <a href="{{url('/controles')}}" > --}}
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Controle Technique</b>
                                <b class="mb-0">{{count($controles)}} Fois</b>
                            </div>
                        {{-- </a> --}}
                    </div>
                    <div class="col-12 mt-2">
                        {{-- <a href="{{url('/accidents')}}"> --}}
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Accidents</b>
                                <b class="mb-0">{{count($accidents)}} Fois</b>
                            </div>
                        {{-- </a> --}}
                    </div>
                    <div class="col-12 mt-2">
                        {{-- <a href="{{url('/voitures')}}"> --}}
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Gains TTC</b>
                                <b class="mb-0">253534 DH</b>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-secondary rounded h-100 p-3">
                    <div class="col-lg-12 d-flex justify-content-end mb-2">
                        <a class="btn btn-sm btn-primary" href="{{url('/voitures')}}">X</a>
                    </div>
                    <ul class="list-group p-2">
                        <li class="list-group-item bg-transparent"><h6 class="">Detail Voiture Nº {{ $voiture->id }}</h6></li>  
                        <li class="list-group-item bg-transparent">Matricule : <b>{{ $voiture->matricule }}</b></li>
                        <li class="list-group-item bg-transparent">Model : <b>{{ $voiture->model }}</b></li>
                        <li class="list-group-item bg-transparent">Marque : <b>{{ $voiture->marque }}</b></li>
                        <li class="list-group-item bg-transparent"><span class="d-flex ">Color : <input type="color" class="ms-2 form-control bg-dark w-25 p-1" value="{{ $voiture->color }}"></span></li>
                        <li class="list-group-item bg-transparent">Nº Places : <b>{{ $voiture->nbrplace }}</b></li>
                        <li class="list-group-item bg-transparent">Km : <b>{{ $voiture->km }}K</b></li>
                        <li class="list-group-item bg-transparent">Déscription : <b>{{ $voiture->status }}</b></li>

                    </ul>
                    <div class="col-lg-12 d-flex justify-content-end mt-3">
                        <form action="{{ url('voiture/'. $voiture->id.'/delete') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <a href="{{url('voiture/'. $voiture->id .'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit me-2"></i>Modifier</a>
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure ??')"><i class="fas fa-trash-alt me-2"></i>Suprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h4>Assurances</h4></div>
        </div>
        @if (count($assurances)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune assurances enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="Assurances" class="table text-center align-middle table-bordered table-hover">
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
                        $('#Assurances').DataTable();
                    });
                </script>
                
            </div>
        @endif
    </div>

    <div class="container-fluid d-none d-lg-block pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h4>Controles</h4></div>
        </div>
        @if (count($controles)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune Controles enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="Controles" class="table text-center align-middle table-bordered table-hover">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
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
                                    <td>{{ $a->voitures->matricule }}</td>
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
                        $('#Controles').DataTable();
                    });
                </script>
                
            </div>
        @endif
    </div>

    <div class="container-fluid d-none d-lg-block pt-2 pb-4 px-4">
        <div class="d-flex justify-content-between">
            <div><h4>Accidents</h4></div>
        </div>
        @if (count($accidents)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune accidents enregistrer</b></p>
            </div>
        @else
            <div class="bg-secondary text-center rounded p-2">
                <div class="table-responsive">
                    <table id="Accidents" class="table text-center align-middle table-bordered table-hover">
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
                        $('#Accidents').DataTable();
                    });
                </script>
                
            </div>
        @endif
    </div>

@endsection