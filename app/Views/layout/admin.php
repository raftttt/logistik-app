<!doctype html>
<html>
<head>
    <title><?= $title ?? "Sistem Logistik" ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-light">

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width:220px; min-height:100vh">
        <h5 class="mb-4">📦 Logistik Admin</h5>

        <a href="/dashboard" class="d-block text-white mb-2"><i class="bi bi-house"></i> Dashboard</a>
        <a href="/barang" class="d-block text-white mb-2"><i class="bi bi-box-seam"></i> Kelola Barang</a>
        <a href="/kategori" class="d-block text-white mb-2"><i class="bi bi-tag"></i> Kelola Kategori</a>
        <a href="/pengiriman" class="d-block text-white mb-2"><i class="bi bi-truck"></i> Pengiriman</a>
        <a href="/kurir" class="d-block text-white mb-2"><i class="bi bi-person-badge"></i> Kurir</a>
        <a href="/logout" class="d-block text-danger mt-3"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="p-4 flex-grow-1">
        <?= $this->renderSection('content') ?>
    </div>

</div>

</body>
</html>
