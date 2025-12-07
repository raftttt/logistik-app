<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3 class="mb-3">Data Kategori</h3>
    <a href="/logout" class="btn btn-danger mb-3 float-end">Logout</a>
    <a href="/kategori/tambah" class="btn btn-primary mb-3">+ Tambah Kategori</a>
    <a href="/dashboard" class="btn btn-secondary btn-sm mb-3">← Kembali ke Dashboard</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; foreach ($kategori as $k): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $k['nama_kategori'] ?></td>
                <td>
                    <a href="/kategori/edit/<?= $k['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/kategori/hapus/<?= $k['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>
