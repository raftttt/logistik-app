<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Informasi Barang</h3>

<p><strong>Nama:</strong> <?= $barang['nama_barang']; ?></p>
<p><strong>Kategori:</strong> <?= $barang['kategori']; ?></p>
<p><strong>Stok:</strong> <?= $barang['stok']; ?></p>

<a href="/barang" class="btn btn-secondary mt-3">Kembali ke List</a>

<?= $this->endSection(); ?>
