<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-12">
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
        <div class="card-header">
            <a href="<?= site_url('/ruang/printpdf'); ?>" class="btn btn-warning">Print PDF</a>
            <a href="<?= site_url("/ruang/create") ?>" class="btn btn-primary">Buat Data Ruangan</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Ruangan</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Gedung</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rooms as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $value['room_code'] ?></td>
                            <td><?= $value['room_name'] ?></td>
                            <td><?= $value['room_floor'] ?></td>
                            <td><?= $value['building_code'] ?></td>
                            <td><?= $value['room_capacity'] ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?= site_url("/ruang/detail/{$value['room_id']}") ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="<?= site_url("/ruang/edit/{$value['room_id']}") ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= site_url("/ruang/delete/{$value['room_id']}") ?>" id="deleteButton">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('deleteButton').addEventListener('click', function(event) {
        event.preventDefault();
        <?php foreach ($rooms as $key => $value) { ?>
        let userConfirmed = confirm('Anda yakin ingin menghapus data <?= $value['room_name'] ?>?');
        <?php } ?>
        if (userConfirmed) {
            window.location.href = this.href;
        }
    });
</script>
<?= $this->endSection() ?>