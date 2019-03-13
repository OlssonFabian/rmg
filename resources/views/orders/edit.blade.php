
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Confirm or Deny order {{ $order->id }}</h1>
        <h5>Customer: {{ $order->name }}</h5>
        <h5>The rent period is from {{ $order->date_start }} to {{ $order->date_end }}</h5>
        <br>
        <hr style="border: 1px solid red;">

        @include('partials/validation_errors')

        <form method="POST" action="/orders/{{ $order->id }}">
            
            @csrf
            @method('PUT')
            
            <div class="form-group">
				<input type="text" name="article_id" id="article_id" class="form-control" placeholder="article_id" required readonly value="{{ old('article_id') ? old('article_id') : $order->article_id }}">
			</div>

			<div class="form-group">
				<input type="text" name="date_start" id="date_start" class="form-control"   placeholder="date_start" required readonly value="{{ old('date_start') ? old('date_start') : $order->date_start }}">
            </div>
            
            <div class="form-group">
				<input type="text" name="date_end" id="date_end" class="form-control" placeholder="date_end" required readonly value="{{ old('date_end') ? old('date_end') : $order->date_end }}">
            </div>
            
            <input type="submit" value="Confirm Order" class="btn btn-success mt-3">
        </form>

        <form method="POST" action="/orders/{{ $order->id }}">
            @csrf
            @method('DELETE')

            <input type="submit" value="Deny Order" class="btn btn-danger mt-1">
        </form>
    </div>
@endsection