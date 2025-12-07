<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Barang Masuk</h3>

<a href="/barangmasuk/tambah" class="btn btn-primary mb-3">+ Tambah Barang Masuk</a>
<form class="d-flex mb-3" method="get" action="/barangmasuk">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari barang / supplier..." value="<?= $_GET['search'] ?? '' ?>">
    <button class="btn btn-outline-primary">Search</button>
</form>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah Masuk</th>
            <th>Supplier</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($masuk as $m): ?>
        <tr>
            <td><?= $m['tanggal']; ?></td>
            <td><?= $m['id_barang']; ?></td>
            <td><?= $m['jumlah_masuk']; ?></td>
            <td><?= $m['supplier']; ?></td>
            <td><?= $m['keterangan']; ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection(); ?>

