<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <div class="eyebrow">Pengiriman</div>
        <h3 class="page-title mb-1">Kelola Pengiriman 🚚</h3>
        <div class="text-muted">Monitor status resi, kurir, dan barang terkirim.</div>
    </div>
    <div class="d-flex gap-2">
        <a href="/pengiriman/tambah" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Buat Pengiriman</a>
    </div>
</div>

<div class="section-card p-0">
    <div class="table-responsive">
        <table class="table table-modern align-middle mb-0">
            <thead>
                <tr>
                    <th>Resi</th>
                    <th>Barang</th>
                    <th>Kurir</th>
                    <th>Status</th>
                    <th>QR Code</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($pengiriman as $p): ?>
                <tr>
                    <td class="fw-semibold text-primary">#<?= $p['resi'] ?></td>
                    <td><?= $p['nama_barang'] ?></td>
                    <td><?= $p['nama_kurir'] ?></td>
                    <td>
                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill"><?= $p['status'] ?></span>
                    </td>
                    <td>
                        <?php if($p['qr']): ?>
                            <img src="/uploads/qrcodes/<?= $p['qr'] ?>" width="50" class="rounded shadow-sm">
                        <?php endif ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group" role="group">
                            <a href="/pengiriman/detail/<?= $p['id'] ?>" class="btn btn-outline-secondary btn-sm">Detail</a>
                            <a href="/pengiriman/updateStatus/<?= $p['id'] ?>" class="btn btn-success btn-sm">
                                Update Status
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
