@extends("dashboards.boarder.layouts.boarder_layout")
@section('title', 'Pay Bill')
@section('extra_css')
<style>
    .form-container {
        padding-left: auto;
        padding-right: auto;
    }
    .bill-form {
        max-width : 700px;
        width: 500px;
        padding-left : 10px;
        padding-right : 10px;
    }
</style>
@endsection
@section('contents')
<div class="container">
    <div class="row">
    <div class="bill-form mx-auto">
        <h5>বিলের নাম : {{ $bill->name }}</h5>
        <h5>মাস ও বছর : {{ $bill->month.', '.$bill->year }}</h5>
        <h5>পরিমান : {{ $bill->amount }} টাকা</h5>
        <br>
        <form action="{{ route('boarder.submit_bill_information') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $bill->id }}" name="id">
            <div class="form-group">
                <label for="information">বিল পরিশোধের তথ্য</label>
                <textarea type="text" id="information" class="form-control" placeholder="বিকাশ/রকেট, ট্রান্সেকশন আইডি ইত্যাদি দিন।" name="information">@if($bill_user->information != null){{$bill_user->information}}@endif</textarea>
                @error('information')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button value="submit" class="btn btn-success">সেভ করুন</button>
        </form>
    </div>
    </div>
</div>
@endsection