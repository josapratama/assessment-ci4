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
            <a href="<?= site_url('/gedung/printpdf'); ?>" class="btn btn-warning">Print PDF</a>
            <a href="<?= site_url("/gedung/create") ?>" class="btn btn-primary">Buat Data Gedung</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Gedung</th>
                        <th scope="col">Nama Gedung</th>
                        <th scope="col">Total Lantai</th>
                        <th scope="col">Total Ruangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($buildings as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $value['building_code'] ?></td>
                            <td><?= $value['building_name'] ?></td>
                            <td><?= $value['total_floor'] ?></td>
                            <td><?= $value['total_room'] ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?= site_url("/gedung/detail/{$value['building_id']}") ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="<?= site_url("/gedung/edit/{$value['building_id']}") ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= site_url("/gedung/delete/{$value['building_id']}") ?>" id="deleteButton">
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
        <?php foreach ($buildings as $key => $value) { ?>
        let userConfirmed = confirm('Anda yakin ingin menghapus data <?= $value['building_name'] ?>?');
        <?php } ?>
        if (userConfirmed) {
            window.location.href = this.href;
        }
    });
</script>
<?= $this->endSection() ?>