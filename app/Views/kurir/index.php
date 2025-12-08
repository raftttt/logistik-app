<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Kelola Kurir</h3>

    <a href="/kurir/tambah" class="btn btn-primary mb-3">Tambah Kurir</a>
    <a href="/dashboard" class="btn btn-secondary mb-3 float-end">← Dashboard</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($kurir as $k): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $k['nama']; ?></td>
                <td><?= $k['kontak']; ?></td>
                <td><?= $k['status']; ?></td>
                <td>
                    <a href="/kurir/hapus/<?= $k['id']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus kurir ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
