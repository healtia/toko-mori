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
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Link Gambar</label>
            <input type="text" class="form-control <?= ($validation->hasError('gambar_sepatu')) ? 'is-invalid' : ''; ?>" name="gambar_sepatu" id="exampleFormControlInput1" value="https://">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('gambar_sepatu'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Jenis Sepatu</label>
            <select class="form-select  <?= ($validation->hasError('jenis_sepatu')) ? 'is-invalid' : ''; ?>" name="jenis_sepatu" aria-label=".form-select-lg jenis_sepatu" >
                <option value="disabled" disabled selected>Pilih Merk Sepatu</option>
                <option value="Training">Training</option>
                <option value="Running">Running</option>
                <option value="Football">Football</option>
                <option value="Golf">Golf</option>
                <option value="Basketball">Basketball</option>
                <option value="Tennis">Tennis</option>
                <option value="Outdoor">Outdoor</option>
                <option value="Lifestyle">Lifestyle</option>
                <option value="School">School</option>
                <option value="Kids">Kids</option>
                <option value="Sandals">Sandals</option>
                <option value="Swim">Swim</option>
                <option value="Other">Other</option>
            </select>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('jenis_sepatu'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Merk Sepatu</label>
            <select class="form-select <?= ($validation->hasError('merk_sepatu')) ? 'is-invalid' : ''; ?>" name="merk_sepatu" aria-label=".form-select-lg merk_sepatu">
                <option value="disabled" disabled selected>Pilih Merk Sepatu</option>
                <option value="Adidas">Adidas</option>
                <option value="Nike">Nike</option>
                <option value="Fila">Fila</option>
                <option value="Carvil">Carvil</option>
                <option value="Homy Ped">Homy Ped</option>
                <option value="New Balance">New Balance</option>
            </select>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('merk_sepatu'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Tahun Produksi</label>
            <input type="text" class="form-control <?= ($validation->hasError('tahun_produksi')) ? 'is-invalid' : ''; ?>" name="tahun_produksi" id="exampleFormControlInput1">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('tahun_produksi'); ?>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-info text-white">Create</button>
</form>

<?= $this->endSection(); ?>