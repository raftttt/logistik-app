<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>


<div class="container mt-4">
    <h3 class="mb-3">Edit Kategori</h3>

    <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori['nama_kategori'] ?>" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/kategori" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>
