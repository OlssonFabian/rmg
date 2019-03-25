
@extends('layouts.app')
@include('partials/notOwner')


@section('content')
    <div class="container text-center">
        <h1><strong>Welcome to Rent My Gear</strong></h1>
        <br>
        <div class="btn-group">
            <button type="button" class="btn-btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">All<span class="caret"></span></button>
            <ul class="dropdown-menu">
                @if (Auth::check())
                    @foreach ($categories as $category)
                        <li> <a href="/categories/{{$category->slug}}"> {{$category->name}} </a> </li>
                    @endforeach
                @else
                    @foreach ($categories as $category)
                        <li> <a href="/login"> {{$category->name}} </a> </li>
                    @endforeach
                @endif   
            </ul>
        </div>
        <div class="flex row d-flex justify-content-center">
            @foreach ($articles as $article)
                <div class="flex">
                    <div class="products">
                        <div class="thumbnail text-center">
                            <a href="/articles/{{ $article->slug }}">
                            <img src="{{ $article->image_url }}" alt="..." class="img-responsive">
                            </a>
                            <div class="caption">
                                <h3><em><b>Name:</b></em> {{ $article->name }}</h3>
                                <p><em><b>Description:</b></em> {{ $article->description }}</p>
                                <div class="clearfix">
                                    <div class="price"><em><b>Price pr Day:</b></em> ${{ $article->rent_price }}</div>
                                    <div>Category: {{ $article->category->name }}</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
