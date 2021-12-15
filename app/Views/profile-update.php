<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 form-wrapper">
          <div class="container">
            <h1 class="m-4">Halaman Profile</h1>
            
            <?php if (session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                </div>
            <?php endif; ?>
            <form class="" action="/update-profile" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama', $user['nama']) ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="text" readonly class="form-control" id="email" value="<?= $user['email'] ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="password_confirm">Konfirmasi Password</label>
                            <input type="password" name="password_confirm" class="form-control" id="password_confirm" value="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="phone">No. Telp</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="<?= set_value('phone', $user['phone']) ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat', $user['alamat']) ?>">
                        </div>
                    </div>
                    <?php if (isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button class="btn btn-outline-secondary" type="submit" name="submit" value="submit">Update</button>
                    </div>
                </div>
            </form>
          </div>
      </div>
  </div>
</div>

<?= $this->endSection(); ?>