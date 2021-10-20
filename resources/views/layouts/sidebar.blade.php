<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            <div class="main-navbar">
                <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                    <a class="navbar-brand w-100 mr-0" href="dashboard" style="line-height: 25px;">
                        <div class="d-table m-auto logo">
                            <img src="{{asset('images/zine.png')}}" alt="loho" />
                        </div>
                    </a>
                    <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                        <i class="material-icons">&#xE5C4;</i>
                    </a>
                </nav>
            </div>
            <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                <div class="input-group input-group-seamless ml-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                </div>
            </form>
            <div class="nav-wrapper">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard')}}">
                            <i><img src="{{asset('images/dash-icon.png')}}"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.create')}}">
                            <i><img src="{{asset('images/16061-[Converted].png')}}"></i>
                            <span>Add Customer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.index')}}">
                            <i><img src="{{asset('images/customer.png')}}"></i>
                            <span>View Customer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appointments.create')}}">
                            <i><img src="{{asset('images/appointment.png')}}"></i>
                            <span>Add Appointment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appointments.index')}}">
                            <i><img src="{{asset('images/file.png')}}"></i>
                            <span>View Appointment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i><img src="{{asset('images/logout-icon.png')}}"></i>
                            <span>Log out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div
