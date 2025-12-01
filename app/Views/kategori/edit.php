<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3 class="mb-3">Edit Kategori</h3>

    <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori['nama_kategori'] ?>" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/kategori" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
