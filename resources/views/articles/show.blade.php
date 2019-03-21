@extends('layouts/app')
@include('partials/status')
@include('partials/validation_errors')

@section('content')
<div class="container mt-3 col-7">
   

      @include('partials/validation_errors')

        <div class="row">
            <div class="col-4">
            @if($article->user_id != Auth::user()->id)
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/orders" class="mt-3 form-group">
                        @csrf
                            <input type="date" class="form-control mt-2" placeholder="Rent from: ex 2019-01-01" name="date_start" value="{{ old('date_start') }}" min="{{ $today }}">
                            <input type="date" class="form-control mt-2" placeholder="Rent to: ex 2019-01-01" name="date_end" value="{{ old('date_end') }}" min="{{ $today }}">
                            {{--  <input type="radio" name="article_id" value="{{ $article->id }}"  id="picture">  --}}
                            <label for="picture">
                                <img src="{{ $article->image_url }}" alt="bild på artikel" height="250" width="250">
                            </label>
                            <input type="text" readonly class="form-control-plaintext" value="Article Name: {{ $article->name }}">
                            <input type="text" readonly class="form-control-plaintext" value="Article Description: {{ $article->description }}">
                            <input type="text" readonly class="form-control-plaintext" value="Price pr Day: {{ $article->rent_price }} kr">
                            <p class="text-left"><em><b>Category:</b></em> {{ $article->category->name }}</p>
                            <button type="submit" class="btn btn-primary mt-3" name="article_id" value="{{ $article->id }}">Book Your Order</button>
                        </form>          
                    </div>
                </div>
            @endif
            </div>
        </div>



      {{--  Aarons kommentar:  --}}
{{--  Har implementerat delete funktionalitet men det fanns inte med på kraven så kommenterar ut den  <form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method('DELETE')

            <input type="submit" value="Delete Article" class="btn btn-danger">
      </form> --}}

      @if($article->user_id == Auth::id())
                  
            <div class="col-9">
                  <img src="{{$article->image_url}}" width="100%" margin="0">
            </div>
            <p><em>Description: </em>{{$article->description}}</p>
            <p><em>Town: </em>{{$town}}</p>
            <p><em>Category: </em> {{$article->category->name}}</p>
            <p><em>Created: </em>{{$article->created_at}}</p>
            <a href="/articles/{{ $article->slug }}/edit" class="btn btn-warning">Edit Article</a>
      @endif      
      <br><br><br>
      <a href="/articles">&laquo; Back to your articles</a>
</div>
@endsection
