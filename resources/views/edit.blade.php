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
            @if(\Illuminate\Support\Facades\Auth::user()->id == $job->user_id)
                <div class="formBx">
                    <form method="POST" action="{{ route('editApplication', ['id' => $job->id]) }}">
                        @csrf

                        <div class="inputBox">
                            <x-jet-label value="{{ __('Naam:') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="name" value="{{ $job->name }}" required autofocus autocomplete="off" />
                        </div>

                        <div class="mt-4 inputBox">
                            <x-jet-label value="{{ __('Beschrijving:') }}" />
                            <textarea class="block mt-1 w-full" name="description" rows="2" cols="1" required autocomplete="off">{{ $job->job_description }}</textarea>
                        </div>

                        <div class="mt-4 inputBox">
                            <x-jet-label value="{{ __('Website:') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="website" value="{{ $job->website }}" required autocomplete="off" />
                        </div>

                        <div class="mt-4 inputBox">
                            <x-jet-label value="{{ __('Locatie:') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="location" value="{{ $job->location }}" required autocomplete="off" />
                        </div>

                   
                        <div class="mt-4 inputBox">
                        <x-jet-label value="{{ __('Aangenomen:') }}" />
                        <select name="success">
                            <option value="Sollicitatie nog sturen." {{ $job->success === 'Sollicitatie nog sturen.' ? 'selected' : ''}}>Sollicitatie nog sturen.</option>
                            <option value="Sollicitatie verstuurd." {{ $job->success === 'Sollicitatie verstuurd.' ? 'selected' : ''}}>Sollicitatie verstuurd.</option>
                            <option value="Op eerste gesprek." {{ $job->success === 'Op eerste gesprek.' ? 'selected' : ''}}>Op eerste gesprek.</option>
                            <option value="Op tweede gesprek." {{ $job->success === 'Op tweede gesprek.' ? 'selected' : ''}}>Op tweede gesprek.</option>
                            <option value="Ja" {{ $job->success === 'Ja' ? 'selected' : ''}}>Ja</option>
                            <option value="Nee" {{ $job->success === 'Nee' ? 'selected' : ''}}>Nee</option>
                        </select>
                    </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Bewerk vacature') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
                @else
                    <p>U mag deze vacature niet bewerken.</p>
                @endif
            </div>
    </x-jet-authentication-card>
</x-app-layout>
