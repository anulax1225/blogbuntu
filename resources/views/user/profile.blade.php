@extends('base.layout')

@section('content')
    @vite('resources/js/user.js')
    <div class="w-full flex flex-col h-full items-center px-[140px] mt-[20px]">
        <div class="w-full h-max flex h-pb-5 border-b border-black dark:border-white">
            <div class="w-1/5 flex items-center justify-center h-[300px] overflow-hidden rond-img bg-black dark:bg-white">
                @if(!$user->image)
                    <img src="/img/profile_icon.svg" class="h-max brightness-0 invert dark:brightness-100 dark:invert-0">
                @else
                    <img src="{{ asset('storage/images/profile/' . $user->image) }}" class="h-max">
                @endif
            </div>
            <div class="w-4/5 grid grid-rows-3 items-center">
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
        <div class="w-full flex justify-between items-center my-2">
            @if(request()->user() && $user->id == request()->user()->id)
            <div class="flex items-center w-1/5">
                <p class="text-sm mr-3">Dark Theme</p>
                <label class="inline-flex items-center justify-center cursor-pointer mr-[10%]">
                    <input id="dark-mode-toggle" type="checkbox" class="sr-only peer">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 
                    peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer 
                    dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full 
                    peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] 
                    after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all 
                    dark:border-gray-600 peer-checked:bg-blue-600"></div>
                </label>
            </div>
            <div>
                <button class="rounded-lg bg-blue-500 text-white p-2 w-fit mr-2" 
                id="open-modal">Update</button>
                <button class="rounded-lg bg-red-500 text-white p-2 w-fit"
                id="btn-user-delete" data-id="{{$user->id}}">Delete</button>
                @include('user.modal_update')
            </div>
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