
@extends('layouts.app')


@section('content')
    <div class="container text-center">
    <h1>Welcome to Rent My Gear(Chair)</h1>
    <br><br><br>
    <div class="btn-group">
        <button type="button" class="btn-btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">All<span class="caret"></span></button>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li> {{$category->name}} </li>
            @endforeach

        </ul>
    </div>
@endsection
