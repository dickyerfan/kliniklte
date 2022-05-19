<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.min.css">
    <style>
        .table-bordered th,
        .table-bordered thead th,
        .table-bordered td {
            border: 1px solid #000;
        }

        @media print {

            #cetak,
            #kembali {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-primary btn-sm" id="kembali">Kembali</a>
        <a href="" class="btn btn-success btn-sm" id="cetak">Cetak</a>
        <h3>KLINIK CODEIGNITER 3</h3>
        <small>Jl. Khairil Anwar Perum. Graha Badean Estate B.1</small><br>
        <small>BONDOWOSO</small>
        <h4 class="text-center mt-4"><?= strtoupper($title); ?></h4>
        <table class="table table-bordered table hover table-sm">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tgl. kunjungan</th>
                <th class="text-center">Nama Pasien</th>
                <th class="text-center">J. Kelamin</th>
                <th class="text-center">Umur</th>
                <th class="text-center">Keluhan</th>
                <th class="text-center">Diagnosa</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($kunjungan as $row) : ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $row['tanggal']; ?></td>
                    <td><?= $row['nama_pasien']; ?></td>
                    <td class="text-center"><?= $row['jenis_kelamin']; ?></td>
                    <td class="text-center"><?= $row['umur']; ?></td>
                    <td><?= $row['keluhan_pasien']; ?></td>
                    <td><?= $row['hasil_diagnosa']; ?></td>
                    <td><?= $row['penatalaksanaan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td></td>
                <td width="300px">
                    <p class="text-center"> Bondowoso, <?= date('d-m-Y'); ?>
                    <p class="text-center">Administrator</p>
                    <br><br><br><br>
                    <p class="text-center">__________________</p>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>
<script>
    const cetak = document.getElementById('cetak');
    cetak.addEventListener('click', function() {
        window.print();
    });
</script>

</html>