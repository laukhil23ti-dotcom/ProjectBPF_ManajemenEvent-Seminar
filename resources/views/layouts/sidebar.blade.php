<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        {{-- DASHBOARD --}}
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- ADMIN MENU --}}
        @if(auth()->user()->role === 'admin')

            <li class="nav-item">
                <a href="{{ route('event.index') }}"
                   class="nav-link {{ request()->routeIs('event.*') ? 'active' : '' }}">
                    <i class="typcn typcn-calendar-outline menu-icon"></i>
                    <span class="menu-title">Event</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('peserta.index') }}"
                   class="nav-link {{ request()->routeIs('peserta.*') ? 'active' : '' }}">
                    <i class="typcn typcn-group-outline menu-icon"></i>
                    <span class="menu-title">Data Peserta</span>
                </a>
            </li>

        @endif

        {{-- STAFF MENU --}}
        @if(auth()->user()->role === 'staff')

            <li class="nav-item">
                <a href="{{ route('staff.peserta.index') }}"
                   class="nav-link {{ request()->routeIs('staff.peserta.*') ? 'active' : '' }}">
                    <i class="typcn typcn-group-outline menu-icon"></i>
                    <span class="menu-title">Data Peserta</span>
                </a>
            </li>

        @endif

        {{-- LOGOUT --}}
        <li class="nav-item mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="nav-link btn btn-link text-start w-100 text-danger">
                    <i class="typcn typcn-power-outline menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</nav>
