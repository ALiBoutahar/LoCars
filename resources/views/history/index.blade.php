@extends('app')
@section('main')
    
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-2">
                <a href="{{url('/history/clients')}}">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                        <p class="mb-2">Clients</p>
                        <b class="mb-0">22</b>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="{{url('/history/cars')}}">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                        <p class="mb-2">Voitures</p>
                        <b class="mb-0">5</b>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="{{url('/history/reservations')}}">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                        <p class="mb-2">Reservations</p>
                        <b class="mb-0">37</b>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="{{url('/history/assurances')}}">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                        <p class="mb-2">Assurances</p>
                        <b class="mb-0">15</b>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="{{url('/history/accidents')}}">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                        <p class="mb-2">Accidents</p>
                        <b class="mb-0">3</b>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="{{url('/history/controles')}}">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-pie fa-3x text-primary"></i> --}}
                        <p class="mb-2">Controles-T</p>
                        <b class="mb-0">7</b>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection