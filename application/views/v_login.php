<?php $this->load->view('admin/template/meta') ?>
<div class="wrapper">

    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url('assets/template/admin/dist') ?>/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <br>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="login-box">
                    <div class="login-logo">
                        <a href=""><b>KLINIK</b> Bilal</a>
                    </div>
                    <div class="card">
                        <div class="card-body login-card-body shadow-lg rounded-lg">
                            <h3 class="login-box-msg text-primary"><b>Silakan Login</b></h3>
                            <?= $this->session->flashdata('info'); ?>
                            <?= $this->session->unset_userdata('info'); ?>
                            <form method="POST" action="<?= base_url('auth/login_aksi'); ?>">
                                <div class="input-group mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('nama', '<div class="text-danger mb-2">', '</div>'); ?>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('password', '<div class="text-danger mb-2">', '</div>'); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </div>
                                <p class="mt-5 mb-3 text-muted small text-center">Made With &hearts; DIE Art'S 2022</p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<!-- JS -->
<?php $this->load->view('admin/template/js') ?>

</body>

</html>