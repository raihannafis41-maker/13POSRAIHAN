<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}"
                     class="img-circle elevation-2"
                     alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->name ?? 'Owner' }}
                </a>
                <small class="text-muted">
                    Role: {{ Auth::user()->role ?? '-' }}
                </small>
            </div>
        </div>

        <!-- Sidebar Search -->
        <div class="form-inline mb-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar"
                       type="search"
                       placeholder="Cari menu..."
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a href="{{ url('/dashboardowner') }}"
                       class="nav-link {{ request()->is('dashboardowner') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- LOGIN HISTORY -->
                <li class="nav-item">
                    <a href="{{ url('/loginhistory') }}"
                       class="nav-link {{ request()->is('loginhistory') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Login History</p>
                    </a>
                </li>

                <!-- MASTER DATA -->
                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ url('/master/user') }}"
                       class="nav-link {{ request()->is('master/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/kategori') }}"
                       class="nav-link {{ request()->is('master/kategori*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/produk') }}"
                       class="nav-link {{ request()->is('master/produk*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Produk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/meja') }}"
                       class="nav-link {{ request()->is('master/meja*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chair"></i>
                        <p>Meja</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/supplier') }}"
                       class="nav-link {{ request()->is('master/supplier*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/metodepembayaran') }}"
                       class="nav-link {{ request()->is('master/metodepembayaran*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>Metode Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/promo') }}"
                       class="nav-link {{ request()->is('master/promo*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Promo</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/master/pajak') }}"
                       class="nav-link {{ request()->is('master/pajak*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>Pajak</p>
                    </a>
                </li>

                <!-- INVENTORY -->
                <li class="nav-header">INVENTORY</li>

                <li class="nav-item">
                    <a href="{{ url('/inventory/bahanbaku') }}"
                       class="nav-link {{ request()->is('inventory/bahanbaku*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-seedling"></i>
                        <p>Bahan Baku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/inventory/stok') }}"
                       class="nav-link {{ request()->is('inventory/stok*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Stok</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/inventory/stokmasuk') }}"
                       class="nav-link {{ request()->is('inventory/stokmasuk*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-arrow-down"></i>
                        <p>Stok Masuk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/inventory/stokkeluar') }}"
                       class="nav-link {{ request()->is('inventory/stokkeluar*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-arrow-up"></i>
                        <p>Stok Keluar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/inventory/pembelian') }}"
                       class="nav-link {{ request()->is('inventory/pembelian*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pembelian</p>
                    </a>
                </li>

                <!-- TRANSAKSI -->
                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="{{ url('/kasir/pos') }}"
                       class="nav-link {{ request()->is('kasir/pos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>POS Kasir</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kasir/shift') }}"
                       class="nav-link {{ request()->is('kasir/shift*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-clock"></i>
                        <p>Shift Kasir</p>
                    </a>
                </li>

                <!-- LAPORAN -->
                <li class="nav-header">LAPORAN</li>

                <li class="nav-item">
                    <a href="{{ url('/laporan') }}"
                       class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>