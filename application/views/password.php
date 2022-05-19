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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <!-- <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $title; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title2; ?></li>
                        </ol>
                    </div>
                </div>
            </div> -->
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $this->session->flashdata('message'); ?>
                        <!-- <?= $this->session->unset_userdata('message'); ?> -->
                        <form action="<?= base_url('password'); ?>" method="post">
                            <div class="form-group">
                                <label for="current_password">Password Saat ini *</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">Password Baru *</label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Password Konfirmasi *</label>
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
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