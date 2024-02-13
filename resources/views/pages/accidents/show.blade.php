@extends('app')
@section('main')

<div class="container-fluid d-none d-lg-block pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
            <h5 class="">Detail Accidents Nº {{ $accident->id }}</h5>
            <a class="btn btn-sm btn-primary" href="{{url('/accidents')}}">x</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="row">
                    <div class="col-md-6 row mb-4">
                        <label for="car" class="col-sm-2 col-form-label">Voiture</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="car" value="{{ $accident->voiture_id }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="client_id" class="col-sm-2 col-form-label">Client</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="client_id" value="{{ $accident->client_id }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status" value="{{ $accident->status }}">
                        </div>
                    </div>
                    <div class="col-md-6 row mb-4">
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date" value="{{ $accident->date }}">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection