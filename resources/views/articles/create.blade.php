@extends('layouts/app')
  
@section('content')
  <div class="container mt-3">  
    
    <form method="POST" action="/articles">
      
      @csrf
      
      <div class="form-group">
        <label for="name">Article Name</label>
        <input type="text" name="name" id="name"class="form-control" placeholder="Article Name">
      </div>
      
     
      
			<div class="form-group">
				<label for="description">Article Description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Article Description">
			</div>
    
    </form>
  </div>
@endsection