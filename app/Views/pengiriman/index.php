<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-4">Kelola Pengiriman 🚚</h3>

<div class="card p-4 shadow border-0">
    <a href="/pengiriman/tambah" class="btn btn-primary mb-3">+ Buat Pengiriman</a>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Resi</th>
                <th>Barang</th>
                <th>Kurir</th>
                <th>Status</th>
                <th>QR Code</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($pengiriman as $p): ?>
            <tr>
                <td><?= $p['resi'] ?></td>
                <td><?= $p['nama_barang'] ?></td>
                <td><?= $p['nama_kurir'] ?></td>
                <td>
                    <span class="badge bg-info"><?= $p['status'] ?></span>
                </td>
                <td>
                    <?php if($p['qr']): ?>
                        <img src="/uploads/qrcodes/<?= $p['qr'] ?>" width="50">
                    <?php endif ?>
                </td>
                <td>
                    <a href="/pengiriman/detail/<?= $p['id'] ?>" class="btn btn-sm btn-dark">Detail</a>
                    <a href="/pengiriman/updateStatus/<?= $p['id'] ?>" class="btn btn-sm btn-success">
                        Update Status
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
