@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')
@section('content')
  <div class="container mt-3">

    <form method="POST" action="/articles">

      @csrf

      <div class="form-group">
        <input type="text" name="name" id="name"class="form-control" placeholder="Article Name" value={{ old('name') }}><br>
        <input type="text" name="description" id="description"class="form-control" placeholder="Description" value={{ old('description') }}><br>
        <select name="category_id" class="form-control" >
            @foreach($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
        </select>
        <input type="number" name="rent_price" id="rent_price"class="form-control" placeholder="Price" value={{ old('rent_price') }}><br>
        <input type="text" name="image_url" id="image_url"class="form-control" placeholder="Image URL" value={{ old('image_url') }}><br>

        <input type="submit" value="Create article" class="btn btn-primary">
      </div>
    </form>
  </div>
@endsection
