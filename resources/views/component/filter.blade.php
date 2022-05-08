{{-- @extends('layouts.app') --}}

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
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false"><i class="fa fa-plus mr-2"></i>Crear nuevo factura</a>
                </li>

                <div class="ml-auto d-inline-flex">
                    <form method="POST" action="{{ route('billing.filters') }}">
                        @csrf

                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="Pagado" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Pagado
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                        value="No Pagado">
                                    <label class="form-check-label" for="exampleRadios2">
                                        No Pagado
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-4"> <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>

                        {{-- <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info">Pagado</button>
                            <button type="button" class="btn btn-warning">No Pagado</button>
                        </div> --}}
                    </form>
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
                                <th scope="col">Tipo</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estado</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>

                    @include('users.create')

                </div>
            </div>
        </div>

    </div>

@endsection


@section('js')
    @include('component.datatable')

    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('billing.filters') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'num_invoice',
                        name: 'num_invoice'
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
                        data: 'status',
                        name: 'status'
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
                $(location).attr('href', 'user/' + product_id);
            });

        });
    </script>
@stop
