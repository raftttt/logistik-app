<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Gudang App' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">Gudang App</a>

        <div class="text-white">
            Halo, <strong><?= session()->get('username'); ?></strong>
            | <a href="/logout" class="text-warning text-decoration-none">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <?php if (current_url() != base_url('/dashboard')): ?>
    <a href="/dashboard"
        style="position: absolute; right: 20px; bot: 70px;"
        class="btn btn-dark btn-sm shadow">
   ← Dashboard
    </a>
    <?php endif; ?>

    <?= $this->renderSection('content'); ?>
</div>

</body>
</html>
