<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>BlogBuntu</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="w-full flex h-screen overflow-y-hidden bg-white dark:bg-black text-black dark:text-white">
    @include('base.menu')
    @include('base.errors')
    @yield("content")
</body>
</html>