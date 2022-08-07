@extends('dashboards.mess_authority.layout.mess_auth_layout')
@section('title', 'Bill History')
@section('extra_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('contents')
<h4><i data-feather="dollar-sign"></i> সকল বিল</h4>
<br />
<table id="example" class="table table-sm table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>বিলের নাম</th>
                <th>মাস</th>
                <th>বছর</th>
                <th>বছর</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $bill->name }}</td>
                    <td>{{ $bill->month }}</td>
                    <td>{{ $bill->year }}</td>
                    <td>{{ $bill->amount }}</td>
                    <td>
                        <a href="{{ route('authority.view_bill', $bill->id) }}" class="btn btn-sm btn-warning">View</a>
                        <a href="{{ route('authority.delete_bill', $bill->id) }}" class="btn btn-sm btn-danger delete-confirm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
@endsection

@section('extra_js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script>
    $(".delete-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "নিশ্চিত করুন",
            text: "এই বিল সম্পর্কিত সকল তথ্য মুছে যাবে।",
            icon: "warning",
            dangerMode: true,
            buttons: ["বাতিল করুন", "ডিলিট!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>

@endsection