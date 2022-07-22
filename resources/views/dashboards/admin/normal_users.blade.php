@extends('dashboards.admin.layout.admin_layout')

@section('title', 'New Registered User List')
@section('Customars', 'active')


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
            <th scope="row">1</th>
            <th>
                <a href="#" class="btn btn-outline-warning btn-sm"><i
                        class="fa fa-lock"></i></a>
                <form method="POST" action="{{ route('admin.delete_user') }}">
                    @csrf
                    <input name="id" type="hidden" value="{{$customar->id}}">
                    <button type="submit" class="btn btn-xs btn-outline-danger btn-flat show_confirm"
                        data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                </form>
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