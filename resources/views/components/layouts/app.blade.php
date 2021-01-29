<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="relative antialiased text-gray-900">

    <div class="bg-gray-800">
        <div class="flex px-10 py-6 text-white">
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
            <div class="mx-4">|</div>
            <div>
                <a href="/profile">Edit Profile</a>
            </div>
            <div class="mx-4">|</div>
            <div>
                <a href="/">Welcome</a>
            </div>
        </div>
    </div>

    {{ $slot }}
</div>
</body>
</html>
