<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-buysellads"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FORMINA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fas fa-chart-bar"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('admin/produk') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('product.index') }}">
            <i class="fas fa-tshirt"></i>
            <span>Produk</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('admin/transaksi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaksi.index') }}">
            <i class="fas fa-shopping-cart"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('admin/user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-user-friends"></i>
            <span>User</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
        this.closest('form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </form>
    </li>



</ul>
