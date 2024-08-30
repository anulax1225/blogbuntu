@extends('base.layout')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="w-2/3 p-10 border border-black dark:border-white rounded-lg">
            <h1 class="text-6xl font-bold  pb-3 mb-5 border-b border-black dark:border-white">Email verification</h1>
            <div class="flex flex-col">
                <p class="mr-5">Before proceeding, please check your email for a verification link. If you did not receive the email,<p>
                <form action="/email/verification-notification" method="post" class="mr-5">
                    @csrf
                    <button type="submit" class="rounded-lg bg-blue-500 text-white p-2 w-fit">click here</button>
                </form>
                <p>to request another.</p>
            </div>
        </div>
    </div>
@endsection