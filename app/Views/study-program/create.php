<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url('/prodi') ?>">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-4 col-form-label">Fakultas</label>
                    <div class="col-sm-8">
                        <select name="faculty_code" id="inputFaculty" class="form-control">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($facultys as $faculty) : ?>
                                <option value="<?= $faculty['faculty_code'] ?>"><?= $faculty['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputStudyProgramCode">Kode Program Studi</label>
                    <input type="number" name="study_program_code" class="form-control" id="exampleInputStudyProgramCode">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama Program Studi</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
                </div>
                <div class="form-group">
                    <label for="exampleInputLevel">Jenjang</label>
                    <input type="text" name="level" class="form-control" id="exampleInputLevel">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>