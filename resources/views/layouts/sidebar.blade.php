<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        {{-- DASHBOARD --}}
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- ADMIN ONLY --}}
            @if(auth()->user()->role === 'admin')

                <li class="nav-item">
                    <a href="{{ route('event.index') }}" class="nav-link">
                        <i class="typcn typcn-calendar-outline menu-icon"></i>
                        <span class="menu-title">Event</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('peserta.index') }}" class="nav-link">
                        <i class="typcn typcn-group-outline menu-icon"></i>
                        <span class="menu-title">Peserta</span>
                    </a>
                </li>

            @endif


        {{-- STAFF ONLY --}}
        @if(auth()->user()->role === 'staff')

            <li class="nav-item">
                <a href="{{ route('staff.peserta.index') }}" class="nav-link">
                    <i class="typcn typcn-group-outline menu-icon"></i>
                    <span class="menu-title">Data Peserta</span>
                </a>
            </li>

        @endif

        {{-- LOGOUT --}}
        <li class="nav-item mt-3 px-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm w-100">
                    Logout
                </button>
            </form>
        </li>

    </ul>
</nav>
