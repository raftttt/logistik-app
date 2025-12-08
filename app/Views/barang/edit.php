<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="card shadow p-4 border-0">
    <h4 class="fw-bold mb-3">✏ Edit Barang</h4>

    <form action="/barang/update/<?= $barang['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="fw-semibold">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" 
                value="<?= $barang['nama_barang']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Kategori</label>
            <select name="id_kategori" class="form-select">
                <?php foreach($kategori as $k): ?>
                    <option value="<?= $k['id'] ?>"
                        <?= ($k['id'] == $barang['id_kategori']) ? 'selected' : '' ?>>
                        <?= $k['nama_kategori'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control"
                value="<?= $barang['harga']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Stok</label>
            <input type="number" name="stok" class="form-control"
                value="<?= $barang['stok']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="fw-semibold d-block">Foto Saat Ini</label>
            
            <?php if($barang['foto']): ?>
                <img src="<?= base_url('uploads/'.$barang['foto']); ?>" 
                     width="120" class="rounded border mb-3">
            <?php else: ?>
                <span class="text-muted">Belum ada foto</span>
            <?php endif ?>

            <input type="file" name="foto" class="form-control">
            <small class="text-muted">Kosongkan jika tidak mengganti gambar.</small>
        </div>

        <div class="mt-4">
            <button class="btn btn-warning px-4">✔ Update Barang</button>
            <a href="/barang" class="btn btn-secondary">← Kembali</a>
        </div>

    </form>
</div>

<?= $this->endSection(); ?>
