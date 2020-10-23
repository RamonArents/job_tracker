<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
            <div class="formBx">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="inputBox">
                        <span class="fa fa-envelope-square"></span><x-jet-label value="{{ __('Email:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <span class="fa fa-lock"></span><x-jet-label value="{{ __('Wachtwoord:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="off" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-white-600">{{ __('Herinner mij') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-white-600 hover:text-white-900" href="{{ route('password.request') }}">
                                {{ __('Wachtwoord vergeten?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4">
                            {{ __('Login') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
