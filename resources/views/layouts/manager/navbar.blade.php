<nav class="main-header navbar navbar-expand navbar-dark" style="background: linear-gradient(90deg,#0f172a,#1e293b);">

    <!-- LEFT NAV -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard.manager') }}" class="nav-link fw-bold">
                Dashboard Manager
            </a>
        </li>
    </ul>

    <!-- RIGHT NAV -->
    <ul class="navbar-nav ml-auto">

        <!-- DATE -->
        <li class="nav-item d-none d-md-inline-block">
            <span class="nav-link text-white-50">
                <i class="far fa-calendar-alt"></i>
                {{ date('d M Y') }}
            </span>
        </li>

        <!-- USER DROPDOWN -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle"></i>
                <span class="ml-1">{{ Auth::user()->name ?? 'Manager' }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-item text-center">
                    <strong>{{ Auth::user()->name ?? 'Manager' }}</strong><br>
                    <small class="text-muted">{{ Auth::user()->email ?? '-' }}</small>
                    <div class="mt-2">
                        <span class="badge badge-info px-2 py-1">
                            {{ Auth::user()->role ?? '-' }}
                        </span>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <a href="{{ route('auth.logout') }}" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>

    </ul>
</nav>