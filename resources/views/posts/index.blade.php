@extends('layout.layout')

@section('content')

    <div class="lg:grid lg:grid-cols-3">
    @foreach($posts as $post)
            @include('components.post-card', $post)
    @endforeach
    </div>

    {{$posts->links()}}
@endsection

@section('header')
    @include('components.header')
@endsection

