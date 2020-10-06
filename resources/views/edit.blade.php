<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bewerk vacature') }}
            </h2>
        </x-slot>
        <x-slot name="logo">
        </x-slot>
        <x-jet-validation-errors class="mb-4" />
            <div class="container">
                <div class="formBx">
                    <form method="POST" action="{{ route('editApplication', ['id' => $job->id]) }}">
                        @csrf

                        <div class="inputBox">
                            <x-jet-label value="{{ __('Naam') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="name" value="{{ $job->name }}" required autofocus autocomplete="off" />
                        </div>

                        <div class="mt-4 inputBox">
                            <x-jet-label value="{{ __('Beschrijving') }}" />
                            <textarea class="block mt-1 w-full" type="text" name="description" rows="2" cols="1" required autocomplete="off">{{ $job->job_description }}</textarea>
                        </div>

                        <div class="mt-4 inputBox">
                            <x-jet-label value="{{ __('Website') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="website" value="{{ $job->website }}" required autocomplete="off" />
                        </div>

                        <div class="mt-4 inputBox">
                            <x-jet-label value="{{ __('Locatie') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="location" value="{{ $job->location }}" required autocomplete="off" />
                        </div>

                    <div class="mt-4 inputBox">
                        <x-jet-label value="{{ __('Aangenomen') }}" />
                        <select name="success">
                            <option value="" {{ $job->success === null ? 'selected' : ''}}>Sollicitatie nog sturen.</option>
                            <option value="1" {{ $job->success === 1 ? 'selected' : ''}}>Ja</option>
                            <option value="0" {{ $job->success === 0 ? 'selected' : ''}}>Nee</option>
                        </select>
                    </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Bewerk vacature') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
    </x-jet-authentication-card>
</x-app-layout>
