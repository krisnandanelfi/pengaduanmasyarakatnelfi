<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">UKK PENGADUAN NELFI<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>
<?php

    ?>
    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-light fa-user-comment"></i>
            <span>Petugas</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/masyarakat">
            <i class="fas fa-fw fa-light fa-user-comment"></i>
            <span>Masyarakat</span>
        </a>
</li>

    <li class="nav-item">
        <a class="nav-link" href="/pengaduan">
            <i class="fas fa-fw fa-light fa-user-comment"></i>
            <span>Pengaduan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/tanggapan">
            <i class="fas fa-fw fa-light fa-user-comment"></i>
            <span>Tanggapan</span>
        </a>
</li>

<?php
if(session('nik')!=null){
    ?>
    <li class="nav-item">
    <a href="/pengaduan" class="nav-link">
        <i class="fas fa-fw fa-regular fa-comment"></i>
    <span>Pengaduan</span></a>
    </li>

<?php
}
?>
<?php if(!Empty(session()->get('logged_in'))) : ?>
    <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa_sign-out-alt"></i>
            <span>Log Out</span>
        </a>
    </li>
    <?php endif?>

<!-- Nav Item - Pages Collapse Menu -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
