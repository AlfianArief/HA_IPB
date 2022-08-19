<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('user.index') ? 'active' : '' }}"  href="{{ route('user.index') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user/cabang') ? 'active' : '' }}" href="/dashboard/user/cabang">
              <span data-feather="layers"></span>
              Cabang Himpunan
            </a>
          </li>
        </ul>
      </div>
    </nav>