<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>

<form action="<?= BASE_URL('/update-data/proses'); ?>" method="post">

    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Nama Sepatu</label>
            <input type="text" class="form-control <?= ($validation->hasError('nama_sepatu')) ? 'is-invalid' : ''; ?>" name="nama_sepatu" id="exampleFormControlInput1" value="<?= $data['nama_sepatu']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
            <?= $validation->getError('nama_sepatu'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Harga Sepatu</label>
            <input type="text" class="form-control <?= ($validation->hasError('harga_sepatu')) ? 'is-invalid' : ''; ?>" name="harga_sepatu" id="exampleFormControlInput1" value="<?= $data['harga_sepatu']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
            <?= $validation->getError('harga_sepatu'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="exampleFormControlInput1" value="<?= $data['deskripsi']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
            <?= $validation->getError('deskripsi'); ?>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-info text-white">Create</button>
</form>
<?= $this->endSection(); ?>