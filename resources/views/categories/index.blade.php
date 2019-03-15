@extends('layouts/app')

@section('content')
	<div class="container mt-3">

        <p>all articles goes here aswell</p>
        @foreach($articles as $article)
            <div class="col-3">
                <h2 class="text-center">{{ $article->name }}</h2>
                <img class="img-responsive" src="{{ $article->image_url }}">
                <p class="text-center">{{ $article->category->name }}</p>
                <p class="text-center">{{ $article->description }}</p>
                <p class="text-center">{{ $article->rent_price }}</p>
            </div>
		@endforeach

	</div>
@endsection
