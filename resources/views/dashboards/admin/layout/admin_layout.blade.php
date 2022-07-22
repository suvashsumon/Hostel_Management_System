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

<body data-base-url="http://127.0.0.1:8000" @if(Session::has('flash'))
    onload="flash_message('{{Session::get('flash')}}')" @endif>
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
                @include('dashboards.admin.layout.nav')
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
            @include('dashboards.admin.layout.titlebar')




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

    <!-- sweet alart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    
    @yield('extra_js')
    <script>
        function flash_message(msg) {
            //alert(msg);
            swal("Message", msg, "info");
        }
    </script>


</body>

</html>