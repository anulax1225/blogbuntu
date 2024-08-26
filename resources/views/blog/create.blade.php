@extends('layout')

@section('body')
    <h1>Create a blog</h1>
    <form action="/blog/" method="post">
        @csrf
        <p>Title</p><input name="title" type="text" value="{{ old('title') }}">
        <p>Epilog</p><textarea name="epilog" type="text">{{ old('epilog') }}</textarea>
        <p>Content</p><textarea name="containt" type="text">{{ old('containt') }}</textarea>
        <br>
        <input type="submit">
    </form>
@endsection