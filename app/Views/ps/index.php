<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container pt-3">
        <div class="card">
            <div class="card-header text-center">
                <h5>Daftar Pelanggan Rental PS</h5>
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('message'))) : ?>

                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('message'); ?>
                    </div>

                <?php endif ?>
                <a href="<?= base_url('/tambah') ?>" class="btn btn-success mb-3">tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($daftarPelanggan as $key => $pelanggan) : ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?php echo $pelanggan['nama'] ?></td>
                                <td><?php echo $pelanggan['alamat'] ?></td>
                                <td><?php echo $pelanggan['tgl'] ?></td>
                                <td>
                                    <a href="<?php echo base_url("pelanggan/" . $pelanggan['id'] . "/edit") ?>" class="btn btn-warning">edit</a>
                                    <a href="<?php echo base_url("pelanggan/" . $pelanggan['id'] . "/delete") ?>" class="btn btn-danger">hapus</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>