@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Ajouter Client</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/clients')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('/client') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="cin" class="col-sm-2 col-form-label">Cin</label>
                        <div class="col-sm-10">
                            <input type="text" name="cin" class="form-control" id="cin">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" name="nom" class="form-control" id="nom">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                            <input type="text" name="prenom" class="form-control" id="prenom">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="Phone">
                        </div>
                    </div>
                    <div class="row mb-3">
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
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a class="btn btn-sm btn-success" href="{{url('/clients')}}">Annuler</a>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection