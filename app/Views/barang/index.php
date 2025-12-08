<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="fw-bold mb-3">Data Barang</h3>

    <a href="/barang/tambah" class="btn btn-primary btn-sm mb-3">+ Tambah Barang</a>
    <a href="/dashboard" class="btn btn-secondary btn-sm mb-3">← Dashboard</a>
    <style>
    .table thead {
    background:#1e293b;
    color:white;
    }
    .table td {
    vertical-align: middle;
    }
    </style>


    <table class="table table-bordered table-striped shadow-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
            
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
                <td>
                     <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">
                         <i class="bi bi-pencil"></i>
                     </a>
                    <a href="/barang/hapus/<?= $b['id'] ?>" onclick="return confirm('Yakin hapus?')"  class="btn btn-danger btn-sm">
                          <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
