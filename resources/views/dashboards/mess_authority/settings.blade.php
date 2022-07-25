@extends('dashboards.mess_authority.layout.mess_auth_layout') @section('title',
'Add Boarder') @section('Settings', 'active') @section('extra_css')
<style>
    .user-pic {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }
</style>
@endsection @section('contents')
<h4><i data-feather="settings"></i> সেটিংস</h4>
<br />
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>প্রোফাইল পিকচার চেঞ্জ করুন</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img
                        src="/images/default_user.png"
                        class="user-pic"
                        id="previewImage"
                    />
                </div>
                <form
                    class="form-inline"
                    method="post"
                    action="{{ route('authority.add_by_phone') }}"
                >
                    @csrf
                    <div class="custom-file mb-3">
                        <input
                            type="file"
                            class="custom-file-input"
                            id="customFile"
                            name="user_pic"
                            onchange="loadFile(event)"
                        />
                        <label class="custom-file-label" for="customFile"
                            >Choose file</label
                        >
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        সেভ করুন
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>পাসওয়ার্ড চেঞ্জ করুন</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ route('authority.change_password') }}"
                    method="post"
                >
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">নতুন পাসওয়ার্ড</div>
                        </div>
                        <input
                            type="password"
                            class="form-control @error('password')is-invalid @enderror"
                            id="inlineFormInputGroupUsername2"
                            placeholder=""
                            name="password"
                            required
                        />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">
                                পাসওয়ার্ড নিশ্চিত করুন
                            </div>
                        </div>
                        <input
                            type="password"
                            class="form-control @error('password_confirm')is-invalid @enderror"
                            id="inlineFormInputGroupUsername2"
                            name="password_confirm"
                            required
                        />
                        @error('password_confirm')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        সেভ করুন
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>ব্যক্তিগত তথ্য পরিবর্তন করুন</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ route('authority.register_manager') }}"
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
                    <button type="submit" class="btn btn-primary mb-2">
                        সেভ করুন
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection @section('extra_js')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this)
            .siblings(".custom-file-label")
            .addClass("selected")
            .html(fileName);
    });
</script>
<script>
    var loadFile = function (event) {
        var image = document.getElementById("previewImage");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
