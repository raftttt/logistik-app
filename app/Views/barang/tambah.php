<div class="card p-4 shadow border-0">
    <h4 class="fw-bold mb-3">Tambah Barang</h4>

    <form method="post" enctype="multipart/form-data">
        
        <label>Nama Barang</label>
        <input name="nama_barang" class="form-control mb-2" required>

        <label>Kategori</label>
        <select name="id_kategori" class="form-control mb-2">
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
            <?php endforeach ?>
        </select>

        <label>Stok</label>
        <input type="number" name="stok" class="form-control mb-2">

        <label>Harga</label>
        <input type="number" name="harga" class="form-control mb-2">

        <label>Foto</label>
        <input type="file" name="foto" class="form-control mb-3">

        <button class="btn btn-success">Simpan ✔</button>
        <a href="/barang" class="btn btn-secondary">Kembali</a>

    </form>
</div>
