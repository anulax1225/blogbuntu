@extends('layout')

@section('body')
    @vite('resources/js/blog.js')
    @if(request()->user() && $blog->user->id == request()->user()->id)
        <button id="open-modal">Update</button>
        <form class="delete-form">
            @csrf
            <button class="btn btn-blog-delete" data-id="{{$blog->id}}">Delete</button>
        </form>
        @include('blog.modal_update')  
    @else 
    @endif
    @csrf
    <button class="btn-like" data-id="{{$blog->id}}">Like</button>
    <button class="btn-follow" data-id="{{$blog->user->id}}">Follow</button>

    <h1>{{ $blog->title }}</h1>
    <a href="/profile/{{ $blog->user->id }}"><h3>by {{ $blog->user->username }}</h3></a>
    <p>{{ $blog->epilog }}</p>
    <p>Views : {{ $blog->views }}</p>
    <p>Likes : {{ $blog->likes()->count() }}</p>
    @if($blog->containt)
        <div class="md-content">
            {!! html_entity_decode(app(Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($blog->containt)) !!}
        </div>
    @endif
@endsection