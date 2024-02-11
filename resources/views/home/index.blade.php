@extends('app')
@section('main')

    <div class="container-fluid d-none d-lg-block pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="mb-0">Recherche Voitures Disponible</h6>
                <div class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" id="dated" name="dated" type="date">
                    <input class="form-control bg-dark border-0 ms-2" id="datef" name="datef" type="date">
                    <button type="button" id="submitAction" class="w-25 btn btn-primary ms-2">Search</button>
                </div>
            </div> 
        </div>
    </div>

    <div class="container border shadow rounded mt-3">
        <div class="row">
            @include('partials.voiture_exist_table')
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#submitAction').click(function(e) {
                e.preventDefault();
                var dated = $('#dated').val();
                var datef = $('#datef').val();

                $.ajax({
                    type: 'POST',
                    url: '{{ url("/searsh-voitures") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        dated: dated,
                        datef: datef
                    },
                    success: function(data) {
                        $('#table').html(data);
                        $('#myTable').DataTable();
                        $('#dated').val('');
                        $('#datef').val('');
                    }
                });
            });
        });
    </script>

@endsection