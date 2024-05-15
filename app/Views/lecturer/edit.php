<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/dosen/update/{$lecturer['lecturer_id']}") ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputNIDN">NIDN</label>
                    <input type="number" name="nidn" class="form-control" id="exampleInputNIDN" value="<?= $lecturer['nidn'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoto">Foto</label><br>
                    <img src="<?= base_url('uploads/lecturers/' . $lecturer['photo']) ?>" alt="Foto Dosen" width="200">
                </div>
                <div class="form-group">
                    <label for="exampleInputNewPhoto">Foto Baru</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputNewPhoto">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="<?= $lecturer['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputHomeAddress">Alamat</label>
                    <input type="text" name="home_address" class="form-control" id="exampleInputHomeAddress" value="<?= $lecturer['home_address'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>