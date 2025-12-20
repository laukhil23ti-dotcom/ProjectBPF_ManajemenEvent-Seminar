<nav class="navbar fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <span class="navbar-brand">
                {{ auth()->user()->role === 'staff' ? 'STAFF PANEL' : 'ADMIN PANEL' }}
            </span>
        </div>
    </div>
</nav>
