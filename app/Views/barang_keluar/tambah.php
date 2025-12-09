<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Pengiriman</h3>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<form action="/barangkeluar/simpan" method="post">

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
        <label>Jumlah Keluar</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Penerima</label>
        <input type="text" name="penerima" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kurir</label>
        <input type="text" name="kurir" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/barangkeluar" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>
