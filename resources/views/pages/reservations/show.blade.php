@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Detail Reservation Nº {{ $reservation->id}}</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/reservations')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="row">
                    <div class="col-md-6 row mb-4">
                        <label for="client" class="col-sm-2 col-form-label">Client</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="client" value="{{ $reservation->clients->cin}} - {{ $reservation->clients->nom}} {{ $reservation->clients->prenom}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="car" class="col-sm-2 col-form-label">Voiture</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="car" value="{{ $reservation->voitures->matricule}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km_d" class="col-sm-2 col-form-label">Km-d</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="km_d" value="{{ $reservation->km_d}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km_f" class="col-sm-2 col-form-label" >Km-f</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="km_f" value="{{ $reservation->km_f}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="avance" class="col-sm-2 col-form-label">Avance</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="avance" value="{{ $reservation->avance}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prix" value="{{ $reservation->prix}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="ttc" class="col-sm-2 col-form-label">TTC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttc" value="{{ $reservation->ttc}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status" value="{{ $reservation->status}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date_d" class="col-sm-2 col-form-label">Date-d</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_d" value="{{ $reservation->date_d}}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date_f" class="col-sm-2 col-form-label">Date-f</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_f" value="{{ $reservation->date_f}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection