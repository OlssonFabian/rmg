@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
	<div class="container mt-3 col-7">
       <h2>{{$articles->name}}</h2>
       <p>{{$articles->description}}</p>
        <div class="col-9">
              <img src="{{$articles->image_url}}" width="100vw">
        </div>
	</div>
@endsection
