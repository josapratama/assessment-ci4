<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/mahasiswa/update/{$student['student_id']}") ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputNIM">NIM</label>
                    <input type="number" name="nim" class="form-control" id="exampleInputNIM" value="<?= $student['nim'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoto">Foto</label><br>
                    <img src="<?= base_url('uploads/students/' . $student['photo']) ?>" alt="Foto Mahasiswa" width="200">
                </div>
                <div class="form-group">
                    <label for="exampleInputNewPhoto">Foto Baru</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputNewPhoto">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="<?= $student['name'] ?>">
                </div>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-4 col-form-label">Fakultas</label>
                    <div class="col-sm-8">
                        <select name="faculty" id="inputFaculty" class="form-control" value="<?= $student['faculty'] ?>">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($facultys as $faculty) : ?>
                                <?php $selected = ($student['faculty'] == $faculty['name']) ? 'selected' : ''; ?>
                                <option value="<?= $faculty['name'] ?>" <?= $selected ?>><?= $faculty['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputStudyProgram" class="col-sm-4 col-form-label">Program Studi</label>
                    <div class="col-sm-8">
                        <select name="study_program" id="inputStudyProgram" class="form-control" value="<?= $student['study_program'] ?>">
                            <option value="">Pilih Program Studi</option>
                            <?php foreach ($studyPrograms as $studyProgram) : ?>
                                <?php $selected = ($student['study_program'] == $studyProgram['name']) ? 'selected' : ''; ?>
                                <option value="<?= $studyProgram['name'] ?>" <?= $selected ?>><?= $studyProgram['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputHomeAddress">Alamat</label>
                    <input type="text" name="home_address" class="form-control" id="exampleInputHomeAddress" value="<?= $student['home_address'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>