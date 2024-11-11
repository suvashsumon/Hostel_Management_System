@extends('dashboards.mess_authority.layout.mess_auth_layout')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('contents')
<div class="container">
    <h4>চলতি মাসের সমস্ত তথ্য</h4>
</div>
<div class="container mt-4">
    <div class="row">
        <!-- Total Bill of This Month Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header"><h1 class="display-4">{{$total_bill_this_month}}&#2547;</h1></div>
                <div class="card-body">
                    <p class="card-text">মোট বিল</p>
                </div>
            </div>
        </div>

        <!-- Total Unpaid Bill of This Month Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header"><h1 class="display-4">{{$total_unpaid_bill_this_month}}&#2547;</h1></div>
                <div class="card-body">
                    <p class="card-text">মোট বকেয়া বিল</p>
                </div>
            </div>
        </div>

        <!-- Total Paid Bill of This Month Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header"><h1 class="display-4">{{$total_paid_bill_this_month}}&#2547;</h1></div>
                <div class="card-body">
                    <p class="card-text">মোট পরিশোধিত বিল</p>
                </div>
            </div>
        </div>

        <!-- Total Boarders Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header"><h1 class="display-4">{{$total_boarders}} জন</h1></div>
                <div class="card-body">
                    <p class="card-text">বর্তমান বোর্ডার</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
