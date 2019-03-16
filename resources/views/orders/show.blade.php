
@extends('layouts.app')

@section('content')
  <div class="container mt-3">

    <h1>More information</h1>
    <br>
    <hr style="border: 1px solid red;">
    <br>
        <ul class="list-group">
            @if($order->user_id != Auth::id())
                <li class="list-group-item"><span style="color: red;">Customer Name:</span> {{ $user[0]->name }}</li>
                <li class="list-group-item"><span style="color: red;">Customer Phone number:</span> {{ $user[0]->phone_nr }}</li>
                <li class="list-group-item"><span style="color: red;">Customer Address:</span> {{ $user[0]->address }}</li>
                <li class="list-group-item"><span style="color: red;">Customer Town:</span> {{ $user[0]->town }}</li>
                <li class="list-group-item"><span style="color: red;">Customer E-mail:</span> {{ $user[0]->email }}</li>
            @endif
            @if($order->user_id == Auth::id())
                <li class="list-group-item"><span style="color: red;">Owner Name:</span> {{ $incommingOrderUserDetails[0]->name }}</li>
                <li class="list-group-item"><span style="color: red;">Owner Phone number:</span> {{ $incommingOrderUserDetails[0]->phone_nr }}</li>
                <li class="list-group-item"><span style="color: red;">Owner Address:</span> {{ $incommingOrderUserDetails[0]->address }}</li>
                <li class="list-group-item"><span style="color: red;">Owner Town:</span> {{ $incommingOrderUserDetails[0]->town }}</li>
                <li class="list-group-item"><span style="color: red;">Owner E-mail:</span> {{ $incommingOrderUserDetails[0]->email }}</li>
            @endif
            @if($order->user_id == Auth::id())
                <li class="list-group-item"><span style="color: red;">Category:</span> {{ $bookedArticleCategory[0]->name }}</li>
            @endif
            @if($order->user_id != Auth::id())
                <li class="list-group-item"><span style="color: red;">Category:</span> {{ $category[0]->name }}</li>
            @endif
            @if($order->user_id == Auth::id())
                <li class="list-group-item"><span style="color: red;">Article Name:</span> {{ $bookedArticle[0]->name }}</li>
                <li class="list-group-item"><span style="color: red;">Article Description:</span> {{ $bookedArticle[0]->description }}</li>
                <li class="list-group-item"><span style="color: red;">Total Price:</span> {{ $totalprice }}</li>
                <li class="list-group-item mx-auto en-bild"><img src="{{ $bookedArticle[0]->image_url }}" alt="En bild jävel" height="250" width="250"></li>
            @endif
            @foreach($articles as $article)
                @if($order->article_id == $article->id)
                    <li class="list-group-item"><span style="color: red;">Article Name:</span> {{ $article->name }}</li>
                    <li class="list-group-item"><span style="color: red;">Article Description:</span> {{ $article->description }}</li>
                    <li class="list-group-item"><span style="color: red;">Total Price:</span> {{ $totalprice }}</li>
                    <li class="list-group-item mx-auto en-bild"><img src="{{ $article->image_url }}" alt="En bild jävel" height="250" width="250"></li>
                @endif
            @endforeach
        </ul>
        @if($order->user_id != Auth::id() && $order->confirmed == 0 ) 
            <a href="/orders/{{ $order->id }}/edit" class="btn btn-primary mt-3">Manage Order</a>
        @endif
        <br>
        <br>
        <a href="/orders">&laquo; Back to your orders</a>
    </div>
@endsection