<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3 class="mb-3">Tambah Barang</h3>

<form action="/barang/simpan" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control">
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="/barang" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>
