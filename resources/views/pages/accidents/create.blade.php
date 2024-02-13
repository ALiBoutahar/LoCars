@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Ajouter Accidents</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/accidents')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('/accident') }}" class="row" method="POST">
                    @csrf
                    <div class="col-md-6 row mb-4">
                        <label for="model" class="col-sm-2 col-form-label">Voitures</label>
                        <div class="col-sm-10">
                            <select name="voiture_id" class="form-select " required>
                                <option selected disabled align='center'>----Choisez voiture----</option>
                                @foreach ($voitures as $a)
                                    <option value="{{ $a->id }}"> {{ $a->matricule }} - {{ $a->marque }}</option>
                                @endforeach
                            </select>                       
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="model" class="col-sm-2 col-form-label">Clients</label>
                        <div class="col-sm-10">
                            <select name="client_id" class="form-select " required>
                                <option selected disabled align='center'>----Choisez client----</option>
                                @foreach ($clients as $a)
                                    <option value="{{ $a->id }}"> {{ $a->nom }} - {{ $a->prenom }}</option>
                                @endforeach
                            </select>                       
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" id="status">
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