@extends('dashboards.mess_authority.layout.mess_auth_layout')
@section('title', 'View Groups')
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
<h4><i data-feather="users"></i> গ্রুপ - {{ $group_info->name }}</h4>
<br>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>গ্রুপের বিবরণ</h5>
            </div>
            <div class="card-body">
                <form
                    method="post"
                    action="{{ route('authority.update_group_info') }}"
                >
                    @csrf
                    <input type="hidden" name="group_id" value="{{ $group_info->id }}">
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
                            value="{{ $group_info->name }}"
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
                        >{{ $group_info->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                    সেভ করুন
                    </button>
                </form>
            </div>
        </div>


        <div class="card mt-3">
            <div class="card-header">
                <h5>মেম্বার যোগ করুন</h5>
            </div>
            <div class="card-body">
                <form
                    method="post"
                    action="{{ route('authority.add_member_to_group') }}"
                >
                    @csrf
                    <input type="hidden" name="group_id" value="{{ $group_info->id }}">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-dark">মেম্বার্স</div>
                        </div>
                        <select id="multiple" class="form-control form-control-chosen @error('boarder_select')is-invalid @enderror" data-placeholder="বোর্ডার নির্বাচন করুন" name="boarder_select[]" multiple>
                            @foreach ($not_members as $boarder)
                            @if($boarder->isMember == false)
                            <option value="{{ $boarder->id }}">{{ $boarder->name." - ".$boarder->phone_no}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('boarder_select')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                    যোগ করুন
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>গ্রুপের মেম্বারগণ</h5>
            </div>
            <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">নাম</th>
                    <th scope="col">ফোন</th>
                    <th scope="col">স্ট্যাটাস</th>
                    <th scope="col">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group_members as $g_member)
                    <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $g_member->user->name }}</td>
                    <td>{{ $g_member->user->phone_no }}</td>
                    <td>
                        @if($g_member->user->status == 'active')
                        <span class="text-success">সচল</span>
                        @else
                        <span class="text-success">বন্ধ</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-danger delete-confirm" href="{{ route('authority.remove_group_member', $g_member->id) }}">বাদ দিন</a>
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
            text: "এই বর্ডার গ্রুপ থেকে বাদ যাবে!",
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
