<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 bg-gradient text-white" style="background: linear-gradient(135deg,#2563eb,#1d4ed8);">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="small text-uppercase opacity-75">Barang</div>
                    <h4 class="mb-2">Kelola Item</h4>
                    <a href="/barang" class="btn btn-light btn-sm text-primary fw-semibold">Buka</a>
                </div>
                <i class="bi bi-box-seam fs-1"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 text-white" style="background: linear-gradient(135deg,#10b981,#059669);">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="small text-uppercase opacity-75">Pengiriman</div>
                    <h4 class="mb-2">Pantau Status</h4>
                    <a href="/pengiriman" class="btn btn-light btn-sm text-success fw-semibold">Buka</a>
                </div>
                <i class="bi bi-truck fs-1"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 text-white" style="background: linear-gradient(135deg,#f97316,#ea580c);">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="small text-uppercase opacity-75">Kurir</div>
                    <h4 class="mb-2">Tim Lapangan</h4>
                    <a href="/kurir" class="btn btn-light btn-sm text-warning fw-semibold">Buka</a>
                </div>
                <i class="bi bi-person-badge fs-1"></i>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
