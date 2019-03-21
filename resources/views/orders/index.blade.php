
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
            
        @include('partials/pending')

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">My Incoming Orders</h1>
            </div>
        </div>

        {{--  visar bara godkända order:  --}}
        
        <div class="card">
            <div class="card-body">
                <h3>Accepted Orders:</h3>
                <ul class="list-group">
                    @foreach($ownOrders as $ownOrder)
                        @if($ownOrder->confirmed == 1)
                            <li class="list-group-item mt-3"><a href="/orders/{{ $ownOrder->id }}"><em>Order Number: {{ $ownOrder->id }}</em></a><br>
                            <em style="color: red;">Article Name:</em><a href="/articles/{{ $ownOrder->article->slug }}"> {{ $ownOrder->article->name }}</a><br>
                            <em style="color: red;">Start Date:</em> {{ $ownOrder->date_start->toDateString() }}<br><em style="color: red;">Stop Date:</em> {{ $ownOrder->date_end->toDateString() }}<br></li>
                        @endif
                    @endforeach
                </ul>
                <hr class="red-border">
                <h3 class="mt-3">Pending Orders:</h3>
                <ul class="list-group">
                    @foreach($ownOrders as $ownOrder)
                        @if($ownOrder->confirmed == 0)
                            <li class="list-group-item mt-3"><a href="/orders/{{ $ownOrder->id }}"><em>Order Number: {{ $ownOrder->id }}</em></a><br>
                            <em style="color: red;">Article Name:</em><a href="/articles/{{ $ownOrder->article->slug }}"> {{ $ownOrder->article->name }}</a><br>
                            <em style="color: red;">Start Date:</em> {{ $ownOrder->date_start->toDateString() }}<br><em style="color: red;">Stop Date:</em> {{ $ownOrder->date_end->toDateString() }}<br></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div> 
        <br><br>
        
        <hr class="blue-border">
        
        <br><br>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">My Outgoing Orders</h1>
            </div>
        </div>   
        
        {{--  visar alla utgående order:  --}}
        
        <div class="card">
            <div class="card-body">
                <h3>Following Orders are still pending: </h3>
                <ul class="list-group">
                     @foreach($orders as $order)
                        @if($order->confirmed == 0)
                            <li class="list-group-item mt-3"><em><a href="/orders/{{ $order->id }}">Order Number: {{ $order->id }}</a></em><br>
                            <em style="color: red;">Article Name:</em><a href="/articles/{{ $order->article->slug }}"> {{ $order->article->name }}</a><br>
                            <em style="color: red;">Start Date:</em> {{ $order->date_start->toDateString() }}<br><em style="color: red;">Stop Date:</em> {{ $order->date_end->toDateString() }}<br></li>
                        @endif
                    @endforeach
                </ul>
                <hr class="red-border">
                <h3 class="mt-3">These Orders are accepted: </h3>
                <ul class="list-group">
                     @foreach($orders as $order)
                        @if($order->confirmed == 1)
                            <li class="list-group-item mt-3"><em><a href="/orders/{{ $order->id }}">Order Number: {{ $order->id }}</a></em><br>
                            <em style="color: red;">Article Name:</em><a href="/articles/{{ $order->article->slug }}"> {{ $order->article->name }}</a><br>
                            <em style="color: red;">Start Date:</em> {{ $order->date_start->toDateString() }}<br><em style="color: red;">Stop Date:</em> {{ $order->date_end->toDateString() }}<br></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div> 
    </div>
@endsection