{{-- <!DOCTYPE html>
<html>

<head>
    <title>Laravel Datatables Filter with Dropdown Example - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Laravel Datatables Filter with Dropdown Example - ItSolutionStuff.com</h1>

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label><strong>Status :</strong></label>
                    <select id='status' class="form-control" style="width: 200px">
                        <option value="">--Select Status--</option>
                        <option value="admin">admin</option>
                        <option value="test">test</option>
                    </select>
                </div>
            </div>
        </div>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</body>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('billing.filter') }}",
                data: function(d) {
                    d.status = $('#status').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
            ]
        });

        $('#status').change(function() {
            table.draw();
        });

    });
</script>

</html> --}}

@extends('adminlte::page')

@section('content')
    <br>

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true"><i class="fa fa-list mr-2"></i>Lista de facturas</a>
                </li>

                @if (@Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false"><i class="fa fa-plus mr-2"></i>Crear nuevo
                            factura</a>
                    </li>
                @endif


                <div class="ml-auto d-inline-flex">
                    <select id="isPay" class="form-control isPay">
                        <option value="">Todo</option>
                        <option value="Pagado">Pagado</option>
                        <option value="No Pagado">No Pagado</option>
                    </select>
                </div>

            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th scope="col">Factura a</th>
                                <th scope="col">Num de factura</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Monto</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                @if (@Auth::user()->hasRole('admin'))
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>

                        @include('billings.create', compact('users'))

                    </div>
                @endif

            </div>
        </div>

    </div>

@endsection


@section('js')
    @include('component.datatable')

    <script type="text/javascript">
        $(document).ready(function() {
            //$(".isPay").select2();
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searching: false,
                ajax: {
                    url: "{{ route('billing.filter') }}",
                    data: function(d) {
                        d.isPay = $("#isPay").val().toLowerCase()
                    }
                },
                dataType: 'json',
                type: "POST",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'num_invoice',
                        name: 'num_invoice'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'mount',
                        name: 'mount'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $('body').on('click', '.edit', function() {
                var product_id = $(this).data('id');
                $(location).attr('href', 'billing/' + product_id);
            });

            // $('#filter').click(function() {

            //     //alert('xd');
            //     table.draw()

            // });
            $('#isPay').change(function() {
                table.draw();
            });

        });
    </script>
@stop
