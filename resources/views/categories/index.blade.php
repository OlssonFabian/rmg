@extends('layouts/app')

@section('content')
	<div class="container mt-3">
        @include('partials/validation_errors')

        <div class="row d-flex justify-content-center">       
            @foreach ($articles as $article)
                <div class="flex">
                    @if($article->user_id != Auth::user()->id)
                        <div class="products">
                            <div class="thumbnail text-center">
                                <img src="{{ $article->image_url }}" alt="..." class="img-responsive">
                                <div class="caption">
                                    <h3><em><b>Name:</b></em> {{ $article->name }}</h3>
                                    <p><em><b>Description:</b></em> {{ $article->description }}</p>
                                    <div class="clearfix">
                                        <div class="price"><em><b>Price pr Day:</b></em> ${{ $article->rent_price }}</div>
                                        <div>Category: {{ $article->category->name }}</div>
                                        <a href="/articles/{{ $article->slug }}">More Information</a>   
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>    
        <br>
        <a href="{{ url()->previous() }}">&laquo; Back to all Articles</a>
    </div>
@endsection

<style>
    .products {
        margin: 4rem;
        
    }
    .img-responsive {
        max-height: 150px
    }

</style>