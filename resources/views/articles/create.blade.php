@extends('layouts/app')
use Controllers\ArticleController;

@section('content')
  <div class="container mt-3">

    <form method="POST" action="/articles">

      @csrf

      <div class="form-group">
        <label for="name">Article Name</label>
        <input type="text" name="name" id="name"class="form-control" placeholder="Article Name">

        <input type="submit" value="Create New Project" class="btn btn-primary">
      </div>
    </form>
  </div>
@endsection
