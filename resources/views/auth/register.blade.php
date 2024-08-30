@extends('base.layout')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="w-2/3 p-10 border border-black dark:border-white rounded-lg">
            <h1 class="text-6xl font-bold  pb-3 mb-5 border-b border-black dark:border-white">Register</h1>
            <form action="/register" method="post" class="flex flex-col items-center">
                <div class="grid grid-cols-4 w-full">
                    <p>Username :</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black"
                    name="username" type="text" value="{{ old('username') }}">
                    <p>Name (Optional):</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black"
                    name="name" type="text" value="{{ old('name') }}">
                    <p>Email :</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black"
                    name="email" type="email" value="{{ old('email') }}">
                    <p>Description (Optional):</p><textarea class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black"
                    name="description" type="text">{{ old('description') }}</textarea>
                    <p>Password :</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black"
                    name="password" type="password" >
                </div>
                @csrf
                <button type="submit" class="rounded-lg bg-blue-500 text-white p-2 w-fit">Send</button>
            </form>
        </div>
    </div>
@endsection