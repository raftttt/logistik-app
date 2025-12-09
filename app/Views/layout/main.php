<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Gudang App" ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        :root {
            --ink-900: #0f172a;
            --ink-700: #1f2937;
            --sky-500: #38bdf8;
            --primary: #2563eb;
            --surface: #ffffff;
            --muted: #94a3b8;
            --border: #e2e8f0;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at 10% 20%, rgba(59,130,246,0.18), transparent 26%),
                        radial-gradient(circle at 90% 10%, rgba(14,165,233,0.18), transparent 22%),
                        linear-gradient(135deg, #0b1220, #0f172a 55%, #0b1220);
            color: #0b1220;
            font-family: "Poppins", sans-serif;
        }

        .glass-shell {
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 16px 60px rgba(0,0,0,0.35);
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            margin: 18px auto;
            width: min(1200px, 96%);
            padding: 14px 22px;
            border-radius: 16px;
            color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            letter-spacing: .2px;
        }

        .brand .logo-circle {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .topbar a {
            color: #e2e8f0;
            text-decoration: none;
            font-weight: 500;
        }

        .topbar a.btn { color: white; }

        .topbar .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255,255,255,0.05);
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.04);
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background: rgba(255,255,255,0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .page-container {
            width: min(1200px, 96%);
            margin: 0 auto 32px auto;
        }

        .page-title {
            color: var(--ink-900);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .section-card, .card {
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: 0 18px 60px rgba(15, 23, 42, 0.08);
        }

        .section-card {
            background: var(--surface);
            padding: 24px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border: none;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        }

        .btn-outline-secondary {
            border-color: #cbd5e1;
            color: #0f172a;
        }

        .table-modern thead {
            background: var(--ink-900);
            color: #e2e8f0;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
        }
    </style>
</head>

<body>
    <header class="topbar glass-shell">
        <div class="brand">
            <span class="logo-circle"><i class="bi bi-box-seam"></i></span>
            <span>Gudang Logistics</span>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="/dashboard" class="btn btn-sm btn-outline-light d-none d-md-inline-flex">
                <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
            <div class="user-box">
                <span class="avatar text-white">
                    <?= strtoupper(substr(session('username') ?? 'GU', 0, 2)) ?>
                </span>
                <div>
                    <div class="small text-uppercase text-muted">User</div>
                    <div class="fw-semibold"><?= session('username') ?></div>
                </div>
            </div>
            <a href="/logout" class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </header>

    <main class="page-container">
        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
