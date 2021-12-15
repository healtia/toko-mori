<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>


<h1><?= $dt['nama_sepatu']; ?></h1>
<br><br>
<img src="<?= $dt['gambar_sepatu']; ?>" class="card-img-top" alt="<?= $dt['nama_sepatu']; ?>">
<br><br>
<p><?= $dt['deskripsi']; ?></p>
<p>Jenis Sepatu : <?= $dt['jenis_sepatu']; ?></p>
<p>Merk Sepatu : <?= $dt['merk_sepatu']; ?></p>
<p>Tahun Produksi : <?= $dt['tahun_produksi']; ?></p>
<?php if(session()->get('isLoggedIn')): ?>
<a href="<?= BASE_URL('/order/'.$dt['id']); ?>" class="btn btn-primary">Beli Sepatu Ini!</a>
<?php endif; ?>

<?= $this->endSection() ?>