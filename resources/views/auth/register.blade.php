@extends('layout')

@section('body')
    <h1>Register</h1>
    <form action="/register" method="post">
        @csrf
        <p>Username</p><input name="username" type="text" value="{{ old('username') }}">
        <p>Name</p><input name="name" type="text" value="{{ old('name') }}">
        <p>Email</p><input name="email" type="email" value="{{ old('email') }}">
        <p>Description</p><textarea name="description" type="text">{{ old('description') }}</textarea>
        <p>Password</p><input name="password" type="password" >
        <br>
        <input type="submit">
    </form>
@endsection