@extends('layouts/app')
@include('partials/validation_errors')

@section('content')
	<div class="container mt-3">

		<h1>All my articles</h1>


		<ol>
		@foreach($articles->all() as $article)
			<li><a href="/articles/{{ $article->slug }}">{{ $article->name }}</a></li>
		@endforeach
		</ol>

		<a href="/articles/create" class="btn btn-success">Create Rentable</a>
	</div>
@endsection
