@extends('base.layout')

@section('content')
    <div class="w-full mx-2 h-screen overflow-y-auto">
        @foreach($blogs as $blog)
            @include('blog.view')
        @endforeach
    </div>
@endsection