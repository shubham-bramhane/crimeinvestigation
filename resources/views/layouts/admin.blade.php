<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | {{ env('APP_NAME') }}</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/crime.css') }}">
</head>

<body>
    <div class="video-overlay">
        <video loop autoplay muted src="{{ asset('videos/crime.mp4') }}" type="video/mp4"></video>
    </div>
    <main class="container-fluid" id="panel">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="sidebar-card">
                    <div class="user-type">
                        <a href="{{ route('admin.index') }}">Admin Panel</a>
                    </div>
                    @php
                        $admin_links = [
                            [
                                'name' => 'cases',
                                'route' => 'admin.cases.index',
                                'icon' => 'fa-solid fa-house',
                            ],
                            [
                                'name' => 'officers',
                                'route' => 'admin.officer.index',
                                'icon' => 'fa-solid fa-building',
                            ],
                            [
                                'name' => 'case history',
                                'route' => 'admin.history.index',
                                'icon' => 'fa-solid fa-square-poll-horizontal',
                            ],
                            [
                                'name' => 'predict result',
                                'route' => 'admin.predict.index',
                                'icon' => 'fa-solid fa-square-poll-vertical',
                            ],
                            [
                                'name' => 'add result',
                                'route' => 'admin.result.index',
                                'icon' => 'fa-solid fa-plus',
                            ],
                        ];
                    @endphp
                    <ul>
                        @foreach ($admin_links as $link)
                            <li>
                                <a href="{{ route($link['route']) }}"
                                    class="{{ request()->routeIs($link['route']) ? 'active' : '' }}"><i
                                        class="{{ $link['icon'] }}"></i>&nbsp;&nbsp;{{ $link['name'] }}</a>
                            </li>
                        @endforeach
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button><i class="mr-2 fas fa-power-off"></i>&nbsp;&nbsp;Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 main-content mt-3" style="overflow-y: scroll;height:700px">
                @yield('content')
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @yield('script')
</body>

</html>
