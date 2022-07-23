@extends('dashboards.mess_authority.layout.mess_auth_layout') @section('title',
'All Boarder List') @section('Customars', 'active') @section('extra_css')
<link
    media="all"
    type="text/css"
    rel="stylesheet"
    href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"
/>
@endsection @section('contents')
<div class="row">
    <div class="col-md-11">
        <h4><i class="fa fa-users"></i> সকল বোর্ডারগণ</h4>
    </div>
    <div class="col-md-1 text-right">
        <button class="btn btn-xm btn-primary">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</div>

<hr />
<table class="table table-sm" id="customarlist" width="100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">অ্যাকশন</th>
            <th scope="col">নাম</th>
            <th scope="col">ফোন নম্বর</th>
            <th scope="col">ইমেল</th>
            <th scope="col">যোগদানের তারিখ</th>
            <th scope="col">অবস্থা</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($boarders as $boarder)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <th>
                <a href="#" class="btn btn-warning btn-xs">বন্ধ</a>
                <a
                    href="{{ route('authority.delete_boarder', $boarder->id) }}"
                    class="btn btn-danger btn-xs"
                    onclick="conf_delete()"
                    >ডিলেট</a
                >
            </th>
            <td>{{ $boarder->name }}</td>
            <td>{{ $boarder->phone_no }}</td>
            <td>{{ $boarder->email }}</td>
            <td>{{ $boarder->last_subscribe }}</td>
            <td>
                @if($boarder->status == 'active')
                <span class="badge badge-success">সচল</span>
                @else
                <span class="badge badge-danger">বন্ধ</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection @section('extra_js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#customarlist").DataTable();
    });

    // delete confirmation sweet alart
    $(".show_confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection
