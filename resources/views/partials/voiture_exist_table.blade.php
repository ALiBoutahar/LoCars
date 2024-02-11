@if(isset($voitures_exist) && count($voitures_exist) > 0)
    <div class="col-md-12 p-2">
        <table id="myTable" class="table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>nom</th>
                    <th>prix/j</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($voitures_exist as $a)
                    <tr class="text-center">
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->nom }}</td>
                        <td>{{ $a->prix }}</td>
                    </tr>
                @endforeach      
            </tbody>
        </table>
    </div>
@endif