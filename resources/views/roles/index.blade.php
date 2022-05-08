{{-- @extends('layouts.app') --}}

@extends('adminlte::page')

@section('content')
    <br>

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true"><i class="fa fa-list mr-2"></i>admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false"><i class="fa fa-plus mr-2"></i>edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#client" role="tab"
                        aria-controls="profile" aria-selected="false"><i class="fa fa-plus mr-2"></i>client</a>
                </li>

            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('roles.form',comapact(''))
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    xd2
                </div>

                <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="profile-tab">
                    xd3
                </div>

            </div>
        </div>

    </div>
@endsection
