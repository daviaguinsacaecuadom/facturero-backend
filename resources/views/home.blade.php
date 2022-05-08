{{-- @extends('layouts.app') --}}

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

                        @if (@Auth::user()->hasRole('client'))
                            <h2>Rol de cliente</h2>
                        @endif

                        @if (@Auth::user()->hasRole('admin'))
                            <h2>Rol adminisrador {{auth()->user()->id}}</h2>
                        @endif

                        @if (@Auth::user()->hasRole('edit'))
                            <h2>Rol de editar {{auth()->user()->id}}</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
