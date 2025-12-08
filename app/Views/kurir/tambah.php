<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Tambah Kurir</h3>

    <form action="/kurir/simpan" method="post">
        <div class="mb-3">
            <label>Nama Kurir</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kontak Kurir</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="/kurir" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection(); ?>
