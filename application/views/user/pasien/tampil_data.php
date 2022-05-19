<?php $this->load->view('user/template/meta') ?>
<div class="wrapper">

    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php $this->load->view('user/template/navbar') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('user/template/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- <div class="row mb-2">
                    <div class="col-sm">
                        <a href="<?= base_url('user/pasien/tambah') ?>" class="btn btn-success btn-sm float-left"><i class="fas fa-plus"></i> Tambah data</a>
                    </div>
                </div> -->
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th><i class="fas fa-procedures"></i> Nama Pasien</th>
                                    <th><i class="fas fa-venus-mars"></i> J. Kelamin</th>
                                    <th>Umur</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pasien as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row['nama_pasien']; ?></td>
                                        <td class="text-center"><?= $row['jenis_kelamin']; ?></td>
                                        <td class="text-center"><?= $row['umur']; ?></td>
                                        <!-- <td class="text-center">
                                            <a href="<?= base_url() . 'user/pasien/edit/' . $row['id_pasien']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url() . 'user/pasien/hapus/' . $row['id_pasien']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di Hapus.?');"><i class="fas fa-trash"></i> Hapus</a>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('user/template/footer') ?>

</div>

<!-- JS -->
<?php $this->load->view('user/template/js') ?>

</body>

</html>