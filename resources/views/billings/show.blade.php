@extends('adminlte::page')

@section('content')
    <form method="POST" action="{{ route('billing.update', $billing->id) }}">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Factura a nombre de:</label>
                <select id="inputState" class="form-control" name="user_id">

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id == $billing->user_id) selected @endif>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Tipo</label>
                <select id="inputState" class="form-control" name="type">
                    @if ($billing->type == 'Factura')
                        <option selected>Factura</option>
                        <option>Rompe</option>
                    @else
                        <option>Factura</option>
                        <option selected>Rompe</option>
                    @endif

                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Num Factura</label>
                <input type="text" class="form-control" name="num_invoice" required value="{{ $billing->num_invoice }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputState">Estado</label>
                <select id="inputState" class="form-control" name="status">
                    @if ($billing->status == 'Pagado')
                        <option selected>Pagado</option>
                        <option>No Pagado</option>
                    @else
                        <option>Pagado</option>
                        <option selected>No Pagado</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Monto</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="0" name="mount"
                    value="{{ $billing->mount }}">
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
        <br>
        @if (@Auth::user()->hasAnyRole(['admin', 'edit']))
            <button type="submit" class="btn btn-success">Guardar</button>
        @endif

        <button type="button" class="btn btn-secondary"><a href="{{ route('billing.index') }}">Cancelar</a></button>

    </form>
    @if (@Auth::user()->hasRole('admin'))
        <form role='form' method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Borrar</button>
        </form>
    @endif
@endsection
