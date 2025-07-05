<nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex me-2">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">
            {{-- <x-auth.messages /> --}}
            <x-auth.notifications />

            <li class="nav-item dropdown ms-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown"
                    data-bs-toggle="dropdown">
                    <i class="align-middle fas fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('myprofile') }}"><i
                            class="align-middle me-1 fas fa-fw fa-user"></i>
                        View Profile</a>
                    <a class="dropdown-item" href="{{ route('change_password') }}"><i
                            class="align-middle me-1 fas fa-fw fa-cogs"></i>
                        Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i
                            class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
