<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>


<h1>Deskripsi Pemesanan</h1>
<div class="container">
    <form class="" action="/sepatuorder/proses/" method="post">
        <div class="row">
            <div class="col">
                <img src="<?= $dt['gambar_sepatu']; ?>" class="card-img-top" alt="<?= $dt['nama_sepatu']; ?>" style="max-width:550px" width="600" height="400">
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="keterangan">Sepatu :</label>
                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan" value="<?= $dt['nama_sepatu'] ?>">
                </div>
                <div class="">
                    <label for="deskripsi">Deskripsi :</label>
                    <input type="text" readonly class="form-control" id="deskripsi" value="<?= $dt['deskripsi'] ?>">
                </div>
                <div class="form-group">
                    <label for="harga">Harga :</label>
                    <input type="text" readonly class="form-control" id="harga" name="harga"  value="<?= $dt['harga_sepatu'] ?>">
                </div>
                <div class="">
                    <label for="jenis_sepatu">Jenis Sepatu :</label>
                    <input type="text" readonly class="form-control" id="jenis_sepatu" value="<?= $dt['jenis_sepatu'] ?>">
                </div>
                <div class="">
                    <label for="email">Merk Sepatu :</label>
                    <input type="merk_sepatu" readonly class="form-control" id="merk_sepatu" value="<?= $dt['merk_sepatu'] ?>">
                </div>
                <div class="">
                    <label for="tahun_produksi">Tahun Produksi :</label>
                    <input type="text" readonly class="form-control" id="tahun_produksi" value="<?= $dt['tahun_produksi'] ?>">
                </div>
                <div class="form-group">
                    <label for="id">ID Sepatu :</label>
                    <input type="text" readonly class="form-control" id="id" value="<?= $dt['id'] ?>">
                </div>
            </div>
            <div>
                <h1>Profile Pemesan</h1>
            </div>
            <div class="form-group">
                <label for="nama">Nama Pembeli :</label>
                <input type="text" readonly class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pembeli :</label>
                <input type="text" readonly class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Pembeli :</label>
                <input type="text" readonly class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="form-group">
                <label for="phone">Nomor Pembeli :</label>
                <input type="text" readonly class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>">
            </div>
        </div>
        <br>
        <?php if(session()->get('isLoggedIn')): ?>
        <div class="row">
            <div class="col-12 col-sm-4">
                <button class="btn btn-outline-secondary" type="submit" name="submit" value="submit">Beli Sepatu Ini!</button>
            </div>
        </div>
        <?php endif; ?>
    </form>
    <?php if (isset($validation)): ?>
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        </div>
    <?php endif; ?>
</div>



<?= $this->endSection(); ?>