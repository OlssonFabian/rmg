
@extends('layouts.app')

@section('content')
  <div class="container mt-3">

    <h1>More information</h1>
    <br>
    <hr style="border: 1px solid red;">
    <br>
        <ul class="list-group">
            @if($order->user_id != Auth::id()) 
                <li class="list-group-item"><span style="color: red;">Phone number:</span> {{ $user->phone_nr }}</li>
                <li class="list-group-item"><span style="color: red;">Address:</span> {{ $user->address }}</li>
                <li class="list-group-item"><span style="color: red;">Town:</span> {{ $user->town }}</li>
                <li class="list-group-item"><span style="color: red;">E-mail:</span> {{ $user->email }}</li>
            @endif
            <li class="list-group-item"><span style="color: red;">Start of Hire:</span> {{ $order->date_start }}</li>
            <li class="list-group-item"><span style="color: red;">End of Hire:</span> {{ $order->date_end }}</li>
            <li class="list-group-item"><span style="color: red;">Category:</span> {{ $category[0]->name }}</li>
            @foreach($articles as $article)
                <li class="list-group-item"><span style="color: red;">Article Name:</span> {{ $article->name }}</li>
                <li class="list-group-item"><span style="color: red;">Article Description:</span> {{ $article->description }}</li>
                <li class="list-group-item mx-auto en-bild"><img src="{{ $article->image_url }}" alt="En bild jävel" height="250" width="250"></li>
            @endforeach
        </ul>
        @if($order->user_id != Auth::id()) 
            <a href="/orders/{{ $order->id }}/edit" class="btn btn-primary mt-3">Manage Order</a>
        @endif
        <br>
        <br>
        <a href="/orders">&laquo; Back to your orders</a>
    </div>
@endsection