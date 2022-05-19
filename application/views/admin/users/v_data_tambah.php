<?php $this->load->view('admin/template/meta') ?>
<div class="wrapper">

    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php $this->load->view('admin/template/navbar') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('admin/template/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->

                    <div class="card-body">
                        <section class="konten mt-2">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border-primary">
                                            <div class="card-header bg-primary text-white">
                                                <?= $title; ?>
                                                <a href="<?= base_url('admin/user') ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?= base_url('admin/user/insert'); ?>" method="post">
                                                    <div class="form-group">
                                                        <label for="">Username</label>
                                                        <input type="text" name="nama" class="form-control">
                                                        <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap</label>
                                                        <input type="text" name="nama_lengkap" class="form-control">
                                                        <?= form_error('nama_lengkap', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                        <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/template/footer') ?>

</div>

<!-- JS -->
<?php $this->load->view('admin/template/js') ?>

</body>

</html>