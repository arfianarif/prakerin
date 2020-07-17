<li class="nav-item active">
    <a class="nav-link" href="<?= base_url() . 'Admin/Dashboard' ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Setting
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data</h6>
            <a class="collapse-item" href="<?= base_url() . 'Admin/Master_Data/Siswa' ?>">Siswa</a>
            <a class="collapse-item" href="<?= base_url() . 'Admin/Master_Data/Guru' ?>">Guru</a>
            <a class="collapse-item" href="<?= base_url() . 'Admin/Master_Data/Tata_Usaha' ?>">Tata Usaha</a>
        </div>
    </div>
</li>