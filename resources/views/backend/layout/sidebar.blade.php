<!-- Sidebar -->
<ul class="navbar-nav sidebar text-white accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-secondary" href="{{route('admin')}}">
        <div class="sidebar-brand-icon">
            <i class="bi bi-shop fs-1"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Yans Mart Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link " href="{{route('admin')}}">
            <i class="bi bi-grid-fill fs-4"></i>
            <span class="ms-2">Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{route('adminCustomers')}}">
            <i class="bi bi-person-circle fs-4"></i>
            <span class="ms-2">Daftar Customers</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link " href="{{route('adminProducts')}}">
            <i class="bi bi-tags-fill fs-4"></i>
            <span class="ms-2">Daftar Products</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{route('adminOrders')}}">
            <i class="bi bi-clipboard-check-fill fs-4"></i>
            <span class="ms-2">Orders</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
