<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <img style="height: 100vh; width: 100vw; object-fit:cover" src="{{ asset('images/vuotta-logo.png') }}" alt="Mi imagen">
    <a href="{{ route("testPage") }}">Go to test page</a>
</body>
</html>