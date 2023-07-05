<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/welcome">
            Brother's Keeper
        </a>
        <ul class="navbar-nav mx-auto">
            @if (auth()->user())
                <li class="nav-item">
                    <a class="nav-link fw-bold d-flex align-items-center me-2 active" aria-current="page"
                        href="{{ url('mydonation') }}">
                        My Donations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold me-2" href="{{ url('profile') }}">
                        Profile
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link fw-bold me-2" href="{{url('welcome')  }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold me-2" href="{{ url('campaigns')  }}">

                    Our Campaigns
                </a>
            </li>

        </ul>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/logout') }}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
