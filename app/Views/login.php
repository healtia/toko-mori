<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 form-wrapper">
          <div class="container">
            <h1 class="m-4">Halaman Login</h1>
            <hr>
            <?php if (session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                </div>
            <?php endif; ?>
            <form class="" action="/login" method="post">
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                </div>
                
                <?php if (isset($validation)): ?>
                    <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button class="btn btn-outline-secondary" type="submit">Login</button>
                    </div>
                    <div class="col-12 col-sm-8 text-right">
                        <a href="/register">Belum punya akun?</a>
                    </div>
                </div>
            </form>
          </div>
      </div>
  </div>
</div>
<?= $this->endSection(); ?>