<<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-3">Data Barang</h3>

    <a href="/barang/tambah" class="btn btn-primary mb-3">+ Tambah Barang</a>
    <a href="/dashboard" class="btn btn-secondary btn-sm mb-3">← Kembali ke Dashboard</a>


    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($barang as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['nama_barang'] ?></td>
                <td><?= $b['nama_kategori'] ?></td>
                <td><?= $b['stok'] ?></td>
                <td><?= $b['harga'] ?></td>
                <td>
                    <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/barang/hapus/<?= $b['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
