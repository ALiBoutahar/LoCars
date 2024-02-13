@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Modifier Client Nº <{{ $client->cin }}/h5>
            <a class="btn btn-sm btn-primary" href="{{url('/clients')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('client/'. $client->id) }}" method="POST">
                    @method('patch');
                    @csrf
                    <div class="row mb-3">
                        <label for="cin" class="col-sm-2 col-form-label">Cin</label>
                        <div class="col-sm-10">
                            <input type="text" name="cin"  class="form-control" id="cin" value="{{ $client->cin }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" name="nom" class="form-control" id="nom" value="{{ $client->nom }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                            <input type="text" name="prenom" class="form-control" id="prenom" value="{{ $client->prenom }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" value="{{ $client->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="Phone" value="{{ $client->phone }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Phone" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" id="status" value="{{ $client->status }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <a class="btn btn-sm btn-success" href="{{url('/clients')}}">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection