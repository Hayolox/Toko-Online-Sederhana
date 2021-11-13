 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (Request()->is('auth')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ (Request()->is('auth/Product*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('Product.index') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Tambah Product</span></a>
    </li>

    <li class="nav-item {{ (Request()->is('auth/Member*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('Member.index') }}">
            <i class="fas fa-user-friends"></i>
            <span>Tambah Member</span></a>
    </li>

    <li class="nav-item {{ (Request()->is('auth/Queue*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('queue') }}">
            <i class="fas fa-cart-plus"></i>
            <span>Antrian</span></a>
    </li>

    <li class="nav-item {{ (Request()->is('auth/Transaction-Sukses')) ? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('transaction-sukses') }}">
            <i class="fas fa-check-circle"></i>
            <span>Transaksi Sukses</span></a>
    </li>

    <li class="nav-item  {{ (Request()->is('auth/Transaction-Gagal')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaction-gagal') }}">
            <i class="fas fa-backspace"></i>
            <span>Transaksi Gagal</span></a>
    </li>



</ul>
<!-- End of Sidebar -->