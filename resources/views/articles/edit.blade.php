@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')
@section('content')
<div class="container mt-3">

  <form method="POST" action="/articles/{{$article->slug}}">

    @csrf
    @method('PUT')
    <div class="form-group">
      <input type="text" name="name" id="name" class="form-control"
        placeholder="Article Name" value="{{ old('name') ? old('name') : $article->name }}"><br>
      <input type="text" name="description" id="description"
        class="form-control" placeholder="Description" value="{{ old('description') ? old('description') : $article->description }} "><br>
      
      <select name="category_id" class="form-control">
        @foreach($categories as $category)
        

@if ($category->id == old('category_id'))
      <option value="{{$category->id}}" selected>{{$category->name}}</option>
@else
      <option value="{{$category->id}}">{{$category->name}}</option>
@endif

        @endforeach
      </select>
      
      <input type="number" name="rent_price" id="rent_price"
        class="form-control" placeholder="Price" value="{{ old('rent_price') ? old('rent_price') : $article->rent_price }}"><br>
      <input type="text" name="image_url" id="image_url" class="form-control"
        placeholder="Image URL" value="{{ old('image_url') ? old('image_url') : $article->image_url }}"><br>

      <input type="submit" value="Save Changes" class="btn btn-primary">
    </div>
  </form>
  <br><br><br>
  <a href="/articles">&laquo; Back to your articles</a>
</div>
@endsection