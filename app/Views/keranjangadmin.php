<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<h1> Daftar Pembeli </h1>
<table class="table table-bordered table-hover">
    <thead class="table table-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Telpon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Keterangan</th>
            <th>Waktu Pemesanan</th>
            <th>Harga</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $dt): ?>
        <tr>
            <th><?= $dt['idorder']; ?></th>
            <th><?= $dt['nama']; ?></th>
            <th><?= $dt['phone']; ?></th>
            <th><?= $dt['email']; ?></th>
            <th><?= $dt['alamat']; ?></th>
            <th><?= $dt['keterangan']; ?></th>
            <th><?= $dt['created_at']; ?></th>
            <th><?= $dt['harga']; ?></th>
            <th>
                <form action="<?= BASE_URL('/delete-pesanan/'.$dt['idorder']); ?>" method="post">
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-sm btn-danger" >Hapus Data</button>
                </form>
            </th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection() ?>