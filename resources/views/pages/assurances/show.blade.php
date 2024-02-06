@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Detail Assurance Nº 3</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/assurances')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="row">
                    <div class="col-md-6 row mb-4">
                        <label for="client" class="col-sm-2 col-form-label">Client</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="client" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="car" class="col-sm-2 col-form-label">Voiture</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="car" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km_d" class="col-sm-2 col-form-label" >Km-d</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="km_d" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="km_f" class="col-sm-2 col-form-label" >Km-f</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="km_f" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="avance" class="col-sm-2 col-form-label">Avance</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="avance" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prix" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="ttc" class="col-sm-2 col-form-label">TTC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttc" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status" value="xxxxx">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date_d" class="col-sm-2 col-form-label">Date-d</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_d" value="11-01-2023">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date_f" class="col-sm-2 col-form-label">Date-f</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_f" value="22-01-2023">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection