  <div class="container-fluid">
    <div class="row">
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- Main Navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
              <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
                <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
              </div>
            </form>
            <ul class="navbar-nav border-left flex-row ">
              <li class="nav-item dropdown border-right">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">
                    settings
                  </i>
                </a>
                <div class="dropdown-menu dropdown-menu-small dropdown-menu-right">
                  <a class="dropdown-item" href="profile">
                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-nowrap px-3">
                  <i class="material-icons">
                    &#xE879;
                  </i>
                </a>
              </li>
            </ul>
            <nav class="nav">
              <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
              </a>
            </nav>
          </nav>
        </div>
      </main>
    </div>
  </div>