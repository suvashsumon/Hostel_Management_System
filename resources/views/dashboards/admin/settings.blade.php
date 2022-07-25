@extends('dashboards.admin.layout.admin_layout') @section('title',
'Add Boarder') @section('Settings', 'active') @section('extra_css')
<style>
    .user-pic {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }
</style>
@endsection @section('contents')
<h4><i data-feather="settings"></i> Settings</h4>
<br />
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>Change Personal Information</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ route('admin.change_personal_information') }}"
                    method="post"
                >
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">Name</div>
                        </div>
                        <input
                            type="text"
                            class="form-control @error('name')is-invalid @enderror"
                            id="name"
                            placeholder=""
                            name="name"
                            value="{{ Auth::user()->name }}"
                            required
                        />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">
                                Phone No.
                            </div>
                        </div>
                        <input
                            type="text"
                            class="form-control @error('phone_no')is-invalid @enderror"
                            id="phone_no"
                            placeholder="Ex. 017XXXXXXX"
                            name="phone_no"
                            value="{{ Auth::user()->phone_no }}"
                            required
                        />
                        @error('phone_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">Email</div>
                        </div>
                        <input
                            type="email"
                            class="form-control @error('email')is-invalid @enderror"
                            id="email"
                            placeholder=""
                            name="email"
                            value="{{ Auth::user()->email }}"
                            required
                        />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        Save
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ route('admin.change_password') }}"
                    method="post"
                >
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">New Password</div>
                        </div>
                        <input
                            type="password"
                            class="form-control @error('password')is-invalid @enderror"
                            id="password"
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
                                Confirm Password
                            </div>
                        </div>
                        <input
                            type="password"
                            class="form-control @error('password_confirm')is-invalid @enderror"
                            id="new_password"
                            name="password_confirm"
                            required
                        />
                        @error('password_confirm')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Change Profile Picture</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img
                        src="/images/user_pic/{{ Auth::user()->user_pic }}"
                        class="user-pic"
                        id="previewImage"
                    />
                </div>
                <form
                    class="form-inline"
                    method="post"
                    enctype="multipart/form-data"
                    action="{{ route('admin.change_profile_pic') }}"
                >
                    @csrf
                    <div class="custom-file mb-3">
                        <input
                            type="file"
                            class="custom-file-input @error('user_pic')is-invalid @enderror"
                            id="customFile"
                            name="user_pic"
                            onchange="loadFile(event)"
                        />
                        @error('user_pic')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="custom-file-label" for="customFile"
                            >Choose File</label
                        >
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        Save
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
