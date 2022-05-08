@extends('layouts.app')

@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        @if (@Auth::user()->hasRole(['admin']))
                            <div class="alert alert-primary" role="alert">
                                Rol admin
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
