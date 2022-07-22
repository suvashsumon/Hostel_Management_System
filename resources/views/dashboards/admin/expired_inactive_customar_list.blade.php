@extends('dashboards.admin.layout.admin_layout')

@section('title', 'Exp/Inactive Customar List')
@section('Customars', 'active')

@section('extra_css')
<link media="all" type="text/css" rel="stylesheet"
    href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection


@section('contents')
<h4><i class="fa fa-users"></i> Expired/Inactive Customar List</h4>
<hr>
<table class="table table-sm" id="customarlist" width="100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customars as $customar)
        <tr>
            <th scope="row">1</th>
            <th>
                <a class="btn btn-outline-warning btn-sm" data-toggle="modal"
                    data-target="#updateExpiryDate{{ $customar->id }}"><i class="fa fa-rotate-right"></i></a> <a
                    href="#" class="btn btn-outline-success btn-sm"><i class="fa fa-unlock"></i></a>
                <form method="POST" action="{{ route('admin.delete_user') }}">
                    @csrf
                    <input name="id" type="hidden" value="{{$customar->id}}">
                    <button type="submit" class="btn btn-sm btn-outline-danger btn-flat show_confirm"
                        data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                </form>
            </th>
            <td>{{ $customar->name }}</td>
            <td>{{ $customar->phone_no }}</td>
            <td>{{ $customar->email }}</td>
            <td>{{ $customar->status }}</td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Update Customar Status <span
                        class="badge badge-dark text-light">{{ $customar->name }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.set_expiry_date') }}" method="post">
                    @csrf
                    <input name="customar_id" type="hidden" value="{{ $customar->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">New Expiry Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="expiry_date">
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

    
    // delete confirmation sweet alart
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endsection