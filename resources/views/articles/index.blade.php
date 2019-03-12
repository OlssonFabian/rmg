@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
	<div class="container mt-3">

		<h1>All my articles</h1>

		@include('partials/status')

		<ol>
		@foreach($articles as $article)
			<li><a href="/articles/{{ $article->id }}">{{ $article->name }}</a></li>
		@endforeach
		</ol>

		<a href="/articles/create">Create a New Article</a>
	</div>
@endsection
