<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crime Investigation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/crime.css') }}">
</head>

<body>
    <div class="video-overlay ">
        <video class="{{ request()->routeIs('login') ? 'form-blur' : '' }}" loop autoplay muted
            src="{{ asset('videos/evidence.mp4') }}" type="video/mp4"></video>
    </div>
    @yield('content')
</body>

</html>
