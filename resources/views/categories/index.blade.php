@extends('layouts/app')

@section('content')
	<div class="container mt-3">

        @include('partials/validation_errors')

        <div class="row">
            @foreach($articles as $article)
            <div class="col-4">
            @if($article->user_id != Auth::user()->id)
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/orders" class="mt-3 form-group">
                        @csrf
                            <input type="date" class="form-control mt-2" placeholder="Rent from: ex 2019-01-01" name="date_start" value="{{ old('date_start') }}" min="{{ $today }}">
                            <input type="date" class="form-control mt-2" placeholder="Rent to: ex 2019-01-01" name="date_end" value="{{ old('date_end') }}" min="{{ $today }}">
                            <input type="radio" name="article_id" value="{{ $article->id }}"  id="picture">
                            <label for="picture">
                                <img src="{{ $article->image_url }}" alt="bild på artikel" height="250" width="250">
                            </label>
                            <input type="text" readonly class="form-control-plaintext" value="Article Name: {{ $article->name }}">
                            <input type="text" readonly class="form-control-plaintext" value="Article Description: {{ $article->description }}">
                            <input type="text" readonly class="form-control-plaintext" value="Price pr Day: {{ $article->rent_price }} kr">
                            <p class="text-left"><em><b>Category:</b></em> {{ $article->category->name }}</p>
                            <input type="submit" class="btn btn-primary mt-3" value="Book Your Order">
                        </form>          
                    </div>
                </div>
            @endif
            </div>
            @endforeach
        </div>
        <br><br><br>
        <a href="{{ url()->previous() }}">&laquo; Back to all Articles</a>
    </div>
@endsection
