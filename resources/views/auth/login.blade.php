<x-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('images/Logo.png')}}" class="w-60 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <livewire:login-form/>


    </x-auth-card>
</x-layout>
