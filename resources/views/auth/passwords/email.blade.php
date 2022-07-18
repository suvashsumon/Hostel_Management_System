@extends('auth.auth_layout')
@section('title','Password Recovery')
@section('content')

<div class="main-wrapper master2_main" id="app">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 auth-page mx-0">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pr-md-0">
                                <div class="auth-left-wrapper" style="background-image: url(/images/login_page_img.png)">

                                </div>
                            </div>

                            <div class="col-md-8 pl-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                    <a href="#" class="noble-ui-logo d-block mb-2">{{ config('app.name', 'Tinkers Ltd.')
                                        }}</a>
                                    <h5 class="text-muted font-weight-normal mb-4">পাসওয়ার্ড রিসেট লিংক পেতে ফর্মটি সাবমিট করুন!!!</h5>
                                    <form class="forms-sample" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">

                                            <input type="email" name="email" required class="form-control"
                                                id="exampleInputPhone" placeholder="আপনার ইমেইল দিন">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary mb-md-0 mr-2 mb-2">প্রবেশ
                                                করুন</button>
                                        </div>
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