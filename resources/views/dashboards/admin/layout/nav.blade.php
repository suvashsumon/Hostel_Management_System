<ul class="nav">
    <li class="nav-item @yield('dashboard')">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="trending-up"></i>
            <span class="link-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item @yield('Customars')">
        <a class="nav-link" data-toggle="collapse" href="#order" role="button" aria-expanded="false"
            aria-controls="order">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Customars</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="order">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('customar.list') }}" class="nav-link ">Active Customar List</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inactive.expired.customar.list') }}" class="nav-link ">Exp/Inactive Customars</a>
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
    <li class="nav-item @yield('Settings')">
        <a href="{{ route('admin.settings') }}" class="nav-link">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Settings</span>
        </a>
    </li>

</ul>