
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
                @foreach($category as $categoryItem)
                    <li class="list-group-item"><span style="color: red;">Category:</span> {{ $categoryItem->name }}</li>
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
            <h1>Confirm or Deny order {{ $order->id }}</h1>
            
            @include('partials/validation_errors')

            <form method="POST" action="/orders/{{ $order->id }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <input type="hidden" name="article_id" id="article_id" class="form-control" placeholder="article_id" required readonly value="{{ old('article_id') ? old('article_id') : $order->article_id }}">
                </div>

                <div class="form-group">
                    <input type="hidden" name="date_start" id="date_start" class="form-control"   placeholder="date_start" required readonly value="{{ old('date_start') ? old('date_start') : $order->date_start }}">
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="date_end" id="date_end" class="form-control" placeholder="date_end" required readonly value="{{ old('date_end') ? old('date_end') : $order->date_end }}">
                </div>
                
                <input type="submit" value="Confirm Order" class="btn btn-success mt-3">
            </form>

            <form method="POST" action="/orders/{{ $order->id }}">
                @csrf
                @method('DELETE')

                <input type="submit" value="Deny Order" class="btn btn-danger mt-1">
            </form>
        @endif
        <br>
        <br>
        <a href="/orders">&laquo; Back to your orders</a>
    </div>
@endsection