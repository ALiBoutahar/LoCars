@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Ajouter Assurance</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/assurances')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form class="row">
                    <div class="col-md-6 row mb-4">
                        <label for="model" class="col-sm-2 col-form-label">Voitures</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km" class="col-sm-2 col-form-label">km-D</label>
                        <div class="col-sm-10">
                            <input type="text" name="km" class="form-control" id="km">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="marque" class="col-sm-2 col-form-label">Km-F</label>
                        <div class="col-sm-10">
                            <input type="text" name="marque" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="color" class="col-sm-2 col-form-label">Avance</label>
                        <div class="col-sm-10">
                            <input type="text" name="color" class="form-control" id="color">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input type="text" name="nbrplace" class="form-control" id="nbrplace">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">TTC</label>
                        <div class="col-sm-10">
                            <input type="text" name="nbrplace" class="form-control" id="nbrplace">
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
                            <input type="date" name="nbrplace" class="form-control" id="nbrplace">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">date F</label>
                        <div class="col-sm-10">
                            <input type="date" name="nbrplace" class="form-control" id="nbrplace">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a class="btn btn-sm btn-success" href="{{url('/assurances')}}">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection