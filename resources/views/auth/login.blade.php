@extends('auth.auth_layout')
@section('title','Login')
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
                                    <a href="#" class="noble-ui-logo d-block mb-2">{{ config('app.name', 'Tinkers Ltd.')
                                        }}</a>
                                    <h5 class="text-muted font-weight-normal mb-4">আপনার একাউন্ট এ লগিন করুন!!!</h5>
                                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">

                                            <input type="number" name="phone_no" required class="form-control"
                                                id="exampleInputPhone" placeholder="আপনার মোবাইল নাম্বার দিন">
                                            @error('phone_no')
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
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="remember"
                                                    id="remember">
                                                সেভ পাসওয়ার্ড
                                            </label>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary mb-md-0 mr-2 mb-2">প্রবেশ
                                                করুন</button>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                পাসওয়ার্ড ভুলে গেছেন ?
                                            </a>
                                        </div>
                                        <a href="{{ route('register') }}"
                                            class="btn btn-success float-left p-3 mr-3 ml-0 mt-3 mb-3"><b>নতুন
                                                একাউন্ট তৈরি করুন</b></a>
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