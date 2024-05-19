<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url('/fakultas') ?>">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <label for="exampleInputFacultyCode">Kode Fakultas</label>
                    <input type="number" name="faculty_code" class="form-control" id="exampleInputFacultyCode">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama Fakultas</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>