@extends('app')
@section('main')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-around p-3">
                <i class="fa fa-chart-bar fa-2x text-primary"></i><span class="text-light"><b class="ps-2">Reservations</b><b class="ps-2">28</b></span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-around p-3">
                <i class="fa fa-users fa-2x text-primary"></i><span class="text-light"><b class="ps-2">Clients</b><b class="ps-2">19</b></span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-around p-3">
                <i class="fa fa-car fa-2x text-primary"></i><span class="text-light"><b class="ps-2">Voitures</b><b class="ps-2">8</b></span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-around p-3">
                <i class="fa fa-chart-pie fa-2x text-primary"></i><span class="text-light"><b class="ps-2">Controles</b><b class="ps-2">25</b></span>
            </div>
        </div>
    </div>
</div>

@endsection