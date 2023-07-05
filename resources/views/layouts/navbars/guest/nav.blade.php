<!-- Navbar -->
<nav class="navbar navbar-expand-lg   mb-3 w-100 bg-white">
    <div class="container-fluid ">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
            Brother's Keeper
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                            href="{{ url('donations') }}">
                            <i class="fa fa-chart-pie opacity-6 me-1 "></i>
                            My Donations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ url('profile') }}">
                            <i
                                class="fa fa-user opacity-6 me-1 {{ Request::is('static-sign-up') ? '' : 'text-dark' }}"></i>
                            Profile
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link fw-bold me-2" href="{{ url('welcome') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold me-2" href="{{ url('campaigns') }}">

                        My Campaigns
                    </a>
                </li>

            </ul>
            <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-in') : url('login') }}">
                        <i class="fas fa-key opacity-6 me-1 {{ Request::is('static-sign-up') ? '' : 'text-dark' }}"></i>
                        Sign In
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
