@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Ajouter Reservation</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/reservations')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form class="row" action="{{ url('/reservation') }}" method="POST">
                    @csrf
                    <div class="col-md-6 row mb-4">
                        <label for="matricule" class="col-sm-2 col-form-label">Client</label>
                        <div class="col-sm-10">
                            <select name="client_id" class="form-select " required>
                                <option selected disabled align='center'>----Choisez client----</option>
                                @foreach ($clients as $a)
                                    <option value="{{ $a->id }}"> {{ $a->cin }} - {{ $a->nom }} - {{ $a->prenom }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="model" class="col-sm-2 col-form-label">Voitures</label>
                        <div class="col-sm-10">
                            <select name="voiture_id" class="form-select " required>
                                <option selected disabled align='center'>----Choisez client----</option>
                                @foreach ($voitures as $a)
                                    <option value="{{ $a->id }}"> {{ $a->matricule }} - {{ $a->marque }}</option>
                                @endforeach
                            </select>                       
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km" class="col-sm-2 col-form-label">km-D</label>
                        <div class="col-sm-10">
                            <input type="text" name="km_d" class="form-control" id="km_d">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="marque" class="col-sm-2 col-form-label">Km-F</label>
                        <div class="col-sm-10">
                            <input type="text" name="km_f" class="form-control" id="km_f">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="color" class="col-sm-2 col-form-label">Avance</label>
                        <div class="col-sm-10">
                            <input type="text" name="avance" class="form-control" id="avance">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input type="text" name="prix" class="form-control" id="prix">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">TTC</label>
                        <div class="col-sm-10">
                            <input type="text" name="ttc" class="form-control" id="ttc">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" id="status">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">Date D</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_d" class="form-control" id="date_d">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">date F</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_f" class="form-control" id="date_f">
                        </div>
                    </div>
                    <div>
                        <input type="text" name="type" class="form-control" value="0" hidden>
                        <input type="text" name="delete" class="form-control" value= "0" hidden>
                        <input type="text" name="user_id" class="form-control" value= {{ Auth::user()->id }} hidden>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a class="btn btn-sm btn-success" href="{{url('/reservations')}}">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection