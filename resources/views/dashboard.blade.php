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
                <span class="fa fa-trash"></span><span class="fa fa-edit"></span><span class="fa fa-heart-o"></span>
            </div>
            <div class="content">
                <h2>{{ $job->name }}</h2>
                <p>{{ $job->job_description }}</p>
                <a href="{{ $job->website }}">Website</a>
            </div>
        </div>
        @endforeach
        <button id="topBtn"><span class="fa fa-plus"></span></button>
        <!-- <div class="card">
            <div class="header">
                <span class="fa fa-trash"></span><span class="fa fa-edit"></span><span class="fa fa-heart-o"></span>
            </div>
            <div class="content">
                <h2>Sera Business</h2>
                <p>PHP en databases</p>
                <a href="https://www.sera.nl/vacatures/vacature-ervaren-php-programmeur.html">Website</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <span class="fa fa-trash"></span><span class="fa fa-edit"></span><span class="fa fa-heart-o"></span>
            </div>
            <div class="content">
                <h2>Sera Business</h2>
                <p>PHP en databases</p>
                <a href="https://www.sera.nl/vacatures/vacature-ervaren-php-programmeur.html">Website</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <span class="fa fa-trash"></span><span class="fa fa-edit"></span><span class="fa fa-heart-o"></span>
            </div>
            <div class="content">
                <h2>Sera Business</h2>
                <p>PHP en databases</p>
                <a href="https://www.sera.nl/vacatures/vacature-ervaren-php-programmeur.html">Website</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <span class="fa fa-trash"></span><span class="fa fa-edit"></span><span class="fa fa-heart-o"></span>
            </div>
            <div class="content">
                <h2>Sera Business</h2>
                <p>PHP en databases</p>
                <a href="https://www.sera.nl/vacatures/vacature-ervaren-php-programmeur.html">Website</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <span class="fa fa-trash"></span><span class="fa fa-edit"></span><span class="fa fa-heart-o"></span>
            </div>
            <div class="content">
                <h2>Sera Business</h2>
                <p>PHP en databases</p>
                <a href="https://www.sera.nl/vacatures/vacature-ervaren-php-programmeur.html">Website</a>
            </div>
        </div>
    </div> -->
</x-app-layout>
