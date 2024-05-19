<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url('/mahasiswa') ?>" enctype="multipart/form-data">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <div class="form-group">
                    <label for="exampleInputNIM">NIM</label>
                    <input type="number" name="nim" class="form-control" id="exampleInputNIM">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoto">Foto</label>
                    <img id="photoPreview" src="#" alt="Foto Mahasiswa" style="display: none; width: 100px; height: 100px;">
                    <input type="file" name="photo" class="form-control mt-3" id="exampleInputPhoto" onchange="previewPhoto(event)">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
                </div>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-4 col-form-label">Fakultas</label>
                    <div class="col-sm-8">
                        <select name="faculty" id="inputFaculty" class="form-control">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($facultys as $faculty) : ?>
                                <option value="<?= $faculty['name'] ?>"><?= $faculty['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputStudyProgram" class="col-sm-4 col-form-label">Program Studi</label>
                    <div class="col-sm-8">
                        <select name="study_program" id="inputStudyProgram" class="form-control">
                            <option value="">Pilih Program Studi</option>
                            <?php foreach ($studyPrograms as $studyProgram) : ?>
                                <option value="<?= $studyProgram['name'] ?>"><?= $studyProgram['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputHomeAddress">Alamat</label>
                    <input type="text" name="home_address" class="form-control" id="exampleInputHomeAddress">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewPhoto(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var photoPreview = document.getElementById('photoPreview');
            photoPreview.src = reader.result;
            photoPreview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
<?= $this->endSection() ?>