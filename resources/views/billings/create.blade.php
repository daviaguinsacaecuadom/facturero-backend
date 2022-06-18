<form method="POST" action="{{ route('billing.store') }}">
    @csrf

    <h4><span class="badge badge-pill badge-primary">1</span>Invoice details</h4>
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
            <input type="number" min="0" class="form-control" id="inputPassword4" placeholder="0" name="mount"
                value="0">
        </div>
    </div>

    <h4><span class="badge badge-pill badge-primary">1</span>Products</h4>

    <div class="newData" id="newData" data-user=@json($users)>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputZip">Cant</label>
                <input type="number" class="form-control" name="cant_product[]" required min="0">
            </div>
            <div class="form-group col-md-8">
                <label for="inputState">Product</label>
                <select id="inputState" class="form-control" name="product[]">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
                </select>
            </div>

            {{-- <div class="form-group col-md-2">
                <label for="inputState">Action</label> <br>
                <button type="button" class="btn btn-danger">Delate</button>
            </div> --}}

        </div>
    </div>
    <button class="btn btn-warning" id="btn-add">Add Product</button> <br> <br>
    <button type="submit" class="btn btn-primary">Create invoice</button>
    {{-- <button type="submit" class="btn btn-secondary">Generate PDF</button> --}}
</form>
