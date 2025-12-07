<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Barang Keluar / Pengiriman Kurir</h3>

<a href="/barangkeluar/tambah" class="btn btn-primary mb-3">+ Tambah Pengiriman</a>
<form class="d-flex mb-3" method="get" action="/barangkeluar">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari barang / kurir / penerima..." value="<?= $_GET['search'] ?? '' ?>">
    <button class="btn btn-outline-primary">Search</button>
</form>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Kurir</th>
            <th>Penerima</th>
            <th>Status</th>      <!-- ini kolom status -->
            <th>Tracking</th>    <!-- ini kolom tombol -->
        </tr>
    </thead>

    <tbody>
        <?php foreach ($keluar as $k): ?>
        <tr>
            <td><?= $k['tanggal']; ?></td>
            <td><?= $k['nama_barang']; ?></td>
            <td><?= $k['jumlah_keluar']; ?></td>
            <td><?= $k['kurir']; ?></td>
            <td><?= $k['penerima']; ?></td>

            <!-- STATUS BADGE -->
            <td>
                <?php if ($k['status'] == 'diproses'): ?>
                    <span class="badge bg-secondary">Diproses</span>
                <?php elseif ($k['status'] == 'dikirim'): ?>
                    <span class="badge bg-warning text-dark">Dikirim</span>
                <?php else: ?>
                    <span class="badge bg-success">Diterima</span>
                <?php endif; ?>
            </td>

            <!-- TOMBOL TRACKING -->
            <td>
                <?php if ($k['status'] == 'diproses'): ?>
                    <a href="/barangkeluar/status/<?= $k['id']; ?>/dikirim" 
                       class="btn btn-sm btn-warning">Set Dikirim</a>

                <?php elseif ($k['status'] == 'dikirim'): ?>
                    <a href="/barangkeluar/status/<?= $k['id']; ?>/diterima" 
                       class="btn btn-sm btn-success">Set Diterima</a>

                <?php else: ?>
                    <small class="text-muted">Selesai</small>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?= $this->endSection(); ?>
