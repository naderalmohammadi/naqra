@extends('layouts.app')

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
                    @auth
                    <h1>Welcome {{auth()->user()->name}}</h1>
                    @endauth
                    @guest
                    <h1>You have to sign up in order to access this service</h1>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
