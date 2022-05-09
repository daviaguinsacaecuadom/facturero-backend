@extends('adminlte::page')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf
        @method('PUT')

        <h4><span class="badge badge-pill badge-primary">1</span>Datos personales</h4>
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter name" name="name" value="{{ $user->name }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="email" value="{{ $user->email }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input id="prodId" name="password" type="hidden" value="{{ $user->password }}">

        {{-- <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div> --}}

        <!--Rol-->


        @if (@Auth::user()->hasRole(['admin']))
            <h4><span class="badge badge-pill badge-primary">2</span>Asignar Rol</h4>

            <div class="form-group">
                <select multiple class="form-control" id="exampleFormControlSelect2" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif


        <br>
        @if (@Auth::user()->hasAnyRole(['admin', 'edit']))
            <button type="submit" class="btn btn-success">Guardar</button>
        @endif
        <button type="button" class="btn btn-secondary"><a href="{{ route('user.index') }}">Cancelar</a></button>


    </form>

    @if (@Auth::user()->hasRole('admin'))
        <form role='form' method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Borrar</button>
        </form>
    @endif
@endsection
