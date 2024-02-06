@extends('app')
@section('main')


    {{-- <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Client</p>
                        <h6 class="mb-0">25</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Reservation</p>
                        <h6 class="mb-0">12</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Voiture R</p>
                        <h6 class="mb-0">2</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Voiture D</p>
                        <h6 class="mb-0">6</h6>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="mb-0">Recherche Voitures Disponible</h6>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="date">
                    <input class="form-control bg-dark border-0 ms-2" type="date">
                    <input class="form-control bg-dark border-0 ms-2" type="submit" value="Recherche">
                </form>
            </div>
            
            {{-- <div class="table-responsive mt-5">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>

    <!-- Chart Start -->
    <div class="container-fluid p-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Gains des voitures le mois dernier</h6>
                    <canvas id="myChart1" style="width:100%;"></canvas>
                    <script>
                        const xValues = ["car1", "car2", "car3", "car4", "car5", "car6", "car7", "car8", "car9", "car10"];
                        const yValues = [8400, 12000, 7500, 9000, 5200, 4300, 8700, 5300, 10000, 7700];
                        let barColors = "red";
                        
                        new Chart("myChart1", {
                            type: "bar",
                            data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                            },
                            options: {
                                xlegend: {display: false},
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }],
                                }
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">les Clients Par Mois</h6>
                    <canvas id="myChart2" style="width:100%"></canvas>
                    <script>
                        const y = [3,5,7,4,11,9,15,11,18,22,8,4];
                        const x = [1,2,3,4,5,6,7,8,9,10,11,12];
                        
                        new Chart("myChart2", {
                          type: "line",
                          data: {
                            labels: x,
                            datasets: [{
                              fill: false,
                              lineTension: 0,
                              backgroundColor: "rgba(0,0,255,1.0)",
                              borderColor: "rgba(0,0,255,0.1)",
                              data: y
                            }]
                          },
                          options: {
                            legend: {display: false}
                            // scales: {
                            //   yAxes: [{ticks: {min: 6, max:16}}],
                            // }
                          }
                        });
                    </script>
                </div>
            </div>
            
        </div>
    </div>

@endsection