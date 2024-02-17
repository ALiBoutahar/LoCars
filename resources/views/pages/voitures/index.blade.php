@extends('app')
@section('main')

    <div class="container-fluid pt-2 px-4">
        <div class="d-flex justify-content-between">
            <div><h3>Voitures</h3></div>
            <div><a href="{{ url('voiture/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
        </div>
        @if (count($voitures)==0)
            <div class="alert alert-primary pb-1">
                <p align="center"><b>Aucune voitures enregistrer</b></p>
            </div>
        @else
        <div class="row">
            @foreach($voitures as $a)
                <div class="col-md-3 pt-2">
                    <a href="{{url('voiture/'. $a->id) }}">
                        <div class="card bg-secondary p-0">
                            <img src="{{asset('storage/'.$a->image)}}" class="card-img-top" alt="..." style="height: 250px;">
                            <div class="card-body">
                                <p class="card-title text-center text-light">Mº : {{ $a->matricule }}</p>
                            </div>
                        </div>
                    </a> 
                </div>
            @endforeach  
        @endif
    </div>

@endsection