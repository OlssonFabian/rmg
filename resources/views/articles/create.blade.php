@extends('layouts/app')

@section('content')
  <div class="container mt-3">

    <form method="POST" action="/articles">

      @csrf

      <div class="form-group">
        <input type="text" name="name" id="name"class="form-control" placeholder="Article Name"><br>
        <input type="text" name="description" id="description"class="form-control" placeholder="Description"><br>
        <input type="number" name="rent_price" id="rent_price"class="form-control" placeholder="Price"><br>

    <div class="container">
        <div class="col-md-6">
            <div class="form-group">
                <label>Upload Image</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                <input type="file" id="image_url">
                            </span>
                        </span>
                </div>
                    <img id='image-url'/>
            </div>
        </div>
    </div>

        <input type="submit" value="Create New Project" class="btn btn-primary">
      </div>
    </form>
  </div>
@endsection
