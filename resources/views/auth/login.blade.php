@extends('base.layout')

@section('content')
    <h1>Login</h1>
    <form action="/login" method="post">
        @csrf
        <p>Email</p><input name="email" type="email" value="{{ old('email') }}">
        <p>Password</p><input name="password" type="password">
        <input type="submit">
    </form>
@endsection