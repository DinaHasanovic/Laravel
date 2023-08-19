<x-layout>
    <link rel="stylesheet" href="{{ asset('css/verification-notice.css') }}">
    <div class="verification_body">
        <div class="verification_container">
            <h1>Verify Your Email Address</h1>

            <div class="card-body">
                @if (session('resent'))
                    <div>
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif
                <p>Before proceeding, please check your email for a verification link.</p>
                <p>If you did not receive the email.</p>
            </div>

            <div class="verification_button">
                <form  method="GET" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit">click here to request another</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>