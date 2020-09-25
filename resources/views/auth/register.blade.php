<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="container">
            <div class="formBx">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="inputBox">
                        <span class="fa fa-user"></span><x-jet-label value="{{ __('Name') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <span class="fa fa-envelope-square"></span><x-jet-label value="{{ __('Email') }}" />
                        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <span class="fa fa-lock"></span><x-jet-label value="{{ __('Password') }}" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <span class="fa fa-lock"></span><x-jet-label value="{{ __('Confirm Password') }}" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="off" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-white-600 hover:text-white-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
