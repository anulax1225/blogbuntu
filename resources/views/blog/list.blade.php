@extends('layout')

@section('body')
    <div class="blogs-block">
        @foreach($blogs as $blog)
            @include('blog.view')
        @endforeach
    </div>
@endsection