<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Detail Barang</h3>

<p><strong>Nama:</strong> <?= $barang['nama_barang']; ?></p>
<p><strong>Stok:</strong> <?= $barang['stok']; ?></p>
<p><strong>Kategori:</strong> <?= $barang['kategori']; ?></p>

<hr>

<h4>QR Code</h4>

<?php if(function_exists('generateQR_local')): ?>
    <img src="<?= generateQR_local(base_url('barang/detail/'.$barang['id'])); ?>" width="200">
<?php else: ?>
    <small class="text-danger">QR helper belum loading!</small>
<?php endif; ?>

<br><br>
<a href="/barang" class="btn btn-secondary">Kembali</a>

<?= $this->endSection(); ?>

