<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/home" class="nav-link active">
                    <i class="fa fa-home nav-icon"></i>
                    <p>Dashboard</p>
                </a>
                @if(Auth::user()->level=='admin')
                    <a href="/user" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>User</p>
                    </a>
                    <a href="/pelanggan" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Pelanggan</p>
                    </a>
                    <a href="/paket" class="nav-link">
                        <i class="fa fa-dollar-sign nav-icon"></i>
                        <p>Harga paket</p>
                    </a>
                    <a href="/transaksi" class="nav-link">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>Pesanan</p>
                    </a>
                    <a href="/checkout" class="nav-link">
                        <i class="fa fa-exchange-alt nav-icon"></i>
                        <p>Checkout</p>
                    </a>
                    <a href="/report" class="nav-link">
                        <i class="fa fa-file nav-icon"></i>
                        <p>Report</p>
                    </a>

                @else
                    <a href="/pelanggan" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Pelanggan</p>
                    </a>
                    <a href="/paket" class="nav-link">
                        <i class="fa fa-dollar-sign nav-icon"></i>
                        <p>Harga paket</p>
                    </a>
                    <a href="/transaksi" class="nav-link">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>Pesanan</p>
                    </a>    
                @endif
            </li>
        </ul>
    </li>
</ul>