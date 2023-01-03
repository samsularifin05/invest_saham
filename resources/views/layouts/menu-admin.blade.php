<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-solid fa-database"></i>
        <p>
            Data Master
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview"
        style="display: <?= $thisPage === '/data-produk' || $thisPage === '/data-member'  || $thisPage === '/data-user' ? 'block;' : 'none;' ?>">
        <li class="nav-item">
            <a href="{{ route('data-user.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('data-member.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Member</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('data-produk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Produk</p>
            </a>
        </li>

    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cart-shopping"></i>
        <p>
            List Transaksi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-money-check"></i>
        <p>
            List Pembayaran
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('logout-admin') }}" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
            Keluar
        </p>
    </a>
</li>
