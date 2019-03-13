@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
<div class="container mt-3 col-7">
    <h1>{{$article->name}}</h1>
    <div class="col-9">
        <img src="{{$article->image_url}}" width="100%" margin="0">
    </div>
    <p>{{$article->description}}</p>
    <p>{{$town}}</p>
    <p>material: {{$article->category->name}}</p>
    <p>Skapad: {{$article->created_at}}</p>


</div>
@endsection
