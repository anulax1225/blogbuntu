@extends('layout')

@section('body')
    <div>
        <h1>Email verification</h1>
        
        @if(session('resent'))
            <div>
                A fresh verification link has been sent to your email address.
            </div>
        @endif

        <div>
        Before proceeding, please check your email for a verification link. If you did not receive the email,
        <form action="/email/verification-notification" method="POST">
            @csrf
            <button type="submit">
                click here to request another
            </button>.
        </form>
        </div>
    </div>
@endsection