<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CV Faza Mega Berlian</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fa fa-file"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data:</h6>
                <a class="collapse-item" href="<?= base_url(); ?>admin/pesanan ">Pesanan</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/produk ">Produk</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/warna ">Warna</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/varian ">Varian</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/kelola_user">User</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/marketplace">Marketplace</a>
            </div>
        </div>
    <li class="nav-item">
        <a class="nav-link collapsed" aria-expanded="true" href="<?= base_url(); ?>admin/report">
            <i class="fa fa-file"></i>
            <span>Report</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed" href="<?= base_url(); ?>admin/import_excel">
            <i class="fa fa-file"></i>
            <span>Import</span></a>
    </li>
    </li>