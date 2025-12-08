<!doctype html>
<html>
<head>
    <title>Dashboard Kurir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Halo Kurir, <?= session()->get('kurir')['nama'] ?></h3>
        <a href="/kurir/logout" class="btn btn-danger btn-sm">Logout</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white fw-bold">
            Daftar Paket Anda
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-bordered m-0">
                <thead class="table-dark">
                    <tr>
                        <th>Resi</th>
                        <th>Status</th>
                        <th>QR</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($pengiriman as $p): ?>
                    <tr>
                        <td><?= $p['resi'] ?></td>
                        <td>
                            <span class="badge 
                                <?= $p['status']=='diproses' ? 'bg-warning' :
                                    ($p['status']=='dikirim' ? 'bg-info' : 'bg-success') ?> ">
                                <?= $p['status'] ?>
                            </span>
                        </td>
                        <td><img src="/<?= $p['qr'] ?>" width="60"></td>
                        <td>
                            <a href="/kurir/update/<?= $p['id'] ?>" class="btn btn-sm btn-primary">Update</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>

