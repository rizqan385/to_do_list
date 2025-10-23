<?php $this->load->view('templates/header'); ?>

<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="text-center mb-4 text-success">Register</h4>

        <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('auth/register'); ?>">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success btn-block">Daftar</button>
        </form>

        <p class="mt-3 text-center">Sudah punya akun? 
          <a href="<?php echo site_url('auth/login'); ?>">Login</a>
        </p>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/footer'); ?>
