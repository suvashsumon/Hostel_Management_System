@extends('dashboards.admin.layout.admin_layout')

@section('title', 'New Registered User List')
@section('Customars', 'active')


@section('extra_css')
<link media="all" type="text/css" rel="stylesheet"
    href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection


@section('contents')
<h4><i class="fa fa-users"></i> New Registered User List</h4>
<hr>
<table class="table table-sm" id="customarlist" width="100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customars as $customar)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <th>
                <button title="Give owner access" class="btn btn-outline-success btn-sm" data-toggle="modal"
                    data-target="#updateExpiryDate{{ $customar->id }}">Owner Access</button>
                <a class="btn btn-sm btn-outline-danger delete-confirm" href="{{ route('admin.delete_user', $customar->id) }}">Delete</a>
            </th>
            <td>{{ $customar->name }}</td>
            <td>{{ $customar->phone_no }}</td>
            <td>{{ $customar->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($customars as $customar)
<!-- Modal -->
<div class="modal fade" id="updateExpiryDate{{ $customar->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Owner Access <span
                        class="badge badge-dark text-light">{{ $customar->name }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.give_owner_access') }}" method="post">
                    @csrf
                    <input name="customar_id" type="hidden" value="{{ $customar->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Expiry Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="expiry_date" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


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
</script>
@endsection