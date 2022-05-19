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
                    <section class="konten mt-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <?= $title; ?>
                                            <a href="<?= base_url('admin/dokter') ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?= base_url('admin/dokter/update'); ?>" method="post">
                                                <input type="hidden" name="id_dokter" value="<?= $user['id_dokter']; ?>">
                                                <div class="form-group">
                                                    <label for="">Nama Dokter</label>
                                                    <input type="text" name="nama_dokter" value="<?= $user['nama_dokter']; ?>" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
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