<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ route('boarder.dashboard') }}">{{ config("app.name", "Tinkers Ltd.") }}</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item @yield('home')">
        <a class="nav-link" href="{{ route('boarder.dashboard') }}">হোম</a>
      </li>
      <li class="nav-item @yield('notifications')">
        <a class="nav-link" href="{{ route('boarder.notifications') }}">নোটিফিকেশনস</a>
      </li>
      <li class="nav-item @yield('settings')">
        <a class="nav-link" href="{{ route('boarder.settings') }}">সেটিংস</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
    <a href="#" class="btn btn-warning" onclick="logout()">লগ আউট</a>
    <form action="/logout" method="post" id="logout-form">
                    @csrf
                </form>
    </div>
  </div>
</nav>