<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>


<div class="container mt-4">
    <h3 class="mb-3">Tambah Kategori</h3>

    <form action="/kategori/simpan" method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/kategori" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>
