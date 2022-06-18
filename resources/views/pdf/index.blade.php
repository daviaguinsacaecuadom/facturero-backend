<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <h3>Facturas</h3>

    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col">Factura a</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Num de factura</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Monto</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <th>{{ $d->name }}</th>
                                <th>{{ $d->num_invoice }}</th>
                                <th><span class="badge badge-warning">'{{ $d->phone }}'</span></th>

                                @if ($d->status == 'Pagado')
                                    <th><span class="badge badge-success">{{ $d->status }} </span></th>
                                @else
                                    <th><span class="badge badge-danger">{{ $d->status }} </span></th>
                                @endif
                                <th>{{ $d->type }}</th>
                                <th>{{ $d->mount }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
