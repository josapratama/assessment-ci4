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
                <div class="form-group">
                    <label for="exampleInputFaculty">Fakultas</label>
                    <input type="text" name="faculty" class="form-control" id="exampleInputFaculty" value="<?= $student['faculty'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputStudyProgram">Program Study</label>
                    <input type="text" name="study_program" class="form-control" id="exampleInputStudyProgram" value="<?= $student['study_program'] ?>">
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