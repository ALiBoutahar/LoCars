@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block p-4 px-4">
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <div id="myPlot1" style="width:100%"></div>
                    <script>
                        var x = ["car1", "car2", "car3", "car4", "car5", "car6", "car7", "car8", "car9", "car10"];
                        var y = [8400, 12000, 7500, 9000, 5200, 4300, 8700, 5300, 10000, 7700];
                        var data = [{
                            x:x,
                            y:y,
                            type:"bar",
                            orientation:"v",
                            marker: {color:"rgba(255,0,0,0.6)"}
                            }];
                        var layout = {title:"Gains des voitures du mois dernier"};
                        Plotly.newPlot("myPlot1", data, layout);
                    </script>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <div id="myPlot2" style="width:100%"></div>
                    <script>
                        var x = ["mois1", "mois2", "mois3", "mois4", "mois5", "mois6", "mois7", "mois8" , "mois9", "mois10", "mois11", "mois12"];
                        var y = [8400, 12000, 7500, 9000, 5200, 4300, 8700, 5300, 10000, 7700, 9000, 5200];
                        var data = [{
                            x:x,
                            y:y,
                            type:"bar",
                            orientation:"v",
                            marker: {color:"rgba(0,0,255,0.6)"}
                            }];
                        var layout = {title:"Gains du dernier Année"};
                        Plotly.newPlot("myPlot2", data, layout);
                    </script>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div id="myPlot3" style="width:100%"></div>
                    <script>
                        var y = [3,5,7,4,11,9,15,11,18,22,8,4];
                        var x = ["mois1", "mois2", "mois3", "mois4", "mois5", "mois6", "mois7", "mois8" , "mois9", "mois10", "mois11", "mois12"];
                        var data = [{
                            x:x,
                            y:y,
                            type:"line",
                            orientation:"h",
                            marker: {color:"blue"}
                        }];
                        var layout = {title:"les clients du dernier Année"};
                        Plotly.newPlot("myPlot3", data, layout);
                    </script>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <div id="myPlot4" style="width:100%"></div>
                    <script>
                        var x = ["Italy", "France", "Spain", "USA", "Argentina"];
                        var y = [55, 49, 44, 24, 15];
                        var data = [{
                            x:x,
                            y:y,
                            type:"bar",
                            orientation:"v",
                            marker: {color:"rgba(0,0,255,0.9)"}
                        }];
                        var layout = {title:"World Wide Wine Production"};
                        Plotly.newPlot("myPlot4", data, layout);
                    </script>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <div id="myPlot5" style="width:100%"></div>
                    <script>
                        var x = [55, 49, 44, 24, 15];
                        var y = ["Italy ", "France ", "Spain ", "USA ", "Argentina "];
                        var data = [{
                            x:x,
                            y:y,
                            type:"bar",
                            orientation:"h",
                            marker: {color:"rgba(255,0,0,0.9)"}
                        }];
                        var layout = {title:"World Wide Wine Production"};
                        Plotly.newPlot("myPlot5", data, layout);
                    </script>
                </div>
            </div>

        </div>
    </div>

@endsection