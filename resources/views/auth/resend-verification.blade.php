<x-layout>
    <div class="form_body">
        <div class="form_container">
            <h2>Resend Email Verification</h2>
            <p>Click the button below to resend the email verification link:</p>
            <form action="{{ route('verification.resend') }}" method="post">
                @csrf
                <button type="submit">Resend Verification Link</button>
            </form>
        </div>
    </div>
</x-layout>
