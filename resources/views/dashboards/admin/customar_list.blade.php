@extends('dashboards.admin.layout.admin_layout')

@section('title', 'Active Customar List')
@section('Customars', 'active')
@section('active_customar_list', 'active')

@section('extra_css')
<link media="all" type="text/css" rel="stylesheet"
    href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection


@section('contents')
<h4><i class="fa fa-users"></i> Customar List</h4>
<hr>
<table class="table table-sm" id="customarlist" width="100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Expiry date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customars as $customar)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <th>
                <a href="{{ route('admin.deactivate_user', $customar->id) }}" class="btn btn-outline-warning btn-sm deactive-confirm">Deactive</a>
                <a href="{{ route('admin.delete_mess_owner', $customar->id)}}" class="btn btn-outline-danger btn-sm delete-confirm">Delete</a>
            </th>
            <td>{{ $customar->name }}</td>
            <td>{{ $customar->phone_no }}</td>
            <td>{{ $customar->email }}</td>
            <td>{{ $customar->active_till }}</td>
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
        $('#customarlist').DataTable();
    });

    $(".delete-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Alart",
            text: "All the information of this user will be deleted!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancel", "Delete!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $(".deactive-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Alart",
            text: "This user account will be deactivate!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancel", "Deactivate!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection