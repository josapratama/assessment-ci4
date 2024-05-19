<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
<div class="col-12">
    <form action="<?= site_url("/kelas/tambah-siswa/{$classId}") ?>" method="POST">
        <input type="hidden" name="student_id" value="<?= $studentId ?>">
        <input type="hidden" name="class_id" value="<?= $classId ?>">
        <div class="form-group">
            <label for="student_id">Mahasiswa dengan Program Studi yang Sama</label><br>
                <?php foreach ($students as $student): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="student_<?= $student['student_id'] ?>" name="students[]" value="<?= $student['student_id'] ?>">
                        <label class="form-check-label" for="student_<?= $student['student_id'] ?>">
                            <?= $student['name'] ?> (<?= $student['faculty'] ?> - <?= $student['study_program'] ?>)
                        </label>
                    </div>
                <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
    </form>
</div>
<?= $this->endSection() ?>
