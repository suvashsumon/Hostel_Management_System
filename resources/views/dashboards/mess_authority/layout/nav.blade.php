<ul class="nav">
    <li class="nav-item @yield('dashboard')">
        <a href="{{ route('authority.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="trending-up"></i>
            <span class="link-title">ড্যাশবোর্ড</span>
        </a>
    </li>
    <li class="nav-item @yield('Boarders')">
        <a class="nav-link" data-toggle="collapse" href="#boarder" role="button" aria-expanded="false"
            aria-controls="boarder">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">বোর্ডার</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="boarder">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('authority.all_boarders') }}" class="nav-link @yield('all_boarders')">সকল বোর্ডারগণ</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('authority.add_boarder') }}" class="nav-link @yield('add_boarder')">নতুন বোর্ডার যুক্ত করুন</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('authority.groups') }}" class="nav-link @yield('groups')">গ্রুপ</a>
                </li>
                

            </ul>
        </div>
    </li>
    @if(Auth::user()->role != 'mess_manager')
    <li class="nav-item @yield('Managers')">
        <a href="{{ route('authority.managers') }}" class="nav-link">
            <i class="link-icon" data-feather="user-check"></i>
            <span class="link-title">ম্যানেজার</span>
        </a>
    </li>
    @endif
    <li class="nav-item @yield('Settings')">
        <a href="{{ route('authority.settings') }}" class="nav-link">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">সেটিংস</span>
        </a>
    </li>

</ul>