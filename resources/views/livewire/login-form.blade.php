<div>
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
        <x-form.input wire="email" name="email" type="email" autocomplete="email"/>

        <!-- Password -->
        @if($show)
            <x-form.input wire="password" name="password" type="text" autocomplete="password"/>
            <button wire:click.prevent="toggle">
                <i class="far fa-eye" style="cursor: pointer;"></i>
            </button>
        @else
            <x-form.input wire="password" name="password" type="password" autocomplete="password"/>
            <button wire:click.prevent="toggle">
                <i class="far fa-eye-slash" style="cursor: pointer;"></i>
            </button>
    @endif

    <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="remember">
                <span class="ml-2 text-sm text-blue-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-600 hover:text-red-600" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button class="ml-3">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</div>
