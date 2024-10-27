<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- css files -->
    <<link rel="stylesheet" href="{{ asset('css/project/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/project/skins/color-1.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
        <!-- style switcher -->
        <link rel="stylesheet" href="{{ asset('css/project/skins/color-1.css') }}" class="alternate-style"
            title="color-1" disabled />
        <link rel="stylesheet" href="{{ asset('css/project/skins/color-2.css') }}" class="alternate-style"
            title="color-2" disabled />
        <link rel="stylesheet" href="{{ asset('css/project/skins/color-3.css') }}" class="alternate-style"
            title="color-3" disabled />
        <link rel="stylesheet" href="{{ asset('css/project/skins/color-4.css') }}" class="alternate-style"
            title="color-4" disabled />
        <link rel="stylesheet" href="{{ asset('css/project/skins/color-5.css') }}" class="alternate-style"
            title="color-5" disabled />
        <link rel="stylesheet" href="{{ asset('css/project/style-switcher.css') }}" />

</head>

<body>

    <div class="main-container">
        <!-- Aside start -->
        <div class="aside">
            <div class="logo">
                @foreach ($AdminHomes as $Homes)
                    <a href="#"><span>{{ $Homes->F_letter }}</span>{{ $Homes->Skip_F_letter }}</a>
                @endforeach
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>
            <ul class="nav">
                <li>
                    <a href="#home" class="active"><i class="fa fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="#about"><i class="fa fa-user"></i>About</a>
                </li>
                <li>
                    <a href="#service"><i class="fa fa-list"></i>Services</a>
                </li>
                <li>
                    <a href="#portfolio"><i class="fa fa-briefcase"></i>Portfolio</a>
                </li>
                <li>
                    <a href="#contact"><i class="fa fa-comments"></i>Contact</a>
                </li>
            </ul>
        </div>
        <!-- Aside end -->
        <div class="main-content">
            @yield('Home')
            @yield('About')
            @yield('Services')
            @yield('Portfolio')
            @yield('Contact')
        </div>
    </div>
    {{-- style switcher start --}}
    <div class="style-switcher">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas"></i>
        </div>
        <h4>Theme Colors</h4>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5')"></span>
        </div>
    </div>
    {{-- style switcher end --}}

    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js"
        integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/project/script.js') }}"></script>
    <script src="{{ asset('js/project/styleswitcher.js') }}"></script>

</body>

</html>
