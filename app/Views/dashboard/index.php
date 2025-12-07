<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Dashboard Gudang Logistik</h3>
<p class="text-muted">Selamat datang, <strong><?= session()->get('username'); ?></strong> 👋</p>

<div class="row">

    <div class="col-md-3">
        <div class="card bg-primary text-white shadow mb-3">
            <div class="card-body">
                <h5>Total Barang</h5>
                <h2><?= $jumlah_barang; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark text-white shadow mb-3">
            <div class="card-body">
                <h5>Total Kategori</h5>
                <h2><?= $jumlah_kategori; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white shadow mb-3">
            <div class="card-body">
                <h6>Stok Terbanyak</h6>
                <?php if ($stok_terbanyak): ?>
                    <strong><?= $stok_terbanyak['nama_barang']; ?></strong>
                    <p><?= $stok_terbanyak['stok']; ?> unit</p>
                <?php else: ?>
                    <p>-</p>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-danger text-white shadow mb-3">
            <div class="card-body">
                <h6>Stok Terkecil</h6>
                <?php if ($stok_termiskin): ?>
                    <strong><?= $stok_termiskin['nama_barang']; ?></strong>
                    <p><?= $stok_termiskin['stok']; ?> unit</p>
                <?php else: ?>
                    <p>-</p>
                <?php endif ?>
            </div>
        </div>
    </div>

</div>

<a class="btn btn-outline-primary mt-3" href="/barang">Kelola Barang</a>
<a class="btn btn-outline-dark mt-3" href="/kategori">Kelola Kategori</a>

<?= $this->endSection(); ?>
