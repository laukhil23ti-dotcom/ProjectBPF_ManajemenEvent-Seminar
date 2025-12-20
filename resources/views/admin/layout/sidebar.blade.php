<nav class="sidebar sidebar-offcanvas">
    <ul class="nav">

        <li class="nav-item">
            <a href="{{ route('staff.dashboard') }}" class="nav-link">
                <i class="typcn typcn-device-desktop"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('staff.peserta.index') }}" class="nav-link">
                <i class="typcn typcn-group-outline"></i>
                <span class="menu-title">Data Peserta</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm w-100">
                    Logout
                </button>
            </form>
        </li>

    </ul>
</nav>
