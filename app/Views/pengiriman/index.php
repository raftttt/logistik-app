<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tracking Pengiriman</h3>

<a href="/pengiriman/tambah" class="btn btn-primary mb-3">+ Buat Pengiriman</a>
<a href="/dashboard" class="btn btn-secondary btn-sm mb-3">Kembali</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Barang</th>
            <th>Kurir</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pengiriman as $p): ?>
        <tr>
            <td><?= $p['nama_barang'] ?></td>
            <td><?= $p['nama_kurir'] ?></td>
            <td><?= $p['tanggal'] ?></td>
            <td><span class="badge bg-info"><?= $p['status'] ?></span></td>
            <td>
                <form action="/pengiriman/update/<?= $p['id'] ?>" method="post">
                    <select name="status" class="form-select form-select-sm">
                        <option value="PICKUP">Pickup</option>
                        <option value="ON_DELIVERY">On Delivery</option>
                        <option value="DELIVERED">Delivered</option>
                        <option value="RETURNED">Returned</option>
                    </select>
                    <button class="btn btn-sm btn-success mt-1">Update</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>
