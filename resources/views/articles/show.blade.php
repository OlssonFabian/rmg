@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
<div class="container mt-3 col-7">
      <h1><em>Name: </em>{{$article->name}}</h1>
      <div class="col-9">
            <img src="{{$article->image_url}}" width="100%" margin="0">
      </div>
      <p><em>Description: </em>{{$article->description}}</p>
      <p><em>Town: </em>{{$town}}</p>
      <p><em>Category: </em> {{$article->category->name}}</p>
      <p><em>Created: </em>{{$article->created_at}}</p>

{{--  Har implementerat delete funktionalitet men det fanns inte med på kraven så kommenterar ut den  <form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method('DELETE')

            <input type="submit" value="Delete Article" class="btn btn-danger">
      </form> --}}

      <a href="/articles/{{ $article->slug }}/edit" class="btn btn-warning">Edit
            Article</a>
</div>
@endsection
