<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="fw-bold mb-3">Dashboard Gudang 🚛</h2>
<p>Selamat datang kembali, <b><?= session('username') ?></b> 👋</p>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card shadow border-0 bg-primary text-white p-3">
            <h6>Total Barang</h6>
            <h3><?= $jumlah_barang ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 bg-dark text-white p-3">
            <h6>Total Kategori</h6>
            <h3><?= $jumlah_kategori ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 bg-success text-white p-3">
            <h6>Stok Terbanyak</h6>
            <h5><?= $stok_terbanyak['nama_barang'] ?></h5>
            <small><?= $stok_terbanyak['stok'] ?> unit</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 bg-danger text-white p-3">
            <h6>Stok Terkecil</h6>
            <h5><?= $stok_terminim['nama_barang'] ?></h5>
            <small><?= $stok_terminim['stok'] ?> unit</small>
        </div>
    </div>
</div>

<hr>

<div>
    <a href="/barang" class="btn btn-primary">Kelola Barang</a>
    <a href="/kategori" class="btn btn-secondary">Kelola Kategori</a>
    <a href="/pengiriman" class="btn btn-success">Kelola Pengiriman</a>
</div>

<?= $this->endSection() ?>
