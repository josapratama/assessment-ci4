<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/makul/update/{$course['course_id']}") ?>">
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
                        <select name="lecturer_id" value="<?= $course['lecturer_id'] ?>" class="form-control">
                            <option value="">Pilih Dosen</option>
                            <?php foreach ($lecturers as $lecturer) : ?>
                                <?php $selected = ($course['lecturer_id'] == $lecturer['nidn']) ? 'selected' : ''; ?>
                                <option value="<?= $lecturer['nidn'] ?>" <?= $selected ?>><?= $lecturer['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCourseCode">Kode Mata Kuliah</label>
                    <input type="number" name="course_code" class="form-control" id="exampleInputCourseCode" value="<?= $course['course_code'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="<?= $course['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputSemesterCreditUnit">SKS</label>
                    <input type="number" name="semester_credit_unit" class="form-control" id="exampleInputSemesterCreditUnit" value="<?= $course['semester_credit_unit'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputSemester">Semester</label>
                    <input type="text" name="semester" class="form-control" id="exampleInputSemester" value="<?= $course['semester'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>