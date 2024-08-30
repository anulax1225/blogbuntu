@extends('base.layout')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="w-2/3 p-10 border border-black dark:border-white rounded-lg">
            <h1 class="text-6xl font-bold  pb-3 mb-5 border-b border-black dark:border-white">Create a blog</h1>
            <form action="/blog" method="post" class="flex flex-col items-center">
                <div class="grid grid-cols-4 w-full">
                    <p>Title :</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black" 
                    name="title" type="text" value="{{ old('title') }}">
                    <p>Image (Optional):</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black" 
                    name="image" type="file" value="{{ old('image') }}">
                    <p>Epilog (Optional):</p><textarea class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black" 
                    name="epilog" type="text">{{ old('epilog') }}</textarea>
                    <p>Content (Optional):</p><textarea class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black" 
                    name="containt" type="text">{{ old('containt') }}</textarea>
                </div>
                <button type="submit" class="rounded-lg bg-blue-500 text-white p-2 w-fit">Send</button>
                @csrf
            </form>
        </div>
    </div>
@endsection