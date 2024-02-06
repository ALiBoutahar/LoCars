@extends('app')
@section('main')

    <div class="container-fluid pt-3 px-4">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-sm-12 col-xl-12 d-flex justify-content-between">
                <h5 class="">Clients History</h5>
                <a class="btn btn-sm btn-primary" href="{{url('/history')}}">x</a>
            </div>
        </div>
    </div>
    <div class="container-fluid d-none d-lg-block pt-3 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="table-responsive">
                <table id="myTable" class="table text-center align-middle table-bordered table-hover">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">Cin</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CB123456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>CB123456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>3</td>
                            <td>CB123456</td>
                            <td>boutahar</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>4</td>
                            <td>CB123456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>CB123456</td>
                            <td>alaoui</td>
                            <td>salma</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>6</td>
                            <td>CB123456</td>
                            <td>atoulid</td>
                            <td>bader</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>7</td>
                            <td>CB123456</td>
                            <td>boutahar</td>
                            <td>ayoub</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>CB123456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>9</td>
                            <td>CB123456</td>
                            <td>idrissi</td>
                            <td>youness</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>10</td>
                            <td>CB123456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>CB123456</td>
                            <td>omari</td>
                            <td>simo</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>12</td>
                            <td>CB123456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>13</td>
                            <td>CB123456</td>
                            <td>kharoubi</td>
                            <td>ahmed</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>CB162356</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>15</td>
                            <td>CB166456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>16</td>
                            <td>CB137456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>CB123496</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>18</td>
                            <td>CB195456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        </tr>
                        <tr>
                            <td>19</td>
                            <td>CB125456</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>CB125684</td>
                            <td>Srija</td>
                            <td>Anas</td>
                            <td>0685347543</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-info" href="{{url('/show_client')}}">Detail</a>
                                <a class="btn btn-sm btn-success" href="{{url('/edit_client')}}">Modifier</a>
                                <a class="btn btn-sm btn-primary" href="#">Suprimer</a>
                            </td>                        
                        </tr>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
            
        </div>
    </div>

  
    <!-- Modal -->
    <div class="modal fade" id="chart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
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
    </div>

@endsection