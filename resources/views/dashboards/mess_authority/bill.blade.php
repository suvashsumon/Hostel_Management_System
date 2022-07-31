@extends('dashboards.mess_authority.layout.mess_auth_layout') @section('title',
'Bill') @section('Bill', 'active')
@section('extra_css')
<link rel="stylesheet" href="/assets/plugins/chosen/component-chosen.min.css">
<style>
    .profile-pic {
        border-radius: 50%;
    }
</style>
@endsection
@section('contents')
<h4><i data-feather="dollar-sign"></i> বিল</h4>
<br />
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">নতুন বিল তৈরী করুন</h5>
            <div class="card-body">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text text-dark"
                                id="inputGroupPrepend"
                                >বিলের নাম</span
                            >
                        </div>
                        <input
                            type="text"
                            class="form-control"
                            id="validationCustomUsername"
                            placeholder=""
                            aria-describedby="inputGroupPrepend"
                            required
                        />
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text text-dark"
                                        id="inputGroupPrepend"
                                        >মাস</span
                                    >
                                </div>
                                <select
                                    type="text"
                                    class="form-control text-dark"
                                    id="validationCustomUsername"
                                    placeholder=""
                                    aria-describedby="inputGroupPrepend"
                                    required
                                >
                                    <option value="January">জানুয়ারী</option>
                                    <option value="February">ফেব্রুয়ারী</option>
                                    <option value="March">মার্চ</option>
                                    <option value="April">এপ্রিল</option>
                                    <option value="May">মে</option>
                                    <option value="June">জুন</option>
                                    <option value="July">জুলাই</option>
                                    <option value="August">অগাস্ট</option>
                                    <option value="September">
                                        সেপ্টেম্বর
                                    </option>
                                    <option value="October">অক্টোবর</option>
                                    <option value="November">নভেম্বর</option>
                                    <option value="December">ডিসেম্বর</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text text-dark"
                                        id="inputGroupPrepend"
                                        >সাল</span
                                    >
                                </div>
                                <select
                                    type="text"
                                    class="form-control text-dark"
                                    id="validationCustomUsername"
                                    placeholder=""
                                    aria-describedby="inputGroupPrepend"
                                    required
                                >
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text text-dark"
                                        id="inputGroupPrepend"
                                        >পরিমান</span
                                    >
                                </div>
                                <input
                                    type="number"
                                    class="form-control text-dark"
                                    id="validationCustomUsername"
                                    placeholder=""
                                    aria-describedby="inputGroupPrepend"
                                    required
                                />
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text text-dark"
                                        id="inputGroupPrepend"
                                        >লাস্ট ডেট</span
                                    >
                                </div>
                                <input
                                    type="date"
                                    class="form-control text-dark"
                                    id="validationCustomUsername"
                                    placeholder=""
                                    aria-describedby="inputGroupPrepend"
                                    required
                                />
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-2">
                        <label for="inputPassword4"><b>বিল আপ্লাই করার জন্য সিলেক্ট করুন:</b></label>
                        <select id="optgroup" class="form-control form-control-chosen" data-placeholder="Please select..." multiple>
                            <optgroup label="গ্রুপ">
                            @foreach($groups as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                            </optgroup>
                            <optgroup label="বোর্ডার">
                            @foreach($boarders as $boarder)
                              <option value="{{ $boarder->id }}">{{ $boarder->name }}</option>
                            @endforeach
                            </optgroup>
                          </select>
                    </div>

                    
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">চলতি মাসের সকল বিল</h5>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script src="/assets/plugins/chosen/chosen.jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.form-control-chosen').chosen();
    });
</script>
@endsection
