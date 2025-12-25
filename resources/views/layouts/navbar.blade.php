<nav class="navbar fixed-top d-flex flex-row w-100" style="background-color: #6a1b9a;">
    <div class="d-flex justify-content-between align-items-center w-100 px-3">
        {{-- Brand --}}
        <span class="navbar-brand text-white fw-bold">
            {{ auth()->user()->role === 'staff' ? 'STAFF PANEL' : 'ADMIN PANEL' }}
        </span>

        {{-- Dropdown profile --}}
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ auth()->user()->profile_picture ? asset('uploads/' . auth()->user()->profile_picture) : asset('assets-admin/images/default-user.png') }}" 
                     class="profile-img me-2">
                <span>{{ auth()->user()->name }}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
