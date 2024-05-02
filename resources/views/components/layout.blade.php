<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        {{ $slot }}
    </h1>
</body>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@stack('scripts')
</html>
