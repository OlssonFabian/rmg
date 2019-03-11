
@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h1>Your Orders</h1>
        @include('partials/status')
        <br>
        <hr style="border: 1px solid red;">
        <a href="/orders/create" class="btn btn-primary">Rent some shit</a>
        <br>

        @foreach($orders as $order)
            <ul class="list-group mt-3">
                <li class="list-group-item"><a href="/orders/{{ $order->id }}">Name: {{ $order->name }}</a></li>
            </ul>
            <br>
        @endforeach
    </div>
@endsection