@extends('layout.layout')

@section('content')
    <div class="border border-gray-300 bg-gray-100">
        <form action="/admin/posts" method="post" enctype="multipart/form-data" class="border border-gray-300">
            @csrf
            <label for="text">Title: </label><br>
            <input type="text" name="title" id="title"><br>
            @error('title')
            {{ $message }}
            @enderror

            <label for="excerpt">Excerpt: </label><br>
            <textarea name="excerpt" id="excerpt"></textarea><br>
            @error('excerpt')
            {{ $message }}
            @enderror

            <label for="body">Body: </label><br>
            <textarea name="body" id="body"></textarea><br>
            @error('body')
            {{ $message }}
            @enderror

            <label for="thumbnail">Thumbnail: </label><br>
            <input type="file" name="thumbnail" id="thumbnail"><br>
            @error('thumbnail')
            {{ $message }}
            @enderror

            <label>Category:<br>
                @php
                    $categories = \App\Models\Category::all();
                @endphp
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </label><br>
            @error('category_id')
            {{ $message }}
            @enderror

            <button type="submit" class="border border-gray-500 p-3">Add post</button>
        </form>
    </div>
@endsection
