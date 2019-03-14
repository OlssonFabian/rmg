@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')
@section('content')
  <div class="container mt-3">

    <form method="POST" action="/articles/{{$article->id}}">

      @csrf
      @method('PUT')
      <div class="form-group">
        <input type="text" name="name" id="name"class="form-control" placeholder="Article Name" value={{ $article->name}} or {{ old('name') }}  ><br>
        <input type="text" name="description" id="description"class="form-control" placeholder="Description" value='{{ $article->description }}  {{ old($article->description) }}'><br>
        <select name="category_id" class="form-control" >
            @foreach($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
        </select>
        <input type="number" name="rent_price" id="rent_price"class="form-control" placeholder="Price" value={{ $article->rent_price }} or {{ old('rent_price') }}><br>
        <input type="text" name="image_url" id="image_url"class="form-control" placeholder="Image URL" value={{ $article->image_url }} or {{ old('image_url') }}><br>

        <input type="submit" value="Save Changes" class="btn btn-primary">
      </div>
    </form>
  </div>
@endsection