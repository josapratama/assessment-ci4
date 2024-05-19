<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/gedung/update/{$building['building_id']}") ?>">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <label for="exampleInputFacultyCode">Kode Gedung</label>
                    <input type="number" name="building_code" class="form-control" id="exampleInputFacultyCode" value="<?= $building['building_code'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nama Gedung</label>
                    <input type="text" name="building_name" class="form-control" id="exampleInputName" value="<?= $building['building_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputTotalFloor">Total Lantai</label>
                    <input type="number" name="total_floor" class="form-control" id="exampleInputTotalFloor" value="<?= $building['total_floor'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputRoom">Total Ruangan</label>
                    <input type="number" name="total_room" class="form-control" id="exampleInputRoom" value="<?= $building['total_room'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>