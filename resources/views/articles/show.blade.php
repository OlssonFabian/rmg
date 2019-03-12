@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
	<div class="container mt-3">
       <p>{{$articles->name}}</p>
       <p>{{$articles->description}}</p>
	</div>
    <img src={{image_url}}>
@endsection
