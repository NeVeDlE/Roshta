<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-60 h-20 fill-current text-blue-500"/>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-blue-300">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-submit-button>
                        {{ __('Resend Verification Email') }}
                    </x-submit-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-submit-button type="submit" class="underline text-sm text-blue-600 hover:text-blue-900">
                    {{ __('Log Out') }}
                </x-submit-button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
