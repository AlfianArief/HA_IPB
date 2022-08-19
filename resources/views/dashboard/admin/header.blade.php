<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #1F4690;">
  <a class="navbar-brand fs-5 col-md-3 col-lg-2 me-0 px-3" href="#">Himpunan Alumni IPB</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-items text-nowrap">
      <a href="{{ route('user.logout') }}" class="nav-link px-3" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
      <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form>
    </div>
  </div>   
</header>

