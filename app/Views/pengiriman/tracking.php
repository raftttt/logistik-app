<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5 col-md-6 text-center">

<h3 class="fw-bold mb-3">📦 Lacak Pengiriman</h3>
<p class="text-muted">Masukkan nomor resi pengiriman</p>

<form action="/tracking/cari" method="post" class="d-flex">
    <input type="text" name="resi" class="form-control" placeholder="RESI-xxxxxx">
    <button class="btn btn-primary ms-2">Cari 🔍</button>
</form>

<?php if(isset($data)): ?>
<div class="mt-4 p-4 shadow rounded bg-light">
    <h5><?= $data['nama_barang']; ?></h5>
    <p>Kurir: <strong><?= $data['kurir']; ?></strong></p>
    <span class="badge bg-success"><?= strtoupper($data['status']); ?></span>
</div>
<?php endif ?>

</div>

<?= $this->endSection(); ?>
