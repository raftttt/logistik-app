<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold">Dashboard Admin</h2>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-center">
            <div class="card-body">
                <i class="bi bi-box-seam fs-1 text-primary"></i>
                <h5 class="mt-2">Barang</h5>
                <a href="/barang" class="btn btn-primary btn-sm mt-2">Kelola</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-center">
            <div class="card-body">
                <i class="bi bi-truck fs-1 text-success"></i>
                <h5 class="mt-2">Pengiriman</h5>
                <a href="/pengiriman" class="btn btn-success btn-sm mt-2">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-center">
            <div class="card-body">
                <i class="bi bi-person-badge fs-1 text-warning"></i>
                <h5 class="mt-2">Kurir</h5>
                <a href="/kurir" class="btn btn-warning btn-sm mt-2 text-white">Kelola</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
