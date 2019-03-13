
@extends('layouts.app')


@section('content')
    <div class="container text-center">
    <h1>Welcome to Rent My Gear(Chair)</h1>
    <br><br><br>
    @if ($material == $category->id)
        
    @endif
        @foreach ($articles->chunk(3) as $articleChunk)
            <div class="row">
                @foreach($articleChunk as $article)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail text-center">
                            <img src="{{ $article->image_url }}" alt="..." style="max-height: 150px" class="img-responsive">
                            <div class="caption">
                                <h3>{{ $article->name }}</h3>
                                <p>{{ $article->description }}</p>  
                                <div class="clearfix">
                                    <div class="price">${{ $article->rent_price }}</div>
                                    @foreach ($categories as $category)
                                        @if ($article->category_id == $category->id)
                                            <p>Material: {{ $category->name }}</p>
                                        @endif
                                    @endforeach
                                    <a href="{{ url('/orders/create') }}" class="btn btn-success" role="button">Order</a>
                                </div>
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
