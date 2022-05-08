<form method="POST" action="{{ route('billing.store') }}">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Factura a nombre de:</label>
            <select id="inputState" class="form-control" name="user_id">

                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Tipo</label>
            <select id="inputState" class="form-control" name="type">
                <option selected>Factura</option>
                <option>Rompe</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Num Factura</label>
            <input type="number" class="form-control" name="num_invoice" required min="0">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Estado</label>
            <select id="inputState" class="form-control" name="status">
                <option value="Pagado">Pagado</option>
                <option value="No Pagado">No Pagado</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Monto</label>
            <input type="number" min="0" class="form-control" id="inputPassword4" placeholder="0" name="mount" value="0">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
