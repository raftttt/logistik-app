<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Barang Masuk</h3>

<form action="/barangmasuk/simpan" method="post">

    <div class="mb-3">
        <label>Nama Barang</label>
        <select name="id_barang" class="form-select" required>
            <option value="">-- pilih barang --</option>
            <?php foreach ($barang as $b): ?>
                <option value="<?= $b['id']; ?>"><?= $b['nama_barang']; ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Jumlah Masuk</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Supplier</label>
        <input type="text" name="supplier" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/barangmasuk" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>
