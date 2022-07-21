<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | {{ config('app.name', 'Tinkers Ltd.') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.ico">



    <!-- plugin css -->
    <link media="all" type="text/css" rel="stylesheet" href="/assets/fonts/feather-font/css/iconfont.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
    <!-- end plugin css -->
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link media="all" type="text/css" rel="stylesheet"
        href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <!-- common css -->
    <link media="all" type="text/css" rel="stylesheet" href="/css/app.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/custom/style.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/custom/query.css">
    <!-- font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- end common css -->
    <script>jQuery.noConflict(true);</script>
    @yield('extra_css')
    
</head>

<body data-base-url="http://127.0.0.1:8000">
    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    {{ config('app.name', 'Tinkers Ltd.') }}
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="http://127.0.0.1:8000/admin/dashboard" class="nav-link">
                            <i class="link-icon" data-feather="trending-up"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#order" role="button" aria-expanded="false"
                            aria-controls="order">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Customars</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse " id="order">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('customar.list') }}" class="nav-link ">Active Customar List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('inactive.expired.customar.list') }}" class="nav-link ">Exp/Inactive Customars</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a href="http://127.0.0.1:8000/admin/password_reset_requests" class="nav-link">
                            <i class="link-icon" data-feather="edit"></i>
                            <span class="link-title">PRR's</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="http://127.0.0.1:8000/admin/settings" class="nav-link">
                            <i class="link-icon" data-feather="settings"></i>
                            <span class="link-title">Settings</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <h6 class="text-muted">Sidebar:</h6>
                <div class="form-group border-bottom">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                                value="sidebar-light" checked>
                            Light
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                                value="sidebar-dark">
                            Dark
                        </label>
                    </div>
                </div>

            </div>
        </nav>


        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile">
                            <div class="small_screen_search_trigger">
                                <a href="#" class="nav-link" id="search_trigger">
                                    <i data-feather="search"></i>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/images/default_user.png" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="/images/default_user.png" alt="avatar">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                        <p class="email text-muted mb-3"></p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">


                                        <li class="nav-item">
                                            <a href="http://127.0.0.1:8000/admin/settings" class="nav-link">
                                                <i data-feather="settings"></i>
                                                <span>Setting</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href=http://127.0.0.1:8000/logout
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                            <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>


            <script>





            </script>
            <div class="page-content">
                @yield('contents')
            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">

            </footer>
        </div>
    </div>

    <!-- base js -->

    <script src="/js/app.js"></script>
    <script src="/assets/plugins/feather-icons/feather.min.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <script src="/assets/plugins/chartjs/Chart.min.js"></script>
    <script src="/assets/plugins/jquery.flot/jquery.flot.js"></script>
    <script src="/assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
    <script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/plugins/apexcharts/apexcharts.min.js"></script>

    <!-- end plugin js -->


    <!-- common js -->
    <script src="/assets/js/template.js"></script>
    <!-- end common js -->


    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/datepicker.js"></script>

    @yield('extra_js')



</body>

</html>