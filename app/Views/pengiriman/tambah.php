<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 col-md-5">

<h3 class="fw-bold">Tambah Pengiriman 🚚</h3>

<form action="/pengiriman/simpan" method="post" class="p-3 shadow rounded bg-white">

    <label>Pilih Barang</label>
    <select name="id_barang" class="form-select mb-3">
        <?php foreach ($barang as $b): ?>
            <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
        <?php endforeach ?>
    </select>

    <label>Pilih Kurir</label>
    <select name="id_kurir" class="form-select mb-3">
        <?php foreach ($kurir as $k): ?>
            <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
        <?php endforeach ?>
    </select>

    <button class="btn btn-success w-100">📦 Simpan Pengiriman</button>
</form>

</div>

<?= $this->endSection(); ?>

