<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h3 class="mb-3">Data Barang</h3>

    <a href="/barang/tambah" class="btn btn-primary mb-3">+ Tambah Barang</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Foto</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($barang as $b): ?>
            <tr>
                <td>
                    <img src="<?= base_url('uploads/' . $b['foto']) ?>" width="70">
                </td>
                <td><?= $b['nama_barang'] ?></td>
                <td><?= $b['nama_kategori'] ?></td>
                <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
                <td><?= $b['stok'] ?></td>
                <td>
                    <a href="/barang/edit/<?= $b['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/barang/hapus/<?= $b['id']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</body>
</html>
