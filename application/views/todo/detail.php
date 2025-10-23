<!DOCTYPE html>
<html>
<head>
  <title>Detail To-Do</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Detail To-Do</h2>

    <p><strong>Judul:</strong> <?= $todo->title ?></p>
    <p><strong>Deskripsi:</strong> <?= $todo->description ?></p>
    <p><strong>Status:</strong> <?= ucfirst(str_replace('_', ' ', $todo->status)) ?></p>
    <p><strong>Tanggal Jatuh Tempo:</strong> <?= $todo->due_date ?></p>
    <p><strong>Dibuat pada:</strong> <?= $todo->created_at ?></p>

    <a href="<?= site_url('todo/edit/'.$todo->id) ?>" class="btn btn-warning">Edit</a>
    <a href="<?= site_url('todo') ?>" class="btn btn-secondary">Kembali</a>
  </div>
</body>
</html>
