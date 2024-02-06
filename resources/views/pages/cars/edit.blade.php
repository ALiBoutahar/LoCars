@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Modifier Voiture Nº 3</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/cars')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form class="row">
                    <div class="col-md-6 row mb-4">
                        <label for="matricule" class="col-sm-2 col-form-label">Matricule</label>
                        <div class="col-sm-10">
                            <input type="text" name="matricule" class="form-control" id="matricule" value="xxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="model" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" class="form-control" id="model" value="xxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km" class="col-sm-2 col-form-label">km</label>
                        <div class="col-sm-10">
                            <input type="text" name="km" class="form-control" id="km" value="xxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="marque" class="col-sm-2 col-form-label">Marque</label>
                        <div class="col-sm-10">
                            <input type="text" name="marque" class="form-control" id="email" value="xxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="color" class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <input type="text" name="color" class="form-control" id="color" value="xxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="nbrplace" class="col-sm-2 col-form-label">N'Places</label>
                        <div class="col-sm-10">
                            <input type="text" name="nbrplace" class="form-control" id="nbrplace" value="xxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="image" class="form-label" style="width: 20%">Image</label>
                        <input class="form-control bg-dark"  style="width: 77%" type="file" name="image" id="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a class="btn btn-sm btn-success" href="{{url('/cars')}}">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection