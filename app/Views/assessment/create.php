<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-6">
    <?php if (session()->has('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('message') ?>
        </div>
    <?php endif ?>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif ?>
    <div class="card">
        <form method="POST" action="<?= site_url('/penilaian') ?>">
            <div class="card-header">
                <div class="form-group row">
                    <label for="inputStudent" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-8">
                        <select name="student_id" id="inputStudent" class="form-control">
                            <option value="">Pilih Mahasiswa</option>
                            <?php foreach ($students as $student) : ?>
                                <option value="<?= $student['nim'] ?>"><?= $student['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCourse" class="col-sm-4 col-form-label">Mata Kuliah</label>
                    <div class="col-sm-8">
                        <select name="course_id" id="inputCourse" class="form-control">
                            <option value="">Pilih Mata Kuliah</option>
                            <?php foreach ($courses as $course) : ?>
                                <option value="<?= $course['course_code'] ?>"><?= $course['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="form-group">
                            <td><label for="inputAbsenceAttendance">Absensi</label></td>
                            <td><input type="number" name="absence_attendance" class="form-control" id="inputAbsenceAttendance"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="inputTask">Tugas</label></td>
                            <td><input type="number" name="task" class="form-control" id="inputTask"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="inputQuiz">Quis</label></td>
                            <td><input type="number" name="quiz" class="form-control" id="inputQuiz"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="inputMidtermExam">UTS</label></td>
                            <td><input type="number" name="midterm_exam" class="form-control" id="inputMidtermExam"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="inputFinalExam">UAS</label></td>
                            <td><input type="number" name="final_exam" class="form-control" id="inputFinalExam"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary">Submit</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>