<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" data-toggle="modal" data-target="#titleModal">
        <img src="<?= base_url('assets/images') ?>/logo1.png" alt="Logo" class="brand-image">
        <span class="brand-text font-weight-light">Klinik Bilal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <img src="<?= base_url('assets/template/backend/dist') ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="info">
                <a href="#" class="d-block" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><?= strtoupper($this->session->userdata['nama_lengkap']); ?></a>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <a href="<?= base_url('password') ?>" class="text-dark"><i class="nav-icon fas fa-solid fa-key"></i> Ganti Password</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p class="text-primary"><b>
                                Dashboard
                            </b></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dokter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pasien') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/obat') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Obat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kunjungan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kunjungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/laporan/data_dokter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/laporan/data_pasien') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/laporan/data_kunjungan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kunjungan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



<div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Yakin Mau Keluar?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Pilih "Logout" Jika anda yakin mau keluar.</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- <button type="button" class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</button> -->
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="titleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Profil Klinik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Jln. Khairil Anwar No B.1</h6>
                <h6>Badean Bondowoso</h6>
                <h6>HP : 08123456789</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->