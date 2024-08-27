@extends('base.layout')

@section('content')
    @vite('resources/js/user.js')
    <h1>{{ $user->username }}</h1>
    <p>Name : {{ $user->name }}</p>
    <p>Description {{ $user->description }}</p>
    <p>Contact : {{ $user->email }}</p>
    <p>Number of followers : {{ $user->followed->count() }}</p>
    @if(request()->user() && $user->id == request()->user()->id)
        <button id="open-modal">Update</button>
        <form class="delete-form">
            @csrf
            <button class="btn btn-user-delete" data-id="{{$user->id}}">Delete</button>
        </form>
        @include('user.modal_update')
        <div>
            <h1>Follows</h1>
            @foreach($user->follows as $follow)
            <p>{{ $follow->username }}</p>
            @endforeach
        </div>
    @else 
        @csrf
        <button class="btn-follow" data-id="{{$user->id}}">Follow</button>
    @endif
    <div class="blogs-block">
        <h1>Blogs</h1>
        @foreach($user->blogs as $blog)
            @include('blog.view')
        @endforeach
    </div>
@endsection