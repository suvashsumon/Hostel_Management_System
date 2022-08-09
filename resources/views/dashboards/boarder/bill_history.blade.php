@extends('dashboards.boarder.layouts.boarder_layout')
@section('title', 'Bill History')
@section('bill-history', 'active')
@section('extra_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('contents')
<div class="container">
    <table id="example" class="table table-sm table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>মাস ও বছর</th>
                <th>বিলের নাম</th>
                <th>পরিমান</th>
                <th>পরিশোধের তথ্য</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        @foreach($bills as $bill)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $bill->bill->month.', '.$bill->bill->year }}</td>
                <td>{{ $bill->bill->name }}</td>
                <td>{{ $bill->bill->amount }}</td>
                <td>{{ $bill->information }}</td>
                <td>
                    @if($bill->status == 'paid')
                    পরিশোধিত
                    @else
                     <a href="{{ route('boarder.pay_bill_view', $bill->bill_id) }}">পরিশোধ করুন</a>
                    @endif
                </td>
            </tr>
        @endforeach
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section('extra_js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endsection