@extends('dashboards.boarder.layouts.boarder_layout')
@section('notifications', 'active')
@section('title', 'Notifications')

@section('contents')
<div class="container">
    <h4>নতুন</h4>
    <hr>
    @foreach($notifications as $notification)
        @if($notification->status == 'unread')
            <div class="card mb-2">
                <div class="card-body">
                    {{ $notification->message }}
                </div>
            </div>
      @endif
    @endforeach
    <br>
    <h4>পুরাতন</h4>
    <hr>
    @foreach($notifications as $notification)
        @if($notification->status == 'read')
            <div class="card mb-2">
                <div class="card-body">
                    {{ $notification->message }} <a href="#">পরিশোধ করুন</a>
                </div>
            </div>
      @endif
    @endforeach
</div>
@endsection