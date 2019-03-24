@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="full-height">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Welcome to your Dashboard</h1>
                        <br>
                        <ul>
                            <li><h5><a href="{{ url('/') }}">Find Articles</a></h5></li>
                            <li><h5><a href="{{ url('/articles') }}">See Your Articles</a></h5></li>
                            <li><h5><a href="{{ url('/orders') }}">See Your Orders</a></h5></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
