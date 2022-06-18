<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <h4><span class="badge badge-pill badge-primary">1</span>Personal information</h4>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('name')}}"
            name="name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control"name="email">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
    </div>

    <h4><span class="badge badge-pill badge-primary">2</span>Role</h4>

    <div class="form-group">
        <select multiple class="form-control" id="exampleFormControlSelect2" name="role">
            @foreach ($roles as $role)
                <option>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create user</button>



</form>
