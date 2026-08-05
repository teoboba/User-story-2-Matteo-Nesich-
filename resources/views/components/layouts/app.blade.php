<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Presto' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar />

    <main class="page">
        {{ $slot }}
    </main>

<x-footer />
</body>
</html>
