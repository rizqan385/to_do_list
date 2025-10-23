<!DOCTYPE html>
<html>
<head>
  <title>Tambah To-Do</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Tambah To-Do</h2>

    <form method="post" action="<?= site_url('todo/store') ?>">
      <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
      </div>

      <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <div class="mb-3">
        <label>Tanggal Jatuh Tempo</label>
        <input type="date" name="due_date" class="form-control">
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= site_url('todo') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
