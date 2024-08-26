<div class="blog-view">
    <div class="blog-title">
        <a href="/blog/{{ $blog->id }}"><h1>{{ $blog->title }}</h1></a>
        <a href="/profile/{{ $blog->user->id }}">by {{ $blog->user->username }}</a>
    </div>
    <div class="blog-stats">
        <div class="info-block">
            <img src="/img/view_icon.png"><p>{{ $blog->views }}</p>
        </div>
        <div class="info-block">
            <img src="/img/like_icon.png"><p>{{ $blog->likes()->count() }}</p>
        </div>
    </div>
    <p>{{ $blog->epilog }}</p>
</div>