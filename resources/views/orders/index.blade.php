
@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h1>My Order History:</h1>
        @include('partials/status')
        <br>
        <hr style="border: 1px solid red; border-radius: 50px;">
        <br>

        @foreach($ownOrders as $ownOrder)
            <ul class="list-group mt-3">
                <li class="list-group-item"><a href="/orders/{{ $ownOrder->id }}">Order Number: {{ $ownOrder->id }}</a></li>
            </ul>
            <br>
            <br>
        @endforeach
        <hr style="border: 5px solid #006f94; border-radius: 50px;">
        <br>
        <br>
        <h1>Orders To Other Geezers: </h1>
        <br>
        <hr style="border: 1px solid red; border-radius: 50px;">
        <br>

        @foreach($orders as $order)
            <ul class="list-group mt-3">
                <li class="list-group-item">Order Number:<a href="/orders/{{ $order->id }}"> {{ $order->id }} ({{ $order->article->name }})</a></li>
                @if($order->daysUntilStart() > 0)
                    <li class="list-group-item">Days until your article will go on loan: {{ $order->daysUntilStart() }}</li>
                @endif
                @if($order->daysUntilStart() == 0)
                    <li class="list-group-item">Your article will go on loan today 🕺🏼 </li>
                @endif
            </ul>
        <br>
        <br>
        @endforeach
    </div>
@endsection