<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 form-wrapper">
          <div class="container">
            <h1 class="m-4">Halaman Profile</h1>

            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $user['nama'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="text" readonly class="form-control-plaintext" id="email" value="<?= $user['email'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="phone">No. Telp</label>
                            <input type="text" readonly class="form-control-plaintext" id="phone" value="<?= $user['phone'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" readonly class="form-control-plaintext" id="alamat" value="<?= $user['alamat'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="/update-profile" class="btn btn-secondary btn-lg" tabindex="-1" role="button">Ubah Profile</a>
                <?php if(session()->get('isSuperLoggedIn')): ?>
                    <a href="/keranjangadmin" class="btn btn-info btn-lg" tabindex="-1" role="button">Daftar Transaksi yang Ada</a>
                <?php elseif(session()->get('isLoggedIn')): ?>
                    <a href="<?= BASE_URL('/keranjang/'.$user['email']); ?>" class="btn btn-info btn-lg" tabindex="-1" role="button">Transaksi On-Going</a>
                <?php else: ?>
                    <a href="" class="btn btn-primary">Lihat</a>
                <?php endif; ?>
            </div>



          </div>
      </div>
  </div>
</div>

<?= $this->endSection(); ?>