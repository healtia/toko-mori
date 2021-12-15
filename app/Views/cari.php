<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>

<div class="row mt-5">
    <?php foreach($users as $dt): ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="<?= $dt['gambar_sepatu']; ?>" class="card-img-top" alt="<?= $dt['nama_sepatu']; ?> "width="400" height="300">
            <div class="card-body">
                <h5 class="card-title"><?= $dt['nama_sepatu']; ?></h5>
                <p class="card-text"><span style="display:inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 45ch;"><?= $dt['deskripsi']; ?></span></p>
                <p class="card-text">Harga : <small class="text-muted"><?= $dt['harga_sepatu']; ?></small></p>
                <?php if(session()->get('isLoggedIn')): ?>
                <a href="<?= BASE_URL('/post/'.$dt['id']); ?>" class="btn btn-primary">Beli</a>
                <?php else: ?>
                <a href="<?= BASE_URL('/post/'.$dt['id']); ?>" class="btn btn-primary">Lihat</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Paginate -->
<div style='margin-top: 10px;'>
    <?= $pager->links() ?>
</div>
<?= $this->endSection(); ?>