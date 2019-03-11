
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Create a new Order</h1>
        <br>
        <hr style="border: 1px solid red;">
        <br>
        @include('partials/validation_errors')
        
        <form method="POST" action="/orders" class="mt-3 form-group">
            @csrf
            <div class="row">
                <div class="col-12">
                    <input type="text" class="form-control mt-2" placeholder="Rent from: ex 2019-01-01" name="date_start">
                    <input type="text" class="form-control mt-2" placeholder="Rent to: ex 2019-01-01" name="date_end">
                </div>
                @foreach($articles as $article)
                <div class="col-md-6">
                    <input type="radio" name="article_id" value="{{ $article->id }}"  id="picture">
                    <label for="picture">
                        <img src="{{ $article->image_url }}" alt="bild på artikel" height="250" width="250">
                    </label>
                    <input type="text" readonly class="form-control-plaintext" value="Article Name: {{ $article->name }}">
                    <input type="text" readonly class="form-control-plaintext" value="Article Description: {{ $article->description }}">
                    <input type="text" readonly class="form-control-plaintext" value="Price pr Day: {{ $article->rent_price }} kr">
                </div>
                @endforeach
            </div>
            <input type="submit" class="btn btn-primary mt-3" value="Book Your Order">
        </form>
        <a href="/orders">&laquo; Back to your orders</a>
    </div>
@endsection