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
            <a href="<?= site_url("/penilaian/create") ?>" class="btn btn-primary">Buat Data Nilai</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Absensi</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Quis</th>
                        <th scope="col">UTS</th>
                        <th scope="col">UAS</th>
                        <th scope="col">Total Nilai</th>
                        <th scope="col">Rata - Rata</th>
                        <th scope="col">Nilai Huruf</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($assessment as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $value['student_id'] ?></td>
                            <td><?= $value['course_id'] ?></td>
                            <td><?= $value['absence_attendance'] ?></td>
                            <td><?= $value['task'] ?></td>
                            <td><?= $value['quiz'] ?></td>
                            <td><?= $value['midterm_exam'] ?></td>
                            <td><?= $value['final_exam'] ?></td>
                            <td><?= $value['number_assessments'] ?></td>
                            <td><?= $value['average_value'] ?></td>
                            <td><?= $value['letter_grade'] ?></td>
                            <td>
                                <a href="<?= site_url("/penilaian/edit/{$value['assessment_id']}") ?>" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url("/penilaian/delete/{$value['assessment_id']}") ?>" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>