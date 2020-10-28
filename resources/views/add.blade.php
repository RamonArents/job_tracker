<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Voeg vacature toe') }}
            </h2>
        </x-slot>
        <x-slot name="logo">
        </x-slot>

    <x-jet-validation-errors class="mb-4" />
        <div class="container">
            <div class="formBx">
                <form method="POST" action="{{ route('addApplication') }}">
                    @csrf

                    <div class="inputBox">
                        <x-jet-label value="{{ __('Naam:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <x-jet-label value="{{ __('Beschrijving:') }}" />
                        <textarea class="block mt-1 w-full" name="description" rows="2" cols="1" required autocomplete="off">{{ old('description') }}</textarea>
                    </div>

                    <div class="mt-4 inputBox">
                        <x-jet-label value="{{ __('Website:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="website" :value="old('website')" required autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <x-jet-label value="{{ __('Locatie:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autocomplete="off" />
                    </div>

                    <div class="mt-4 inputBox">
                        <x-jet-label value="{{ __('Aangenomen:') }}" />
                        <select name="success">
                            <option value="Sollicitatie nog sturen.">Sollicitatie nog sturen.</option>
                            <option value="Sollicitatie verstuurd.">Sollicitatie verstuurd.</option>
                            <option value="Op eerste gesprek.">Op eerste gesprek.</option>
                            <option value="Op tweede gesprek.">Op tweede gesprek.</option>
                            <option value="Ja">Ja</option>
                            <option value="Nee">Nee</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Voeg vacature toe') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-app-layout>
