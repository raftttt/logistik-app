<!doctype html>
<html>
<head>
    <title><?= $title ?? "Sistem Logistik" ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        :root {
            --ink-900: #0f172a;
            --ink-800: #111827;
            --ink-700: #1f2937;
            --primary: #2563eb;
            --sky: #38bdf8;
            --border: #1e293b;
            --muted: #94a3b8;
        }

        body {
            margin: 0;
            background: radial-gradient(circle at 20% 30%, rgba(56,189,248,0.15), transparent 26%),
                        radial-gradient(circle at 90% 10%, rgba(59,130,246,0.15), transparent 22%),
                        linear-gradient(135deg, #0b1220, #0f172a 55%, #0b1220);
            font-family: 'Poppins', sans-serif;
            color: #e2e8f0;
        }

        .app-shell { display: flex; min-height: 100vh; }

        .sidebar {
            width: 230px;
            background: rgba(17, 24, 39, 0.92);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.05);
            padding: 22px 18px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 24px;
        }

        .sidebar .logo-circle {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 10px 12px;
            margin-bottom: 6px;
            border-radius: 12px;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(37, 99, 235, 0.16);
            color: white;
            border: 1px solid rgba(37, 99, 235, 0.35);
        }

        .content-area {
            flex: 1;
            padding: 24px;
        }

        .content-card {
            background: #0b1624;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 14px 50px rgba(0,0,0,0.3);
            padding: 24px;
        }

        .page-title { color: white; font-weight: 700; }
        .eyebrow { color: var(--muted); letter-spacing: 2px; text-transform: uppercase; font-size: 12px; }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border: none;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        }

        .section-card {
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 18px 60px rgba(0, 0, 0, 0.35);
            padding: 24px;
            background: #0e1625;
        }

        .table-modern thead {
            background: var(--ink-900);
            color: #e2e8f0;
        }

        .table-modern tbody tr:hover {
            background: rgba(255,255,255,0.03);
        }
    </style>
</head>

<body>
<div class="app-shell">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <span class="logo-circle text-white"><i class="bi bi-grid"></i></span>
            <span>Logistik Admin</span>
        </div>
        <a href="/dashboard" class="<?= (uri_string() === 'dashboard') ? 'active' : '' ?>"><i class="bi bi-house"></i> Dashboard</a>
        <a href="/barang" class="<?= (uri_string() === 'barang') ? 'active' : '' ?>"><i class="bi bi-box-seam"></i> Kelola Barang</a>
        <a href="/kategori" class="<?= (uri_string() === 'kategori') ? 'active' : '' ?>"><i class="bi bi-tag"></i> Kelola Kategori</a>
        <a href="/pengiriman" class="<?= (uri_string() === 'pengiriman') ? 'active' : '' ?>"><i class="bi bi-truck"></i> Pengiriman</a>
        <a href="/kurir" class="<?= (uri_string() === 'kurir') ? 'active' : '' ?>"><i class="bi bi-person-badge"></i> Kurir</a>
        <a href="/logout" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content-area">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <div class="eyebrow">Panel Admin</div>
                <h3 class="page-title m-0">Dashboard &amp; Manajemen</h3>
            </div>
            <div class="d-flex align-items-center gap-2 text-white">
                <span class="badge bg-primary rounded-pill px-3 py-2"><i class="bi bi-person-circle me-1"></i><?= session('username') ?></span>
            </div>
        </div>
        <div class="content-card text-white">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

</div>
</body>
</html>
