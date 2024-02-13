@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Modifier Accident Nº{{ $accident->id }}</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/accidents')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('accident/'. $accident->id) }}" class="row" method="POST">
                    @method('patch')
                    @csrf
                    <div class="col-md-6 row mb-4">
                        <label for="voiture" class="col-sm-2 col-form-label">Voitures</label>
                        <div class="col-sm-10">
                            <select name="voiture_id" class="form-select" required>
                                <option selected disabled align='center'>{{ $accident->voiture_id }}</option>
                                @foreach ($voitures as $a)
                                    <option value="{{ $a->id }}"> {{ $a->matricule }} - {{ $a->marque }}</option>
                                @endforeach
                            </select>                       
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="client" class="col-sm-2 col-form-label">Clients</label>
                        <div class="col-sm-10">
                            <select name="client_id" class="form-select" required>
                                <option selected disabled align='center'>{{ $accident->client_id }}</option>
                                @foreach ($clients as $a)
                                    <option value="{{ $a->id }}"> {{ $a->nom }} - {{ $a->prenom }}</option>
                                @endforeach
                            </select>                       
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="marque" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control" id="date" value="{{ $accident->date }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" id="status" value="{{ $accident->status }}">
                        </div>
                    </div>
                    <div>
                        <input type="text" name="type" class="form-control" value="0" hidden>
                        <input type="text" name="delete" class="form-control" value= "0" hidden>
                        <input type="text" name="user_id" class="form-control" value= {{ Auth::user()->id }} hidden>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a class="btn btn-sm btn-success" href="{{url('/accidents')}}">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection