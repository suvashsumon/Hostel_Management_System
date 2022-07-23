<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <div class="small_screen_search_trigger">
                    <a href="#" class="nav-link" id="search_trigger">
                        <i data-feather="search"></i>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="/images/default_user.png" alt="profile">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="/images/default_user.png" alt="avatar">
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                            <p class="email text-muted mb-3"></p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">


                            <li class="nav-item">
                                <a href="http://127.0.0.1:8000/admin/settings" class="nav-link">
                                    <i data-feather="settings"></i>
                                    <span>সেটিংস</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href=http://127.0.0.1:8000/logout
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>
                                    <span>লগ আউট</span>
                                </a>
                                <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</nav>