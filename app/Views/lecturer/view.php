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
                    <h2 class="lead"><b><?= $lecturer['name'] ?></b></h2>
                    <p class="text-muted text-sm"><b>NIDN: </b> <?= $lecturer['nidn'] ?> </p>
                    <ul class="ml-0 mb-0 fa-ul text-muted">
                        <li class="small">Alamat: <?= $lecturer['home_address'] ?></li>
                    </ul>
                </div>
                <div class="col-5 text-center">
                    <img src="<?= base_url('uploads/lecturers/' . $lecturer['photo']) ?>" alt="user-avatar" class="img-circle img-fluid">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-right">
                <a href="<?= site_url('/dosen') ?>" class="btn btn-sm btn-primary" id="backButton">
                    <i class="fas fa-user"></i> Back
                </a>
                <a href="<?= site_url("/dosen/edit/{$lecturer['lecturer_id']}") ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
                <a href="<?= site_url("/dosen/delete/{$lecturer['lecturer_id']}") ?>" class="btn btn-sm btn-danger" id="deleteButton">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('deleteButton').addEventListener('click', function(event) {
        event.preventDefault();
        let userConfirmed = confirm('Anda yakin ingin menghapus data <?= $lecturer['name'] ?>?');
        if (userConfirmed) {
            window.location.href = this.href;
        }
    });
</script>

<?= $this->endSection() ?>
