@extends('base.layout')

@section('content')
    @vite('resources/js/user.js')
    <div class="w-full flex flex-col h-full items-center px-[140px] mt-[20px]">
        <div class="w-full h-max flex h-pb-5 border-b border-black dark:border-white">
            <div class="w-max overflow-hidden rounded-[150px]">
                <img src="/img/profile_icon.svg" class="w-[300px]">
            </div>
            <div class="w-full grid grid-rows-3 items-center">
                <p class="w-full text-right">{{ $user->followed->count() }} followers</p>
                <h1 class="text-6xl font-bold  pb-3">{{ $user->name }}</h1>
                <div class="flex">
                    <p>@</p>
                    <p>{{ $user->username }}</p>
                    <p class="ml-3">{{ $user->description }}</p>
                </div>
            </div>
        </div>
        @csrf
        <div class="w-full flex justify-end my-2">
            @if(request()->user() && $user->id == request()->user()->id)
                <button class="rounded-lg bg-blue-500 text-white p-2 w-fit mr-2" 
                id="open-modal">Update</button>
                <button class="rounded-lg bg-red-500 text-white p-2 w-fit"
                id="btn-user-delete" data-id="{{$user->id}}">Delete</button>
                @include('user.modal_update')
            @else 
                <button class="rounded-lg bg-blue-500 text-white p-2 w-fit mr-2"
                id="btn-follow" data-id="{{$user->id}}">Follow</button>
            @endif
        </div>
        <div class="w-full h-full overflow-y-scroll pb-300">
            @foreach($user->blogs as $blog)
                @include('blog.view')
            @endforeach
        </div>
    </div>
@endsection