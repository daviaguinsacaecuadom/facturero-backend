<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <h4><span class="badge badge-pill badge-primary">1</span>Datos personales</h4>
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter name" name="name">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>

    <h4><span class="badge badge-pill badge-primary">2</span>Asignar Rol</h4>

    <div class="form-group">
        <select multiple class="form-control" id="exampleFormControlSelect2" name="role">
            @foreach ($roles as $role)
                <option>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>


    {{-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
        <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
        <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" />
        <label class="form-check-label" for="flexCheckChecked1">Checked checkbox</label>
    </div> --}}

    <button type="submit" class="btn btn-primary">Crear</button>



</form>
