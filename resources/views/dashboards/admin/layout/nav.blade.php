<ul class="nav">
    <li class="nav-item @yield('dashboard')">
        <a href="http://127.0.0.1:8000/admin/dashboard" class="nav-link">
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
                <li class="nav-item @yield('active_customar_list')">
                    <a href="{{ route('customar.list') }}" class="nav-link ">Active Customar List</a>
                </li>
                <li class="nav-item @yield('inactive_customar_list')">
                    <a href="{{ route('inactive.expired.customar.list') }}" class="nav-link ">Exp/Inactive Customars</a>
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