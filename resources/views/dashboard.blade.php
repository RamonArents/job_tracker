<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">
        @if(!count($jobs))
            <p class="no-jobs-jet">U heeft nog geen vacatures. Klik <a class="add-link" href="{{ route('getAdd') }}">hier</a> om toe te voegen.</p>
        @else
            @foreach($jobs as $job)
                <div class="card">
                    <div class="header">
                        <a href="{{ route('getDelete', ['id' => $job->id]) }}"><span class="fa fa-trash"></span></a>
                        <a href="{{ route('getEdit', ['id' => $job->id]) }}"><span class="fa fa-edit"></span></a>
                        <form action="{{ route('addFavorite', ['id' => $job->id]) }}">
                            @csrf
                            <input type="hidden" name="favorite" value="{{ $job->favorite == 1 ? 0 : 1 }}">
                            <button class="favorite" type="submit"><span class="fa fa-heart-o {{ $job->favorite == 0 || $job->favorite == null ? 'heart-black' : 'heart-red'  }}"></span></button>
                        </form>
                    </div>
                    <div class="content">
                        <h2>{{ $job->name }}</h2>
                        <p>{{ $job->job_description }}</p>
                        <a href="{{ $job->website }}" target="_blank">Website</a>
                        <p class="normal-font">Locatie: {{ $job->location }}</p>
                        <p class="normal-font">Aangenomen: {{ $job->success }}</p>
                    </div>
                </div>
                @endforeach
        @endif
        <a href="{{ route('getAdd') }}" id="topBtn"><span class="fa fa-plus"></span></a>
    </div>
</x-app-layout>
