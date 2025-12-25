<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- ADMIN --}}
        @if(auth()->user()->role === 'admin')
            <li class="nav-item {{ request()->routeIs('event.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('event.index') }}">
                    <i class="typcn typcn-calendar-outline menu-icon"></i>
                    <span class="menu-title">Event</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('peserta.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('peserta.index') }}">
                    <i class="typcn typcn-group-outline menu-icon"></i>
                    <span class="menu-title">Peserta</span>
                </a>
            </li>
        @endif

        {{-- STAFF --}}
        @if(auth()->user()->role === 'staff')
            <li class="nav-item {{ request()->routeIs('staff.peserta.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.peserta.index') }}">
                    <i class="typcn typcn-group-outline menu-icon"></i>
                    <span class="menu-title">Data Peserta</span>
                </a>
            </li>
        @endif

    </ul>
</nav>
