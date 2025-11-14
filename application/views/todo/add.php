<!DOCTYPE html>
<html>
<head>
  <title>Tambah To-Do</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">
  <div class="container">
    <h2 class="mb-4 text-primary">Tambah To-Do</h2>

    <form method="post" action="<?= site_url('todo/store') ?>">

      <!-- Judul -->
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required>
      </div>

      <!-- Deskripsi -->
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
      </div>

      <!-- Urgent -->
      <div class="mb-3 form-check">
        <input type="checkbox" name="urgent" value="1" class="form-check-input" id="urgentCheck">
        <label for="urgentCheck" class="form-check-label text-danger fw-bold">
          Tandai sebagai URGENT
        </label>
      </div>

      <!-- Due date -->
      <div class="mb-3">
        <label class="form-label">Tanggal Jatuh Tempo</label>
        <input type="date" name="due_date" class="form-control">
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= site_url('todo') ?>" class="btn btn-secondary">Kembali</a>

    </form>
  </div>
</body>
</html>
