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
                                <div class="card border-secondary">
                                    <div class="card-header bg-secondary text-white">
                                        Biodata Pasien
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-secondary table-hover">
                                            <tr>
                                                <th>- Nama Pasien</th>
                                                <td>:</td>
                                                <td><?= $d['nama_pasien']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>- Jenis Kelamin</th>
                                                <td>:</td>
                                                <td><?= $d['jenis_kelamin']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>- Umur</th>
                                                <td>:</td>
                                                <td><?= $d['umur']; ?> Tahun</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-danger">
                                    <div class="card-header bg-danger text-white">
                                        Catatan Rekam Medis

                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url() ?>admin/kunjungan/insert_rm" method="post">
                                            <input type="hidden" name="id" value="<?= $d['id_berobat']; ?>">
                                            <div class="form-group">
                                                <label for="">Keluhan</label>
                                                <textarea name="keluhan" class="form-control" required><?= $d['keluhan_pasien']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Diagnosa</label>
                                                <textarea name="diagnosa" class="form-control" required><?= $d['hasil_diagnosa']; ?></textarea>
                                            </div>
                                            <div class="form_group">
                                                <label for="">Penatalaksanaan</label>
                                                <select name="penatalaksanaan" id="" class="form-control" required>
                                                    <option value="<?= $d['penatalaksanaan']; ?>" selected><?= $d['penatalaksanaan']; ?></option>
                                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                                    <option value="Rawat Inap">Rawat Inap</option>
                                                    <option value="Rujuk">Rujuk</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="card border-info">
                                    <div class="card-header bg-info text-white">
                                        Riwayat Berobat
                                        <a href="<?= base_url('admin/kunjungan'); ?>" class="btn btn btn-warning btn-sm float-right">Kembali</a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-secondary table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Keluhan</th>
                                                    <th>Diagnosa</th>
                                                    <th>Penatalaksanaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($riwayat as $row) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?></td>
                                                        <td class="text-center"><?= $row['tanggal']; ?></td>
                                                        <td><?= $row['keluhan_pasien']; ?></td>
                                                        <td><?= $row['hasil_diagnosa']; ?></td>
                                                        <td><?= $row['penatalaksanaan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-success mt-4">
                                    <div class="card-header bg-success text-white">
                                        Resep Obat
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('admin/kunjungan/insert_resep') ?>" method="POST">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="hidden" name="id" value="<?= $row['id_berobat']; ?>">
                                                    <div class="form-group">
                                                        <select name="obat" id="" class="form-control">
                                                            <?php foreach ($obat as $row) : ?>
                                                                <option value="<?= $row['id_obat'] ?>"><?= $row['nama_obat'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <button class="btn btn-success" type="submit">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Obat</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($resep as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['nama_obat']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url() . 'admin/kunjungan/hapus_resep/' . $row['id_resep'] . '/' . $row['id_berobat']; ?>" class="text-danger" onclick="return confirm('Yakin Mau di Hapus.?');">x</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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