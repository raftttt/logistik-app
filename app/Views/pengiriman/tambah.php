<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Buat Pengiriman</h3>
<a href="/pengiriman" class="btn btn-secondary btn-sm mb-3">Kembali</a>

<form action="/pengiriman/simpan" method="post">
    <label>Barang</label>
    <select name="id_barang" class="form-select mb-2">
        <?php foreach($barang as $b): ?>
            <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Kurir</label>
    <select name="id_kurir" class="form-select mb-2">
        <?php foreach($kurir as $k): ?>
            <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection(); ?>
