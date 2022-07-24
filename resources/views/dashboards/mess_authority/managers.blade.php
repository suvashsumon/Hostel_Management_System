@extends('dashboards.mess_authority.layout.mess_auth_layout') @section('title',
'Add Boarder') @section('Managers', 'active') @section('extra_css')
<style>
    .user-pic {
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }
</style>
@endsection @section('contents')
<h4><i data-feather="user-check"></i> ম্যানেজার</h4>
<br />
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>ফোন নম্বর দিয়ে ম্যানেজার যুক্ত করুন</h5>
            </div>
            <div class="card-body">
                <form
                    class="form-inline"
                    method="post"
                    action="{{ route('authority.search_registered_user') }}"
                >
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">
                                ফোন নম্বর
                            </div>
                        </div>
                        <input
                            type="text"
                            class="form-control"
                            id="inlineFormInputGroupUsername2"
                            placeholder="Ex. 017XXXXXXX"
                            name="phone_no"
                            required
                        />
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        যুক্ত করুন
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>সকল ম্যানেজার</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ছবি</th>
                            <th scope="col">তথ্য</th>
                            <th scope="col">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><img class="user-pic" src="/images/default_user.png"></th>
                            <td>Mark Jukarbarg - 01717601509</td>
                            <td><a class="btn btn-sm btn-danger confirm-delete" href="#">ডিলিট</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>নতুন ম্যানেজার রেজিস্টার করুন</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ route('authority.register_boarder') }}"
                    method="post"
                >
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">নাম</div>
                        </div>
                        <input
                            type="text"
                            class="form-control @error('name')is-invalid @enderror"
                            id="inlineFormInputGroupUsername2"
                            placeholder=""
                            name="name"
                            value="{{ old('name') }}"
                            required
                        />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">
                                মোবাইল নম্বর
                            </div>
                        </div>
                        <input
                            type="text"
                            class="form-control @error('phone_no')is-invalid @enderror"
                            id="inlineFormInputGroupUsername2"
                            placeholder="Ex. 017XXXXXXX"
                            name="phone_no"
                            value="{{ old('phone_no') }}"
                            required
                        />
                        @error('phone_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">ইমেইল</div>
                        </div>
                        <input
                            type="email"
                            class="form-control @error('email')is-invalid @enderror"
                            id="inlineFormInputGroupUsername2"
                            placeholder=""
                            name="email"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">
                                পাসওয়ার্ড
                            </div>
                        </div>
                        <input
                            type="text"
                            class="form-control @error('password')is-invalid @enderror"
                            id="inlineFormInputGroupUsername2"
                            placeholder=""
                            name="password"
                            value="{{ old('password') }}"
                            required
                        />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        রেজিস্টার করুন
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra_js')
<script>
    $(".confirm-delete").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "নিশ্চিত করুন",
            text: "এই ম্যানেজার সকল তথ্য মুছে যাবে!",
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
