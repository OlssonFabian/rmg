@extends('layouts/app')

@section('content')
	<div class="container mt-3">

        @include('partials/validation_errors')
           
                @foreach ($articles->chunk(3) as $articleChunk)
            <div class="row">
                @foreach($articleChunk as $article)
                 @if($article->user_id != Auth::user()->id)
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
        <br><br><br>
        <a href="{{ url()->previous() }}">&laquo; Back to all Articles</a>
    </div>
@endsection
