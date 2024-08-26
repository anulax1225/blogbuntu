<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="menu">
        <a href="/"><img class="brand" src="/img/test_logo.webp"></a>
        <ul class="menu-links">
            @if(request()->user())
                <li class="menu-link"><a href="/blog/create">Create a blog</a></li>
            @endif
                <li class="menu-link"><a href="/blogs">Blogs</a></li>
            @if(request()->user())
                <li class="menu-link"><a href="/myprofile">Profile</a></li>
                <li class="menu-link"><a href="/logout">Logout</a></li>
            @else 
                <li class="menu-link"><a href="/register">Register</a></li>
                <li class="menu-link"><a href="/login">Login</a></li>
            @endif
        </ul>
    </nav>
    @foreach($errors->all() as $key => $error)
        <p>{{ $error }}</p>
    @endforeach
    <main>
        @yield("body")
    </main>
</body>
</html>