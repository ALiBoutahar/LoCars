@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
                <h5 class="">Detail Clients Nº 3</h5>
                <a class="btn btn-sm btn-primary" href="{{url('/clients')}}">x</a>
            </div>
            <div class="col-sm-12 col-xl-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class=" text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Srija Anas</h5>
                        <p>CB123456 <br> 0678453756 <br> srija.anas@gmail.com</p>
                        <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection