<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Bank</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        @stack('styles')
        @livewireStyles
    </head>
    <body>
        <div
            id="toast-container"
            data-icon="{!! session('icon') !!}"
            data-title="{!! session('title') !!}"
        />

        <div class="m-sm-0 m-md-5">
            <div class="card">
                <div class="card-header">
                    @include('layouts.header')
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
                <div class="card-footer">
                    @livewire('footer')
                </div>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        @livewireScripts
        <script src="{{ asset('js/always-active.js') }}"></script>
        @stack('scripts')
    </body>
</html>
