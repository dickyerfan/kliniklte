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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm">
                        <a href="<?= base_url('admin/kunjungan/tambah') ?>" class="btn btn-success btn-sm float-left"><i class="fas fa-plus"></i> Tambah data</a>
                    </div>
                </div>
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
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>Dokter</th>
                                    <th>Rekam Medis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kunjungan as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $row['tanggal']; ?></td>
                                        <td><?= $row['nama_pasien']; ?></td>
                                        <td class="text-center"><?= $row['umur']; ?></td>
                                        <td><?= $row['nama_dokter']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url() ?>admin/kunjungan/rekam/<?= $row['id_berobat'] ?>" class="btn btn-success btn-sm">Rekam</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url() . 'admin/kunjungan/edit/' . $row['id_berobat']; ?>" class="btn btn-warning btn-sm">edit</a>
                                            <a href="<?= base_url() . 'admin/kunjungan/hapus/' . $row['id_berobat']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di Hapus.?');">hapus</a>
                                        </td>
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
    <?php $this->load->view('admin/template/footer') ?>

</div>

<!-- JS -->
<?php $this->load->view('admin/template/js') ?>

</body>

</html>