@extends('layout.layout')

@section('content')
    <div class="max-w-lg mx-auto mt-10 bg-gray-100 p-2 border border-gray-300 text-center">
        <h1>Register</h1>
        <form method="POST" action="/sessions">
            @csrf

            <label for="email">Email: </label><input type="email" name="email" id="email" required value="{{old('email')}}"><br>
            @error('email')<p class="text-red-500">{{$message}}</p><br>  @enderror

            <label for="password">Password: </label><input type="password" name="password" id="password" required><br>
            @error('password')<p class="text-red-500">{{$message}}</p><br>  @enderror

            <button type="submit" class="border border-gray-300 bg-gray-200">Login</button>
        </form>
    </div>
@endsection

@section('header')

@endsection

