<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'SomaConnect') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            {{ $slot }} {{-- This renders the page content --}}
        </main>
    </div>
</body>
</html>
