<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
        />
        <!-- bangla font cdn -->
        <!-- <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet"> -->
        <link
            href="https://fonts.maateen.me/siyam-rupali/font.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <style>
            body {
                font-family: "SiyamRupali", Arial, sans-serif !important;
            }
            .bg-offwhite {
                background-color: #f2f2f2;
            }
            .boarder-line {
                border: 2px solid #f2f2f2;
            }
        </style>
        @yield('extra_css')

        <title>@yield('title')</title>
    </head>
    <body @if(Session::has('flash'))
    onload="flash_message('{{Session::get('flash')}}')" @endif>
        @include('dashboards.boarder.layouts.nav')
        <div class="" style="margin-top: 70px"></div>
        @yield('contents')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"
        ></script>
        <script>
            function logout() {
                document.getElementById("logout-form").submit();
            }
        </script>
        <!-- sweet alart -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

        @yield('extra_js')
        <script>
            function flash_message(msg) {
                //alert(msg);
                swal("Message", msg, "info");
            }
        </script>
        @yield('extra_js')
    </body>
</html>
