<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | {{ config('app.name', 'Tinkers Ltd.') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@300;400;500;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="http://127.0.0.1:8000/favicon.ico">

    <!-- plugin css -->
    <link media="all" type="text/css" rel="stylesheet" href="/assets/fonts/feather-font/css/iconfont.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
    <!-- end plugin css -->


    <!-- common css -->
    <link media="all" type="text/css" rel="stylesheet" href="/css/app.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/custom/style.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/custom/query.css">
    <!-- end common css -->

    </script>
    <script>jQuery.noConflict(true);</script>
    
</head>

<body>
    @yield('content')
    <div class="footer">
        <p class="text-gray text-center">Copyright by {{ config('app.name', 'Tinkers Ltd.') }} 2022. যেকোন প্রয়োজনে
            যোগাযোগঃ
            <b>01321 300 804</b>
        </p>
    </div>


    <!-- base js -->
    <script src="/js/app.js"></script>
    <script src="/assets/plugins/feather-icons/feather.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <!-- end plugin js -->

    <!-- common js -->
    <script src="/assets/js/template.js"></script>
    <!-- end common js -->


</body>

</html>