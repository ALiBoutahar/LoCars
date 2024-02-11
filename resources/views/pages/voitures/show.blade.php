@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-lg-12 d-flex justify-content-between">
                <h5 class="">Detail Voiture Nº 3</h5>
                <a class="btn btn-sm btn-primary" href="{{url('/cars')}}">x</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-secondary rounded h-100 p-4 pt-2">
                    <div class="text-center">
                        <img class="img-fluid rounded mx-auto mb-3" src="img/clio5.png" style="max-width: 250px;">
                    </div>
                    <div class="row">
                        <p class="col-xl-6">Matricule : 123546/r/54</p>
                        <p class="col-xl-6">Model : 2016</p>
                        <p class="col-xl-6">Marque : BMW x1</p>
                        <p class="col-xl-6">Color : Black</p>
                        <p class="col-xl-6">Nº Places : 6</p>
                        <p class="col-xl-6">Km : 125K</p>
                        <p class="col-xl-12 mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row rounded h-100 d-flex align-items-center ">
                    <div class="col-lg-12">
                        <a href="{{url('/assurances')}}">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                                <p class="mb-2">Assurances</p>
                                <b class="mb-0">8 Fois</b>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{url('/controles')}}" >
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                                <p class="mb-2">Controle Technique</p>
                                <b class="mb-0">5 Fois</b>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{url('/accidents')}}">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <i class="fa fa-chart-area fa-3x text-primary"></i>
                                <p class="mb-2">Accidents</p>
                                <b class="mb-0">2 Fois</b>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{url('/cars')}}">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                                <i class="fa fa-chart-line fa-3x text-primary"></i>
                                <p class="mb-2">Gains TTC</p>
                                <b class="mb-0">253534 DH</b>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection