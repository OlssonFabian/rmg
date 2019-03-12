@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
	<div class="container mt-3 col-3">
       <p>{{$articles->name}}</p>
       <p>{{$articles->description}}</p>
        <div class="col-12">
              <img src="{{$articles->image_url}}" height="70vw">
        </div>

	</div>

@endsection
