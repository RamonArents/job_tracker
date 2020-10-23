<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verwijder vacature') }}
        </h2>
    </x-slot>
    <x-jet-validation-errors class="mb-4" />
    <div class="dashboard-container delete-container">
    @if(\Illuminate\Support\Facades\Auth::user()->id == $job->user_id)
        <div class="card">
            <div class="header delete-header-div">
                <h2 class="delete-header">Verwijder deze vacature?</h2>
            </div>
            <div class="content">
                <h2>{{ $job->name }}</h2>
                <p>{{ $job->job_description }}</p>
                <a href="{{ $job->website }}" target="_blank">Website</a>
            </div>
            <form method="POST" action="{{ route('deleteApplication', ['id' => $job->id]) }}">
                        @csrf
                        <x-jet-input class="block mt-1 w-full" type="hidden" name="name" value="{{ $job->name }}" required autofocus autocomplete="off" />
                        <x-jet-input class="block mt-1 w-full" type="hidden" name="description" value="{{ $job->job_description }}" required autocomplete="off" />
                        <x-jet-input class="block mt-1 w-full" type="hidden" name="website" value="{{ $job->website }}" required autocomplete="off" />
                     
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4 delete-button">
                                {{ __('Verwijder vacature') }}
                            </x-jet-button>
                        </div>
                    </form>
        </div>
    @else
        <p class="not-allowed-to-delete">U mag deze vacature niet verwijderen.</p>
    @endif
            
</x-app-layout>
