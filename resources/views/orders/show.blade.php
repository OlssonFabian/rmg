
@extends('layouts.app')

@section('content')
  <div class="container mt-3">

    <h1>More information</h1>
    <br>
    <hr class="red-border">
    <br>
        <ul class="list-group">
            @if($order->user_id != Auth::id())
                @foreach($user as $userItem)
                    <li class="list-group-item"><span style="color: red;">Customer Name:</span> {{ $userItem->name }}</li>
                    <li class="list-group-item"><span style="color: red;">Customer Phone number:</span> {{ $userItem->phone_nr }}</li>
                    <li class="list-group-item"><span style="color: red;">Customer Address:</span> {{ $userItem->address }}</li>
                    <li class="list-group-item"><span style="color: red;">Customer Town:</span> {{ $userItem->town }}</li>
                    <li class="list-group-item"><span style="color: red;">Customer E-mail:</span> {{ $userItem->email }}</li>
                @endforeach
            @endif
            @foreach($users as $index => $user)
                @if($user->id == $allArticles[$index]->user_id)
                    <li class="list-group-item"><span style="color: red;">Owner Name:</span> {{ $user->name }}</li>
                    <li class="list-group-item"><span style="color: red;">Owner Phone number:</span> {{ $user->phone_nr }}</li>
                    <li class="list-group-item"><span style="color: red;">Owner Address:</span> {{ $user->address }}</li>
                    <li class="list-group-item"><span style="color: red;">Owner Town:</span> {{ $user->town }}</li>
                    <li class="list-group-item"><span style="color: red;">Owner E-mail:</span> {{ $user->email }}</li>
                @endif
            @endforeach
            @if($order->user_id == Auth::id())
                @foreach($bookedArticleCategory as $bookedArticleCategoryItem)
                    <li class="list-group-item"><span style="color: red;">Category:</span> {{ $bookedArticleCategoryItem->name }}</li>
                @endforeach    
            @endif
            @if($order->user_id != Auth::id())
                @foreach($category as $categoryItem)
                    <li class="list-group-item"><span style="color: red;">Category:</span> {{ $categoryItem->name }}</li>
                @endforeach
            @endif
            @if($order->user_id == Auth::id())
                @foreach($bookedArticle as $bookedArticleItem)   
                    <li class="list-group-item"><span style="color: red;">Article Name:</span> {{ $bookedArticleItem->name }}</li>
                    <li class="list-group-item"><span style="color: red;">Article Description:</span> {{ $bookedArticleItem->description }}</li>
                @endforeach
            @endif
            @foreach($articles as $article)
                @if($order->article_id == $article->id)
                    <li class="list-group-item"><span style="color: red;">Article Name:</span> {{ $article->name }}</li>
                    <li class="list-group-item"><span style="color: red;">Article Description:</span> {{ $article->description }}</li>
                @endif
            @endforeach
            @foreach($totalPrice as $price)
                <li class="list-group-item"><span style="color: red;">Total Price:</span> {{ $price->rent_price * ($order->numberOfDays()+1) }}</li>
            @endforeach
            @if($order->user_id == Auth::id())
                @foreach($bookedArticle as $bookedArticleItem)
                <li class="list-group-item mx-auto en-bild"><img src="{{ $bookedArticleItem->image_url }}" alt="En bild jävel" height="250" width="250"></li>
                @endforeach
            @endif
            @foreach($articles as $article)
                @if($order->article_id == $article->id)
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