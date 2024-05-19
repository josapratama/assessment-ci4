<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/ruang/update/{$room['room_id']}") ?>">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="form-group row">
                    <label for="inputBuilding" class="col-sm-4 col-form-label">Gedung</label>
                    <div class="col-sm-8">
                        <select name="building_code" id="inputBuilding" class="form-control" value="<?= $room['building_code'] ?>">
                            <option value="">Pilih Gedung</option>
                            <?php foreach ($buildings as $building) : ?>
                                <?php $selected = ($room['building_code'] == $building['building_code']) ? 'selected' : ''; ?>
                                <option value="<?= $building['building_code'] ?>" <?= $selected ?>><?= $building['building_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputRoomCode">Kode Ruangan</label>
                    <input type="number" name="room_code" class="form-control" id="exampleInputRoomCode" value="<?= $room['room_code'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputRoomName">Nama Ruangan</label>
                    <input type="text" name="room_name" class="form-control" id="exampleInputRoomName" value="<?= $room['room_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputRoomFloor">Ruangan Lantai</label>
                    <input type="text" name="room_floor" class="form-control" id="exampleInputRoomFloor" value="<?= $room['room_floor'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputCapacity">Kapasitas Ruangan</label>
                    <input type="text" name="room_capacity" class="form-control" id="exampleInputCapacity" value="<?= $room['room_capacity'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>