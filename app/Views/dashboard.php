<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Hello, <?= session()->get('nama') ?> </h1>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>