<ul class="nav">
    <li class="nav-item @yield('dashboard')">
        <a href="{{ route('authority.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="trending-up"></i>
            <span class="link-title">ড্যাশবোর্ড</span>
        </a>
    </li>
    <li class="nav-item @yield('Customars')">
        <a class="nav-link" data-toggle="collapse" href="#order" role="button" aria-expanded="false"
            aria-controls="order">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">বোর্ডার</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="order">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('authority.all_boarders') }}" class="nav-link ">সকল বোর্ডারগণ</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inactive.expired.customar.list') }}" class="nav-link ">নতুন বোর্ডার যুক্ত করুন</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('new_registered_users') }}" class="nav-link ">New User List</a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a href="http://127.0.0.1:8000/admin/password_reset_requests" class="nav-link">
            <i class="link-icon" data-feather="edit"></i>
            <span class="link-title">PRR's</span>
        </a>
    </li>
    <li class="nav-item @yield('settings')">
        <a href="http://127.0.0.1:8000/admin/settings" class="nav-link">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Settings</span>
        </a>
    </li>

</ul>