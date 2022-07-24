@extends('dashboards.mess_authority.layout.mess_auth_layout')
@section('title', 'Add Boarder')
@section('Customars', 'active')

@section('extra_css')
<style>
    .profile-pic {
        border-radius: 50%;
    }
</style>
@endsection

@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ফোন নম্বর দিয়ে বোর্ডার যুক্ত করুন
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mx-sm-5 mb-1">
                      <label for="inputPassword2" class="sr-only">Password</label>
                      <input type="number" class="form-control" id="inputPassword2" placeholder="ফোন নম্বর (ex. 017XXXXXXX">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">খুঁজুন</button>
                  </form>
                  <br>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ছবি</th>
                        <th scope="col">ইনফরমেশন</th>
                        <th scope="col">অ্যাকশন</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><img class="profile-pic" src="https://suvashkumar.netlify.app/images/sk.jpg" height="40px" width="40px"></th>
                        <td>Mark</td>
                        <td><a href="#" class="btn btn-sm btn-success">যুক্ত করুন</a></td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="text-center">খুঁজে পাওয়া যায়নি!!</p>
            </div>
          </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            নতুন বোর্ডার রেজিস্টার করুন
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
</div>

@endsection