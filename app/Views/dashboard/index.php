<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <div class="eyebrow">Overview</div>
        <h2 class="page-title">Dashboard Gudang 🚛</h2>
        <div class="text-muted">Selamat datang kembali, <b><?= session('username') ?></b> 👋</div>
    </div>
    <div class="d-flex gap-2">
        <a href="/barang" class="btn btn-outline-secondary"><i class="bi bi-box-seam me-1"></i> Kelola Barang</a>
        <a href="/kategori" class="btn btn-outline-secondary"><i class="bi bi-tag me-1"></i> Kelola Kategori</a>
        <a href="/pengiriman" class="btn btn-primary"><i class="bi bi-truck me-1"></i> Kelola Pengiriman</a>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-3">
        <div class="section-card bg-primary text-white border-0 h-100">
            <div class="small text-uppercase opacity-75">Total Barang</div>
            <div class="fs-2 fw-bold mt-1"><?= $jumlah_barang ?></div>
            <div class="d-flex align-items-center gap-1 mt-2"><i class="bi bi-collection"></i><small>Data terkini</small></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="section-card bg-dark text-white border-0 h-100">
            <div class="small text-uppercase opacity-75">Total Kategori</div>
            <div class="fs-2 fw-bold mt-1"><?= $jumlah_kategori ?></div>
            <div class="d-flex align-items-center gap-1 mt-2"><i class="bi bi-diagram-3"></i><small>Pengelompokan barang</small></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="section-card bg-success text-white border-0 h-100">
            <div class="small text-uppercase opacity-75">Stok Terbanyak</div>
            <div class="fw-semibold fs-5 mt-1"><?= $stok_terbanyak['nama_barang'] ?></div>
            <small><?= $stok_terbanyak['stok'] ?> unit tersedia</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="section-card bg-danger text-white border-0 h-100">
            <div class="small text-uppercase opacity-75">Stok Terkecil</div>
            <div class="fw-semibold fs-5 mt-1"><?= $stok_terminim['nama_barang'] ?></div>
            <small><?= $stok_terminim['stok'] ?> unit tersisa</small>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
