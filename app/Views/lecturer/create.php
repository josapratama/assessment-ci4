<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url('/dosen') ?>" enctype="multipart/form-data">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <div class="form-group">
                    <label for="exampleInputNIDN">NIDN</label>
                    <input type="number" name="nidn" class="form-control" id="exampleInputNIDN">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoto">Foto</label>
                    <img id="photoPreview" src="#" alt="Foto Dosen" style="display: none; width: 100px; height: 100px;">
                    <input type="file" name="photo" class="form-control mt-3" id="exampleInputPhoto" onchange="previewPhoto(event)">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
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