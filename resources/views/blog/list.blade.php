@extends('base.layout')

@section('content')
    <div class="w-full mx-2 grid grid-cols-2">
        @foreach($blogs as $blog)
            @include('blog.view')
        @endforeach
    </div>
@endsection