@extends('base.layout')

@section('content')
    @vite('resources/js/blog.js')
    <div class="w-full h-screen overflow-y-auto">
        <div class="w-full flex flex-col pt-10 items-center px-[230px]">
            <div class="w-full flex justify-between">
                @csrf
                <div>
                    @if(request()->user() && $blog->user->id == request()->user()->id)
                        <button id="open-modal">Update</button>
                        <button id="btn-blog-delete" data-id="{{$blog->id}}">Delete</button>
                        @include('blog.modal_update')  
                    @else 
                        <button id="btn-follow" data-id="{{$blog->user->id}}">Follow</button>
                    @endif
                </div>
                <div class="flex">
                    <div class="flex justify-around items-center mr-5">
                        <p class="text-lg">{{ $blog->views }} views</p>
                    </div>
                    <div class="flex justify-around items-center bg-gray-200 dark:bg-gray-800 px-3 py-1 rounded-lg">
                        <p class="text-lg mr-2">{{ $blog->likes()->count() }}</p>
                        <button id="btn-like" data-id="{{$blog->id}}"><img class="w-[30px]" src="/img/like_icon.svg"></button>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col items-center">
                <div class="w-full flex items-end justify-center border-b border-black pb-5">
                    <p class="text-8xl">{{ $blog->title }}</p>
                    <p class="pl-10 text-3xl">by</p>
                    <a class="pl-3 text-3xl" href="/profile/{{ $blog->user->id }}">{{ $blog->user->username }}</a>
                </div>
                @if($blog->image)
                    <img class="h-[250px] w-min w-max-[445px] mx-auto my-5" 
                    src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="{{ $blog->image }}">
                @endif
                <p class="w-full px-[80px] py-10 italic">{{ $blog->epilog }}</p>
            </div>
            @if($blog->containt)
                <div class="md-content">
                    {!! html_entity_decode(app(Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($blog->containt)) !!}
                </div>
            @endif
        </div>
    </div>
@endsection