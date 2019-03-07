@extends('layouts/app')

@section('content')
  <div>
    <h1>All articles</h1>

    <ol>
		@foreach($articles as $article)
			<li><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></li>
		@endforeach
		</ol>
  
  
  </div>



@endsection