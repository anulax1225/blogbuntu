<nav class="flex flex-col justify-between w-fit h-full bg-white border-black pb-5 px-3
dark:bg-black border-r  dark:border-white">
        <a href="/" class="w-full flex justify-center mb-12">
            <img class="size-[6rem] mx-auto" src="/img/blog_logo.webp">
        </a>
        <ul class="flex flex-col w-full">
            @if(request()->user())
                @include('base.icon', [
                    "icon" => "create_icon.svg",
                    "link" => "/blog/create"
                ])
            @endif
            @if(request()->user())
                @include('base.icon', [
                    "icon" => "profile_icon.svg",
                    "link" => "/myprofile"
                ])
                @include('base.icon', [
                    "icon" => "signout_icon.svg",
                    "link" => "/logout"
                ])
            @else 
                @include('base.icon', [
                    "icon" => "register_icon.svg",
                    "link" => "/register"
                ])
                @include('base.icon', [
                    "icon" => "signin_icon.svg",
                    "link" => "/login"
                ])
            @endif
        </ul>
</nav>