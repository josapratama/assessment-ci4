<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form method="POST" action="<?= site_url("/kelas/update/{$class['class_id']}") ?>">
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <div class="form-group">
                    <label for="exampleInputClassCode">Kode Kelas</label>
                    <input type="number" name="class_code" class="form-control" id="exampleInputClassCode" value="<?= $class['class_code'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputClassName">Nama Kelas</label>
                    <input type="text" name="class_name" class="form-control" id="exampleInputClassName" value="<?= $class['class_name'] ?>">
                </div>
                <div class_name="form-group">
                    <label for="exampleInputSemester">Semester</label>
                    <input type="text" name="semester" class="form-control" id="exampleInputSemester" value="<?= $class['semester'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputGeneration">Generation</label>
                    <input type="text" name="generation" class="form-control" id="exampleInputGeneration" value="<?= $class['generation'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>