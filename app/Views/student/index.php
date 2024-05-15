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
            <a href="<?= site_url('/mahasiswa/printpdf'); ?>" class="btn btn-warning">Print PDF</a>
            <a href="<?= site_url("/mahasiswa/create") ?>" class="btn btn-primary">Buat Data Mahasiswa</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($students as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $value['nim'] ?></td>
                            <td><img src="<?= base_url('uploads/students/' . $value['photo']) ?>" width="50px" class="mr-3" /><?= $value['name'] ?></td>
                            <td><?= $value['study_program'] ?></td>
                            <td><?= $value['faculty'] ?></td>
                            <td><?= $value['home_address'] ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?= site_url("/mahasiswa/detail/{$value['student_id']}") ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="<?= site_url("/mahasiswa/edit/{$value['student_id']}") ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= site_url("/mahasiswa/delete/{$value['student_id']}") ?>" id="deleteButton">
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
        <?php foreach ($students as $key => $value) { ?>
        let userConfirmed = confirm('Anda yakin ingin menghapus data <?= $value['name'] ?>?');
        <?php } ?>
        if (userConfirmed) {
            // Melanjutkan ke URL delete
            window.location.href = this.href;
        }
    });
</script>
<?= $this->endSection() ?>