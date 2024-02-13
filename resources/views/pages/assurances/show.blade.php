@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Detail Assurance Nº {{ $assurance->id }}</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/assurances')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="row">
                    <div class="col-md-11 row mb-4">
                        <label for="car" class="col-sm-2 col-form-label">Voiture</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="car" value="{{ $assurance->voiture_id }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="ste" class="col-sm-2 col-form-label" >Societe</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ste" value="{{ $assurance->ste }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="agance" class="col-sm-2 col-form-label" >Agance</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="agance" value="{{ $assurance->agance }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prix" value="{{ $assurance->prix }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status" value="{{ $assurance->status }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date_d" class="col-sm-2 col-form-label">Date-d</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_d" value="{{ $assurance->date_d }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date_f" class="col-sm-2 col-form-label">Date-f</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_f" value="{{ $assurance->date_f }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection