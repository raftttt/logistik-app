<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="section-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <div class="eyebrow">Pengiriman</div>
                    <h3 class="page-title mb-1">Tambah Pengiriman 🚚</h3>
                    <div class="text-muted">Buat resi baru dan tetapkan kurir serta barang.</div>
                </div>
                <a href="/pengiriman" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mb-3">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success mb-3">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="/pengiriman/simpan" method="post" class="mt-3">
                <div class="mb-3">
                    <label class="fw-semibold">Pilih Barang</label>
                    <select name="id_barang" class="form-select mb-1">
                        <?php foreach ($barang as $b): ?>
                            <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="fw-semibold">Pilih Kurir</label>
                    <select name="id_kurir" class="form-select mb-1">
                        <?php foreach ($kurir as $k): ?>
                            <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <button class="btn btn-primary w-100">📦 Simpan Pengiriman</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
