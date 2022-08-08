@extends('dashboards.boarder.layouts.boarder_layout')
@section('home', 'active')
@section('title', 'Home')

@section('contents')
<div class="container">
            <div class="text-center bg-offwhite pt-5 pr-5 pl-5 pb-5">
                <h1>স্বাগতম, {{ Auth::user()->name }}</h1>
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
                <a href="{{ route('boarder.notifications') }}" class="btn btn-success">নোটিফিকেশনস@if($unread>0)({{ $unread }})@endif</a>
                <a href="#" class="btn btn-warning" onclick="logout()">লগ আউট</a>
            </div>
            <div class="boarder-line mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center pt-4 pr-4 pb-4 pl-4">
                            <h3>সকল নোটিশ</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="#" class="btn btn-success">বিস্তারিত..</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center pt-4 pr-4 pb-4 pl-4">
                            <h3>নোটিফিকেশনস@if($unread>0)({{ $unread }})@endif</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="#" class="btn btn-success">বিস্তারিত..</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center pt-4 pr-4 pb-4 pl-4">
                            <h3>বিল হিস্ট্রি</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="#" class="btn btn-success">বিস্তারিত..</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer bg-offwhite mt-3 pt-4 pb-2">
                <p class="text-gray text-center">
                    Copyright by {{ config("app.name", "Tinkers Ltd.") }} 2022.
                    যেকোন প্রয়োজনে যোগাযোগঃ
                    <b>01321 300 804</b>
                </p>
            </div>
        </div>
    @endsection