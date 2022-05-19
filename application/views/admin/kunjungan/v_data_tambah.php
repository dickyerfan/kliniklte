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
                <section class="konten mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white">
                                        <?= $title; ?>
                                        <a href="<?= base_url('admin/kunjungan') ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('admin/kunjungan/insert'); ?>" method="post">
                                            <div class="form-group">
                                                <label for="">Tanggal Berobat</label>
                                                <input type="date" name="tanggal" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pasien</label>
                                                <select name="pasien" id="" class="form-control" required>
                                                    <option value="">Pilih Pasien</option>
                                                    <?php foreach ($pasien as $row) : ?>
                                                        <option value="<?= $row['id_pasien']; ?>"><?= $row['nama_pasien']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Dokter</label>
                                                <select name="dokter" id="" class="form-control" required>
                                                    <option value="">Pilih Dokter</option>
                                                    <?php foreach ($dokter as $row) : ?>
                                                        <option value="<?= $row['id_dokter']; ?>"><?= $row['nama_dokter']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
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