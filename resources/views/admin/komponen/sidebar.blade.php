

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/dashboard">
            <h2 class="text-white text-center">Admin Panel</h2>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/dashboard" class="dropdown-toggle no-arrow {{ $title == 'Dashboard' ? 'active' : '' }}">
                        <span class="micon bi bi-menu-button-wide"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pesanan.index') }}" class="dropdown-toggle no-arrow {{ $title == 'Pesanan' ? 'active' : '' }}">
                        <span class="micon bi bi-journal-check"></span
                        ><span class="mtext">Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}" class="dropdown-toggle no-arrow {{ $title == 'User' ? 'active' : '' }}">
                        <span class="micon bi bi-people"></span
                        ><span class="mtext">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('paket-wisata.index') }}" class="dropdown-toggle no-arrow {{ $title == 'Paket Wisata' ? 'active' : '' }}">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Paket wisata</span>
                    </a>
                </li>
                <li>
                    <a href="/logout" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-arrow-left-circle-fill"></span
                        ><span class="mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>