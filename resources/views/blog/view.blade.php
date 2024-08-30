<div class="grid grid-cols-3 w-full bg-white dark:bg-black  hover:bg-gray-300  dark:hover:bg-gray-900 h-fit rounded-xl p-2 mt-5">
    <a class="row-span-2 m-auto h-[150px] w-[266px] w-max-[266px] bg-black dark:bg-white rounded-xl overflow-hidden" href="/blog/{{ $blog->id }}">
        @if($blog->image)
            <img class="h-[150px] w-min w-max-[266px] m-auto" 
            src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="{{ $blog->image }}">
        @endif
    </a>
    <div class="container h-full flex items-center">
        <a href="/blog/{{ $blog->id }}" class="text-2xl mr-3">{{ $blog->title }}</a>
        <a href="/profile/{{ $blog->user->id }}" class="text-lg">by {{ $blog->user->username }}</a>
    </div>
    <div class="flex justify-around items-center">
        <div class="flex justify-around items-center">
            <p class="text-lg">{{ $blog->views }} views</p>
        </div>
        <div class="flex justify-around items-center bg-gray-200 dark:bg-gray-800 px-3 py-1 rounded-lg">
            <p class="text-lg mr-2">{{ $blog->likes()->count() }}</p>
            <img class="w-[30px]" src="/img/like_icon.svg">
        </div>
    </div>
    <a class="w-full col-span-2" href="/blog/{{ $blog->id }}">{{ $blog->epilog }}</a>
</div>