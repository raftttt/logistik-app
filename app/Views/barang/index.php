<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <div class="eyebrow">Inventori</div>
        <h3 class="page-title mb-1">Data Barang</h3>
        <div class="text-muted">Pantau semua item dan stok dalam satu tampilan.</div>
    </div>
    <div class="d-flex gap-2">
        <a href="/dashboard" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> Dashboard</a>
        <a href="/barang/tambah" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Tambah Barang</a>
    </div>
</div>

<div class="section-card bg-white text-dark">
    <div class="table-responsive">
        <table class="table table-modern align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="fw-semibold"><?= $b['nama_barang'] ?></td>
                    <td><?= $b['nama_kategori'] ?></td>
                    <td><span class="badge bg-light text-dark px-3"><?= $b['stok'] ?> unit</span></td>
                    <td class="text-end">
                        <div class="btn-group" role="group">
                            <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm text-white" title="Edit"><i class="bi bi-pencil"></i></a>
                            <a href="/barang/hapus/<?= $b['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
