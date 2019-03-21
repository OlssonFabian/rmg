
@extends('layouts.app')
@include('partials/notOwner')


@section('content')
    <div class="container text-center">
    <h1><strong>Welcome to Rent My Gear</strong></h1>
    <br><br><br>
    <div class="btn-group">
        <button type="button" class="btn-btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">All<span class="caret"></span></button>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
            @if (Auth::check())
               <li> <a href="/categories/{{$category->slug}}"> {{$category->name}} </a> </li>
            @else
                <li> <a href="/login"> {{$category->name}} </a> </li>
            @endif
            @endforeach
        </ul>
    </div>
        @foreach ($articles->chunk(3) as $articleChunk)
            <div class="row">
                @foreach($articleChunk as $article)
                @if($article->user_id || $article->user_id != Auth::user()->id)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail text-center">
                            <img src="{{ $article->image_url }}" alt="..." style="max-height: 150px" class="img-responsive">
                            <div class="caption">
                                <h3><em><b>Name:</b></em> {{ $article->name }}</h3>
                                <p><em><b>Description:</b></em> {{ $article->description }}</p>
                                <div class="clearfix">
                                    <div class="price"><em><b>Price pr Day:</b></em> ${{ $article->rent_price }}</div>
                                    <div>Category: {{ $article->category->name }}</div>
                                    <a href="/articles/{{ $article->slug }}">More Information</a>   
                                </div>
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
