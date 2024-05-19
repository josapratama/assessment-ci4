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
            <a href="<?= site_url('/prodi/printpdf'); ?>" class="btn btn-warning">Print PDF</a>
            <a href="<?= site_url("/prodi/create") ?>" class="btn btn-primary">Buat Data Kelas</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kelas</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($schedules as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $value['faculty_name'] ?></td>
                            <td><?= $value['study_program_code'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['level'] ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?= site_url("/prodi/detail/{$value['study_program_id']}") ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="<?= site_url("/prodi/edit/{$value['study_program_id']}") ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= site_url("/prodi/delete/{$value['study_program_id']}") ?>" id="deleteButton">
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
        <?php foreach ($schedules as $key => $value) { ?>
        let userConfirmed = confirm('Anda yakin ingin menghapus data <?= $value['name'] ?>?');
        <?php } ?>
        if (userConfirmed) {
            window.location.href = this.href;
        }
    });
</script>
<?= $this->endSection() ?>