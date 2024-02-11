@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
                <h5 class="">Detail Clients Nº {{ $client->id }}</h5>
                <a class="btn btn-sm btn-primary" href="{{url('/clients')}}">x</a>
            </div>
            <div class="col-sm-12 col-xl-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class=" text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="{{asset('img/testimonial-1.jpg')}}" style="width: 100px; height: 100px;">
                        <h5 class="mb-1">{{ $client->nom }} {{ $client->prenom }}</h5>
                        <p>{{ $client->cin }} <br> {{ $client->phone }} <br> {{ $client->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection