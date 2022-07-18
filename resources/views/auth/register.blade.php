@extends('auth.auth_layout')
@section('title','Register')
@section('content')

<div class="main-wrapper master2_main" id="app">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 auth-page mx-0">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pr-md-0">
                                <div class="auth-left-wrapper" style="background-image: url(images/login_page_img.png)">

                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">{{ config('app.name', 'Tinkers Ltd.') }}</a>
                                    <h5 class="text-muted font-weight-normal mb-4">নতুন একাউন্ট খুলুন!!!</h5>
                                    <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">

                                            <input type="text" name="name" required class="form-control"
                                                id="exampleInputName" placeholder="আপনার নাম দিন">
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="phone_no" required class="form-control"
                                                id="exampleInputPhone" placeholder="আপনার মোবাইল নাম্বার দিন">
                                            @error('phone_no')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail" placeholder="আপনার ইমেইল দিন">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            <input type="password" required name="password" class="form-control"
                                                id="exampleInputPassword1" autocomplete="current-password"
                                                placeholder="পাসওয়ার্ড দিন ">
                                                @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            <input type="password" required name="password_confirmation" class="form-control"
                                                id="exampleInputPassword2" autocomplete="current-password"
                                                placeholder="পুনরায় পাসওয়ার্ড দিন ">
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary mb-md-0 mr-2 mb-2">প্রবেশ
                                                করুন</button>
                                        </div>
                                        <a href="{{ route('login') }}"
                                            class="btn btn-success float-left p-3 mr-3 ml-0 mt-3 mb-3"><b>একাউন্ট আছে? লগইন করুন..</b></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>


        </div>

    </div>

    @endsection