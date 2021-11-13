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



</ul>
<!-- End of Sidebar -->