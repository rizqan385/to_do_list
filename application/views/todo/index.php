<h2 class="mb-4 text-center text-primary">Daftar Tugas</h2>

<a href="<?php echo site_url('todo/add'); ?>" class="btn btn-success mb-3">+ Tambah Tugas</a>

<table class="table table-bordered table-hover">
  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Status</th>
      <th>Urgent</th>
      <th>Jatuh Tempo</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php if (!empty($todos)): $no=1; foreach ($todos as $todo): ?>

      <tr class="<?= $todo->urgent ? 'table-danger' : '' ?>">
        
        <td><?= $no++; ?></td>

        <!-- Judul dengan garis coret jika selesai -->
        <td style="<?= $todo->status == 'completed' ? 'text-decoration: line-through;' : '' ?>">
          <?= $todo->title ?>

          <!-- Badge urgent kecil dekat title -->
          <?php if ($todo->urgent): ?>
            <span class="badge badge-danger ml-1">URGENT</span>
          <?php endif; ?>
        </td>

        <!-- Status -->
        <td>
          <?php if($todo->status == 'completed'): ?>
            <span class="badge badge-success">Selesai</span>
          <?php elseif($todo->status == 'in_progress'): ?>
            <span class="badge badge-warning">Proses</span>
          <?php else: ?>
            <span class="badge badge-secondary">Pending</span>
          <?php endif; ?>
        </td>

        <!-- URGENT -->
        <td>
          <?php if($todo->urgent): ?>
            <span class="badge badge-danger">Ya</span>
          <?php else: ?>
            <span class="badge badge-secondary">Tidak</span>
          <?php endif; ?>
        </td>

        <td><?= $todo->due_date; ?></td>

        <td>


          <!-- Tombol Edit -->
          <a href="<?= site_url('todo/edit/'.$todo->id); ?>" class="btn btn-primary btn-sm">Edit</a>

          <!-- Tombol Selesai / Batalkan -->
          <?php if ($todo->status != 'completed'): ?>
            <a href="<?= site_url('todo/done/'.$todo->id); ?>" class="btn btn-success btn-sm">Selesai</a>
          <?php else: ?>
            <a href="<?= site_url('todo/undone/'.$todo->id); ?>" class="btn btn-warning btn-sm">Batalkan</a>
          <?php endif; ?>

          <!-- Tombol Urgent / Normal -->
          <?php if (!$todo->urgent): ?>
            <a href="<?= site_url('todo/urgent/'.$todo->id); ?>" class="btn btn-danger btn-sm">Urgent</a>
          <?php else: ?>
            <a href="<?= site_url('todo/unurgent/'.$todo->id); ?>" class="btn btn-secondary btn-sm">Normal</a>
          <?php endif; ?>

          <!-- Tombol Hapus -->
          <a href="<?= site_url('todo/delete/'.$todo->id); ?>" 
             class="btn btn-danger btn-sm" 
             onclick="return confirm('Hapus tugas ini?')">
             Hapus
          </a>

        </td>

      </tr>

    <?php endforeach; else: ?>

      <tr>
        <td colspan="6" class="text-center text-muted">Belum ada tugas</td>
      </tr>

    <?php endif; ?>
  </tbody>
</table>
