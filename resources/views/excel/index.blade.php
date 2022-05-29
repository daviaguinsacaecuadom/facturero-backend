@extends('adminlte::page')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="container mt-5">
            <h3>Importar alumnos</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @if (isset($numRows))
                <div class="alert alert-sucess">
                    Se importaron {{ $numRows }} registros.
                </div>
            @endif

            <form action="{{ route('excel.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-3">
                        <div class="custom-file">
                            <input type="file" name="excel" class="custom-file-input" id="excel">
                            <label class="custom-file-label" for="alumnos">Seleccionar archivo</label>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Importar</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="{{route('excel.create')}}">Descargar</a> <br>
            <a href="{{route('pdf.index')}}">Generar PDF</a>
        </div>
    </div>
@endsection
