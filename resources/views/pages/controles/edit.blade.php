@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Modifier Controle Nº{{ $controle->id }}</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/controles')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('controle/'. $controle->id) }}" class="row" method="POST">
                    @method('patch')
                    @csrf
                    <div class="col-md-6 row mb-4">
                        <label for="model" class="col-sm-2 col-form-label">Voitures</label>
                        <div class="col-sm-10">
                            <select name="voiture_id" class="form-select" required>
                                <option selected disabled align='center'>{{ $controle->voitures->matricule }}</option>
                                @foreach ($voitures as $a)
                                    <option value="{{ $a->id }}"> {{ $a->matricule }} - {{ $a->marque }}</option>
                                @endforeach
                            </select>                       
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nom" class="col-sm-2 col-form-label">nom</label>
                        <div class="col-sm-10">
                            <input type="text" name="nom" class="form-control" id="nom" value="{{ $controle->nom }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km" class="col-sm-2 col-form-label">Date-D</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_d" class="form-control" id="date_d" value="{{ $controle->date_d }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="marque" class="col-sm-2 col-form-label">Date-F</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_f" class="form-control" id="date_f" value="{{ $controle->date_f }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="color" class="col-sm-2 col-form-label">Societe</label>
                        <div class="col-sm-10">
                            <input type="text" name="ste" class="form-control" id="ste" value="{{ $controle->ste }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">Agance</label>
                        <div class="col-sm-10">
                            <input type="text" name="agance" class="form-control" id="agance" value="{{ $controle->agance }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input type="text" name="prix" class="form-control" id="prix" value="{{ $controle->prix }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" id="status" value="{{ $controle->status }}">
                        </div>
                    </div>
                    <div>
                        <input type="text" name="type" class="form-control" value="0" hidden>
                        <input type="text" name="delete" class="form-control" value= "0" hidden>
                        <input type="text" name="user_id" class="form-control" value= {{ Auth::user()->id }} hidden>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a class="btn btn-sm btn-success" href="{{url('/controles')}}">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection