<!DOCTYPE html>
<html>
<head>
  <title>Edit To-Do</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">
  <div class="container">
    <h2 class="mb-4 text-primary">Edit To-Do</h2>

    <form method="post" action="<?= site_url('todo/update/'.$todo->id) ?>">

      <!-- Judul -->
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input
          type="text"
          name="title"
          class="form-control"
          value="<?= $todo->title ?>"
          required
        >
      </div>

      <!-- Deskripsi -->
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" required><?= $todo->description ?></textarea>
      </div>

      <!-- Status -->
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
          <option value="pending"      <?= $todo->status == 'pending' ? 'selected' : '' ?>>Pending</option>
          <option value="in_progress"  <?= $todo->status == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
          <option value="completed"    <?= $todo->status == 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>
      </div>

      <!-- Urgent -->
      <div class="mb-3 form-check">
        <input
          type="checkbox"
          name="urgent"
          value="1"
          class="form-check-input"
          id="urgentCheck"
          <?= $todo->urgent == 1 ? 'checked' : '' ?>
        >
        <label for="urgentCheck" class="form-check-label text-danger fw-bold">
          Tandai sebagai URGENT
        </label>
      </div>

      <!-- Due Date -->
      <div class="mb-3">
        <label class="form-label">Tanggal Jatuh Tempo</label>
        <input
          type="date"
          name="due_date"
          class="form-control"
          value="<?= $todo->due_date ?>"
        >
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?= site_url('todo') ?>" class="btn btn-secondary">Kembali</a>

    </form>
  </div>
</body>
</html>
