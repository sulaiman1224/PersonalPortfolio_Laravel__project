<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{asset('css/admin-panel/navbar.css')}}"> --}}
{{-- Bootstrap CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
{{-- Keeping Bootstrap 4.5.2 --}}
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
{{-- Keeping Font Awesome 5.15.3 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

{{-- Google Font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

{{-- SweetAlert --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- custom css --}}
      <link rel="stylesheet" href="{{ asset('css/admin-panel/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel/viewsFile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel/navbar.css') }}">



</head>

<body>

    <div class="container_main">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Sulaiman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('Admin/Home') }}">
                        <span class="icon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/Admin/About/ViewsData') }}">
                        <span class="icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="title">About</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/Admin/Service/ViewData') }}">
                        <span class="icon">
                            <i class="fa fa-list"></i>
                        </span>
                        <span class="title">Services</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/Admin/Portfolio/ViewsData') }}">
                        <span class="icon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        <span class="title">Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/Admin/Accounts/ViewsData') }}">
                        <span class="icon">
                            <i class="fa fa-user-circle"></i> <!-- Icon for user/account -->
                        </span>
                        <span class="title">Official Accounts</span>
                    </a>
                </li>


                <li>
                    <a href="{{ url('/Admin/Feedback/ViewsData') }}">
                        <span class="icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span class="title">Feedback</span>
                        @if (isset($unseenFeedbackCount) && $unseenFeedbackCount > 0)
                            <span class="notification-circle">{{ $unseenFeedbackCount }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ url('/Admin/Profile/ViewsData') }}">
                        <span class="icon">
                            <i class="fa fa-id-card"></i> <!-- ID card icon -->
                        </span>
                        <span class="title">Profile Details</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('adminLogout') }}">
                        <span class="icon">
                            <i class="fa fa-sign-out-alt"></i> <!-- Sign-out icon -->
                        </span>
                        <span class="title">Logout</span> <!-- Capitalized for consistency -->
                        <!-- Notification badge -->

                    </a>
                </li>



            </ul>
        </div>
        <div class="main">
            {{-- toggle --}}
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            {{-- Main Content --}}
            @yield('Content')
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('js/admin-panel/script.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
