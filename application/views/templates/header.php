<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand font-weight-bold text-primary" href="<?php echo site_url('todo'); ?>">
      📝 My To-Do List
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php if($this->session->userdata('user_id')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('todo'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('todo/add'); ?>">Add Task</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('auth/login'); ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('auth/register'); ?>">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
