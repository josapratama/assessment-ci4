<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url('/makul') ?>">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="form-group row">
                    <label for="inputLecturer" class="col-sm-4 col-form-label">Dosen</label>
                    <div class="col-sm-8">
                        <select name="lecturer_id" id="inputLecturer" class="form-control">
                            <option value="">Pilih Dosen</option>
                            <?php foreach ($lecturers as $lecturer) : ?>
                                <option value="<?= $lecturer['nidn'] ?>"><?= $lecturer['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCourseCode">Kode Mata Kuliah</label>
                    <input type="number" name="course_code" class="form-control" id="exampleInputCourseCode">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
                </div>
                <div class="form-group">
                    <label for="exampleInputSemesterCreditUnit">SKS</label>
                    <input type="text" name="semester_credit_unit" class="form-control" id="exampleInputSemesterCreditUnit">
                </div>
                <div class="form-group">
                    <label for="exampleInputSemester">Semester</label>
                    <input type="text" name="semester" class="form-control" id="exampleInputSemester">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>