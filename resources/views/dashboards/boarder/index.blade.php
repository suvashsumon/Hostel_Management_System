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
        <style>
            .bg-offwhite {
                background-color: #f2f2f2;
            }
            .boarder-line {
                border: 2px solid #f2f2f2;
            }
        </style>

        <title>Home</title>
    </head>
    <body>
        <div class="container">
            <div class="text-center bg-offwhite pt-5 pr-5 pl-5 pb-5">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
                <a href="#" class="btn btn-success">View all notification</a>
                <a href="#" class="btn btn-warning">Log Out</a>
            </div>
            <div class="boarder-line mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center pt-4 pr-4 pb-4 pl-4">
                        <h3>Notifications</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">View all</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center pt-4 pr-4 pb-4 pl-4">
                        <h3>Notifications</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">View all</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center pt-4 pr-4 pb-4 pl-4">
                        <h3>Notifications</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">View all</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer bg-offwhite mt-3 pt-4 pb-2">
            <p class="text-gray text-center">Copyright by {{ config('app.name', 'Tinkers Ltd.') }} 2022. যেকোন প্রয়োজনে
                যোগাযোগঃ
                <b>01321 300 804</b>
            </p>
        </div>
        </div>

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
    </body>
</html>
