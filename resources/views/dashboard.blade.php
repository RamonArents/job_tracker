<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">
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
            <div class="content">
                test
            </div>
        </div>
        <div class="card">
            <div class="content">
                test
            </div>
        </div>
        <div class="card">
            <div class="content">
                test
            </div>
        </div>
        <div class="card">
            <div class="content">
                test
            </div>
        </div>
        <div class="card">
            <div class="content">
                test
            </div>
        </div>
    </div>
</x-app-layout>
