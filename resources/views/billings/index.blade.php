@extends('adminlte::page')

@section('content')
    <br>

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"><i class="fa fa-list mr-2"></i>Lista de facturas</a>
                </li>

                @if (@Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false"><i class="fa fa-plus mr-2"></i>Crear nuevo
                            factura</a>
                    </li>
                @endif

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('pdf.index') }}" aria-controls="profile" aria-selected="false"><i
                            class="fa fa-book fa-fw mr-2"></i>Generar PDF</a>
                </li> --}}

                <div class="ml-auto d-inline-flex">
                    <label for="">Filtrar</label>

                    <select id="isPay" class="form-control isPay" name="status">
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
                                <th scope="col">Invoce a</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Num de invoce</th>
                                <th scope="col">Status</th>
                                <th scope="col">Type</th>
                                <th scope="col">Mount</th>
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
        $(function() {
            var i = 0;
            $('#btn-add').click(function(e) {
                e.preventDefault();
                i++;

                //let user = document.querySelector('#newData').dataset.user;
                // let parsed;

                try {
                    let user = {!! json_encode($users) !!};
                    //console.log(user[0]);
                    user.forEach(element => {
                        console.log(element['name']);
                    });

                    //parsed = JSON.stringify(user);
                    console.log('✅ JSON array parsed successfully');
                } catch (err) {
                    console.log('⛔️ invalid JSON provided');
                    // report error
                }

                //console.log(user[0]['name']);

                $('#newData').append(
                    '<div id="newRow' + i + '"' +
                    '<div class="form-row">' +
                    '<div class="form-group col-md-2">' +
                    '    <label for="inputZip">Cant</label>' +
                    '    <input type="number" class="form-control" name="cant_product[]" required min="0">' +
                    '</div>' +
                    '<div class="form-group col-md-8">'+
                    '   <label for="inputState">Product</label>'+
                    '   <select id="inputState" class="form-control" name="product[]">'+
                    '       @foreach ($users as $user)'+
                    '       <option value="{{ $user->id }}">{{ $user->name }}</option>'+
                    '       @endforeach'+
                    '   </select>'+
                    '</div>'+
                    '<div class="form-group col-md-2">' +
                    '<label for="inputState">Action</label> <br>' +
                    '<button id = "' + i +
                    '"type="button" class="btn btn-danger btn-delate">Delate</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
            });

            $(document).on('click', '.btn-delate', function(e) {

                //alert('xd');
                e.preventDefault();

                var id = $(this).attr('id');
                $('#newRow' + id).remove();
            });
        });


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
                    }, {
                        data: 'contact',
                        name: 'contact'
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
