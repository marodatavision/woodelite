<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Hello') }}
                        </h2>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="text-3xl mt-3 p-7">
                                {{ __('Welcome to') }}
                            </div>
                            <div class="flex justify-center">
                                <x-jet-application-logo class="block h-12 w-auto" />
                            </div>
                            @if(Auth::check())
                            <div class="mt-3 grid grid-cols-1 place-items-center mb-3">
                                <i class="fas fa-arrow-down fa-5x"></i>
                                <a class="px-5 py-3 transition ease-in-out duration-300 bg-gray-300 hover:bg-blue-600 hover:text-blue-100 text-3xl border shadow-md rounded self-center" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </div>
                            @else
                            <div class="mt-3 flex justify-center mb-3 space-x-3">
                                <div class="flex justify-between w-64 space-x-5">
                                    <a class="w-full text-center px-5 py-3 transition ease-in-out duration-300 bg-gray-300 hover:bg-blue-600 hover:text-blue-100 text-3xl border shadow-md rounded self-center" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    <i class="fas fa-arrow-left fa-5x"></i>
                                </div>
                                <div class="flex justify-between w-64 space-x-5">
                                    <i class="fas fa-arrow-right fa-5x"></i>
                                    <a class="w-full text-center px-5 py-3 transition ease-in-out duration-300 bg-gray-300 hover:bg-blue-600 hover:text-blue-100 text-3xl border shadow-md rounded self-center" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>