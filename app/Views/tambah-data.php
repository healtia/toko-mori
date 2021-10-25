<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<form action="<?= BASE_URL('/tambah-data/proses'); ?>" method="post" >

    <?= csrf_field(); ?>

    <div class="row">
    <div class="col-md-6 mb-4">
        <label for="exampleFormControlInput1" class="form-label">Nama Sepatu</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_sepatu')) ? 'is-invalid' : ''; ?>" name="nama_sepatu" id="exampleFormControlInput1">
        <div id="validationServerUsernameFeedback" class="invalid-feedback">
        <?= $validation->getError('nama_sepatu'); ?>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-4">
        <label for="exampleFormControlInput1" class="form-label">Harga Sepatu</label>
        <input type="text" class="form-control <?= ($validation->hasError('harga_sepatu')) ? 'is-invalid' : ''; ?>" name="harga_sepatu" id="exampleFormControlInput1">
        <div id="validationServerUsernameFeedback" class="invalid-feedback">
        <?= $validation->getError('harga_sepatu'); ?>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-4">
        <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
        <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="exampleFormControlInput1">
        <div id="validationServerUsernameFeedback" class="invalid-feedback">
        <?= $validation->getError('deskripsi'); ?>
        </div>
    </div>
    </div>

    <button type="submit" class="btn btn-info text-white">Create</button>
</form>

<?= $this->endSection(); ?>