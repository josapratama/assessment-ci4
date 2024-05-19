<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $buildings ?></h3>
                <p>Gedung</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-building"></i>
              </div>
              <a href="<?= site_url('/gedung') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $rooms ?></h3>
                <p>Ruang</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-door-open"></i>
              </div>
              <a href="<?= site_url('/ruang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $facultys ?></h3>
                <p>Fakultas</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-university"></i>
              </div>
              <a href="<?= site_url('/fakultas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $studyPrograms ?></h3>
                <p>Program Studi</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-graduation-cap"></i>
              </div>
              <a href="<?= site_url('/prodi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $students ?></h3>
                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user-graduate"></i>
              </div>
              <a href="<?= site_url('/mahasiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $lecturers ?></h3>
                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
              </div>
              <a href="<?= site_url('/dosen') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $courses ?></h3>
                <p>Mata Kuliah</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-book"></i>
              </div>
              <a href="<?= site_url('/fakultas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= site_url('/fakultas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
<?= $this->endSection() ?>