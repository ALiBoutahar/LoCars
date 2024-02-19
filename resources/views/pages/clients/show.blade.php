@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
                <h5 class="">Detail Clients Nº {{ $client->id }}</h5>
                <a class="btn btn-sm btn-primary" href="{{url('/clients')}}">X</a>
            </div>
            <div class="col-sm-12 col-xl-3">
                <div class="bg-secondary d-flex align-items-center justify-content-center rounded h-100">
                    <div class="text-center">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <ul class="list-group p-2">
                        <li class="list-group-item bg-transparent">Cin : <b>{{ $client->cin }}</b></li>
                        <li class="list-group-item bg-transparent">Nom : <b>{{ $client->nom }}</b></li>
                        <li class="list-group-item bg-transparent">Prenom : <b>{{ $client->prenom }}</b></li>
                        <li class="list-group-item bg-transparent">Phone : <b>{{ $client->phone }}</b></li>
                        <li class="list-group-item bg-transparent">E-mail : <b>{{ $client->email }}K</b></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection