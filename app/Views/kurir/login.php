<!doctype html>
<html>
<head>
    <title>Login Kurir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh">

<div class="card shadow p-4" style="width:320px">
    <h4 class="text-center mb-3">📦 Kurir Login</h4>

    <form method="post" action="/kurir/login">
        <div class="mb-2">
            <label class="fw-bold">Kontak</label>
            <input name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label class="fw-bold">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-dark w-100 mt-2">Login</button>
    </form>

    <?php if(session()->getFlashdata('error')): ?>
        <p class="text-danger small mt-2"><?= session()->getFlashdata('error') ?></p>
    <?php endif ?>
</div>

</body>
</html>
