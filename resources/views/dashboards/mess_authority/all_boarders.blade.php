@extends('dashboards.mess_authority.layout.mess_auth_layout') @section('title',
'All Boarder List') @section('Boarders', 'active') @section('extra_css')
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
        <a
            class="btn btn-xm btn-primary"
            href="{{ route('authority.add_boarder') }}"
        >
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>

<hr />
<div class="table-responsive">
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
                    @if($boarder->status == 'active')
                    <a
                        href="{{ route('authority.deactivate_boarder', $boarder->id) }}"
                        class="btn btn-warning btn-xs deactivate-confirm"
                        >বন্ধ</a
                    >
                    @else
                    <a
                        href="{{ route('authority.activate_boarder', $boarder->id) }}"
                        class="btn btn-info btn-xs activate-confirm"
                        >সচল</a
                    >
                    @endif
                    <a
                        href="{{ route('authority.delete_boarder', $boarder->id) }}"
                        class="btn btn-danger btn-xs delete-confirm"
                        >ডিলেট</a
                    >
                </th>
                <td>{{ $boarder->name }}</td>
                <td>{{ $boarder->phone_no }}</td>
                <td>{{ $boarder->email }}</td>
                <td>{{ $boarder->last_subscribed }}</td>
                <td>
                    @if($boarder->status == 'active')
                    <span class="text-success">সচল</span>
                    @else
                    <span class="text-danger">বন্ধ</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection @section('extra_js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#customarlist").DataTable();
    });
</script>
<script>
    $(".delete-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "নিশ্চিত করুন",
            text: "এই বোর্ডারের সকল তথ্য মুছে যাবে!",
            icon: "warning",
            dangerMode: true,
            buttons: ["বাতিল করুন", "ডিলিট!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $(".activate-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "নিশ্চিত করুন",
            text: "বোর্ডারের একাউন্টটি চালু করতে চান?",
            icon: "warning",
            buttons: ["বাতিল করুন", "চালু করুন"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $(".deactivate-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "নিশ্চিত করুন",
            text: "বোর্ডারের একাউন্টটি বন্ধ করতে চান?",
            icon: "warning",
            buttons: ["বাতিল করুন", "বন্ধ করুন"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection
