<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>

<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
            <?= $title ?>
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-7">
                    <h2 class="lead">Fakultas : <b><?= $faculty['name'] ?></b></h2>
                    <p class="text-muted text-sm"><b>Kode Fakultas: </b> <?= $faculty['faculty_code'] ?> </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-right">
                <a href="<?= site_url('/fakultas') ?>" class="btn btn-sm btn-primary" id="backButton">
                    <i class="fas fa-user"></i> Back
                </a>
                <a href="<?= site_url("/fakultas/edit/{$faculty['faculty_id']}") ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
                <a href="<?= site_url("/fakultas/delete/{$faculty['faculty_id']}") ?>" class="btn btn-sm btn-danger" id="deleteButton">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('deleteButton').addEventListener('click', function(event) {
        event.preventDefault();
        let userConfirmed = confirm('Anda yakin ingin menghapus data fakultas <?= $faculty['name'] ?>?');
        if (userConfirmed) {
            window.location.href = this.href;
        }
    });
</script>

<?= $this->endSection() ?>
