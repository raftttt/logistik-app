<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            Update Status Pengiriman
        </div>
        <div class="card-body">
            <form method="post" action="/kurir/update/save/<?= $pengiriman['id'] ?>">
                <label class="fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="diproses">Diproses</option>
                    <option value="dikirim">Dikirim</option>
                    <option value="diterima">Diterima</option>
                </select>
                <button class="btn btn-success mt-3">Simpan</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>
