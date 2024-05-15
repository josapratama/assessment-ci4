<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Home</a>
    </li>
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
  </ul>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <span class="nav-link" data-toggle="dropdown" href="#">
        <div class="user-panel d-flex">
          <div class="info">
            <span>Admin</span>
          </div>
          <div class="image">
            <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
          </div>
        </div>
      </span>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <span href="#" class="dropdown-item">
          <div class="media d-flex align-items-center">
            <img src="dist/img/avatar4.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3>
                Admin
              </h3>
            </div>
          </div>
        </span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          Edit Profil
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= site_url('logout') ?>" class="dropdown-item">
          Logout
        </a>
        <div class="dropdown-divider"></div>
      </div>
    </li>
  </ul>
</nav>