<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Unpra</title>
    <base href="<?= base_url('template') ?>/">
    <link rel="icon" type="image/x-icon" href="images/logo-unpra.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <header class="bg-primary" style="height: 200px; padding: 30px">
      <div class="d-flex">
        <div class="d-flex ml-5">
          <div>
            <img src="images/logo-unpra.png" width="200px" class="bg-white" style="border-radius:50%" alt="Universitas Prabumulih">
          </div>
          <div class="ml-3">
            <h3>Sistem Penilaian Mahasiswa</h1>
            <h5>Universitas Prabumulih</h3>
          </div>
        </div>
        <div class="ml-auto">
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light m-3">
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url("/home") ?>" class="nav-link text-body">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url("/info") ?>" class="nav-link text-body">Info</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url("/contact") ?>" class="nav-link text-body">Contact</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url("/login") ?>" class="nav-link text-body">Login</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <?= $this->renderSection("content") ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>