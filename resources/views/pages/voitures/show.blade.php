@extends('app')
@section('main')

    <div class="container-fluid  pt-4 px-4">
        <div class="row g-4 d-flex justify-content-center p">
            <div class="col-lg-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-3">
                    <img class="img-fluid rounded mx-auto" src="{{asset('storage/'.$voiture->image)}}" style="max-width: 100%; max-height:200px;">
                </div>
                <div class="row rounded">
                    <div class="col-12 mt-2">
                        <a href="{{url('/assurances')}}">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Assurances</b>
                                <b class="mb-0">8 Fois</b>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 mt-2">
                        <a href="{{url('/controles')}}" >
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Controle Technique</b>
                                <b class="mb-0">5 Fois</b>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 mt-2">
                        <a href="{{url('/accidents')}}">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Accidents</b>
                                <b class="mb-0">2 Fois</b>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 mt-2">
                        <a href="{{url('/voitures')}}">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <b class="">Gains TTC</b>
                                <b class="mb-0">253534 DH</b>
                            </div>
                        </a>
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
                        <li class="list-group-item bg-transparent"><span class="d-flex ">Color : <input type="color" class="ms-2 form-control bg-dark w-25" value="{{ $voiture->color }}"></span></li>
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
    
{{-- 
    <div class="row">
        <div class="col-xl-6 text-center">
            <img class="img-fluid rounded mx-auto mb-3" src="{{asset('storage/'.$voiture->image)}}" style="max-width: 250px;">
        </div>
        <div class="col-xl-6">
            <p>Matricule : <b>{{ $voiture->matricule }}</b></p>
            <p>Model : <b>{{ $voiture->model }}</b></p>
            <p class="col-xl-6">Marque : {{ $voiture->marque }}</p>
            <p class="col-xl-6">Color : {{ $voiture->color }}</p>
            <p class="col-xl-6">Nº Places : {{ $voiture->nbrplace }}</p>
            <p class="col-xl-6">Km : {{ $voiture->km }}K</p>
        </div>
        <p class="col-xl-6">Marque : {{ $voiture->marque }}</p>
        <p class="col-xl-6">Color : {{ $voiture->color }}</p>
        <p class="col-xl-6">Nº Places : {{ $voiture->nbrplace }}</p>
        <p class="col-xl-6">Km : {{ $voiture->km }}K</p>
        <p class="col-xl-12 mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet diam</p>
    </div> --}}

@endsection