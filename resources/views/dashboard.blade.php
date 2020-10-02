<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">
        @foreach($jobs as $job)
        <div class="card">
            <div class="header">
                <a href="{{ route('getDelete', ['id' => $job->id]) }}"><span class="fa fa-trash"></span></a>
                <a href="{{ route('getEdit', ['id' => $job->id]) }}"><span class="fa fa-edit"></span></a>
                <form action="{{ route('addFavorite', ['id' => $job->id]) }}">
                    @csrf
                    <input type="hidden" name="favorite" value="{{ $job->id == 1 ? 0 : 1 }}">
                    <button type="submit"><span class="fa fa-heart-o"></span></button>
                </form>
            </div>
            <div class="content">
                <h2>{{ $job->name }}</h2>
                <p>{{ $job->job_description }}</p>
                <a href="{{ $job->website }}" target="_blank">Website</a>
            </div>
        </div>
        @endforeach
        <a href="{{ route('getAdd') }}" id="topBtn"><span class="fa fa-plus"></span></a>
</x-app-layout>
