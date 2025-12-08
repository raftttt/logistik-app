<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Gudang App" ?></title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f4f6f9;
            font-family: "Poppins", sans-serif;
        }
        .topbar {
            background: #111827;
            color: white;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        .topbar a {
            color: #93c5fd;
            text-decoration: none;
        }
        .topbar a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div class="topbar">
        <h5 class="m-0">📦 Gudang Logistics Dashboard</h5>
        <div>
            <?= session('username') ?> |
            <a href="/logout">Logout</a>
        </div>
    </div>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

</body>
</html>
