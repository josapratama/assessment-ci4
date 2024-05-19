<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/prodi/update/{$studyProgram['study_program_id']}") ?>">
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
                        <select name="faculty_code" id="inputFaculty" class="form-control" value="<?= $studyProgram['faculty_code'] ?>">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($facultys as $faculty) : ?>
                                <?php $selected = ($studyProgram['faculty_code'] == $faculty['faculty_code']) ? 'selected' : ''; ?>
                                <option value="<?= $faculty['faculty_code'] ?>" <?= $selected ?>><?= $faculty['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputStudyProgramCode">Kode Program Studi</label>
                    <input type="number" name="study_program_code" class="form-control" id="exampleInputStudyProgramCode" value="<?= $studyProgram['study_program_code'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama Program Studi</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="<?= $studyProgram['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputLevel">Jenjang</label>
                    <input type="text" name="level" class="form-control" id="exampleInputLevel" value="<?= $studyProgram['level'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>