@extends('dashboards.mess_authority.layout.mess_auth_layout')
@section('title', 'Groups')
@section('Boarders', 'active')
@section('groups', 'active')
@section('extra_css')
<link rel="stylesheet" href="/assets/plugins/chosen/component-chosen.min.css">
<style>
    .profile-pic {
        border-radius: 50%;
    }
</style>
@endsection @section('contents')
<h4><i data-feather="users"></i> গ্রুপ</h4>
<br>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>নতুন গ্রুপ তৈরী করুন</h5>
            </div>
            <div class="card-body">
                <form
                    method="post"
                    action="{{ route('authority.create_groups') }}"
                >
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">নাম</div>
                        </div>
                        <input
                            type="text"
                            class="form-control @error('group_name')is-invalid @enderror"
                            id="inlineFormInputGroupGroupName2"
                            placeholder=""
                            name="group_name"
                            value="{{ old('group_name') }}"
                            required
                        />
                        @error('group_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">বিবরণ</div>
                        </div>
                        <textarea
                            type="text"
                            class="form-control form-control-sm @error('description')is-invalid @enderror"
                            id="inlineFormInputDescription2"
                            placeholder=""
                            rows="2"
                            name="description"
                            value="{{ old('description') }}"
                        ></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">মেম্বার্স</div>
                        </div>
                        <select id="multiple" class="form-control form-control-chosen @error('boarder_select')is-invalid @enderror" data-placeholder="বোর্ডার নির্বাচন করুন" name="boarder_select[]" multiple>
                            @foreach ($boarders as $boarder)
                            <option value="{{ $boarder->id }}">{{ $boarder->name." - ".$boarder->phone_no}}</option>
                            @endforeach
                        </select>
                        @error('boarder_select')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                    তৈরী করুন
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>সকল গ্রুপ</h5>
            </div>
            <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">নাম</th>
                    <th scope="col">বিবরণ</th>
                    <th scope="col">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->description }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="#">এডিট</a>
                        <a class="btn btn-sm btn-danger delete-confirm" href="{{ route('authority.delete_groups', $group->id) }}">ডিলিট</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@section('extra_js')
<script src="/assets/plugins/chosen/chosen.jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.form-control-chosen').chosen();
    });
</script>
<script>
    $(".delete-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "নিশ্চিত করুন",
            text: "এই গ্রুপের সকল তথ্য মুছে যাবে!",
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

@endsection
