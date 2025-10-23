
<h2 class="mb-4 text-center text-primary">Daftar Tugas</h2>

<a href="<?php echo site_url('todo/add'); ?>" class="btn btn-success mb-3">+ Tambah Tugas</a>

<table class="table table-bordered table-hover">
  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Status</th>
      <th>Jatuh Tempo</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($todos)): $no=1; foreach($todos as $todo): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $todo->title; ?></td>
        <td>
          <?php if($todo->status == 'completed'): ?>
            <span class="badge badge-success">Selesai</span>
          <?php elseif($todo->status == 'in_progress'): ?>
            <span class="badge badge-warning">Proses</span>
          <?php else: ?>
            <span class="badge badge-secondary">Pending</span>
          <?php endif; ?>
        </td>
        <td><?php echo $todo->due_date; ?></td>
        <td>
          <a href="<?php echo site_url('todo/detail/'.$todo->id); ?>" class="btn btn-info btn-sm">Detail</a>
          <a href="<?php echo site_url('todo/edit/'.$todo->id); ?>" class="btn btn-primary btn-sm">Edit</a>
          <a href="<?php echo site_url('todo/delete/'.$todo->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus tugas ini?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; else: ?>
      <tr>
        <td colspan="5" class="text-center text-muted">Belum ada tugas</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

