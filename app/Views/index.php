<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<style>
    .slide {display:none;}
    </style>
    <body>
    <div class="contentslide" style="max-width:750px">
      <img class="slide" src="/assets/images/index/img1.jpg" style="width:100%" width="800" height="500">
      <img class="slide" src="/assets/images/index/img2.jpg" style="width:100%" width="800" height="500">
      <img class="slide" src="/assets/images/index/img3.jpg" style="width:100%" width="800" height="500">
      <img class="slide" src="/assets/images/index/img4.jpg" style="width:100%" width="800" height="500">
      <img class="slide" src="/assets/images/index/img5.png" style="width:100%" width="800" height="500">
    </div>

    <script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("slide");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
    </script>
    <p>Mori adalah sebuah situs khusus untuk membeli sepatu. Disini "kami" menawarkan sepatu terlengkap.</p>
    <p> Tersedia berbagai merk sepatu ternama mulai dari sepatu lari, sepatu basket, sepatu sandal, sepatu sekolah, sepatu kasual, sampai sepatu renang pun kami jual. Jadi tunggu apa lagi, ayo belanja di Olshop kami!</p> <br>
  <h2> Daftar Sepatu </h2>
  
<div class="row mt-5">
    <?php foreach($data as $dt): ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="<?= $dt['gambar_sepatu']; ?>" class="card-img-top" alt="<?= $dt['nama_sepatu']; ?> "width="400" height="300">
            <div class="card-body">
                <a href="<?= BASE_URL('/post/'.$dt['id']); ?>" class="card-title fs-4"><?= $dt['nama_sepatu']; ?></a>
                <p class="card-text"><span style="display:inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 45ch;"><?= $dt['deskripsi']; ?></span></p>
                <p class="card-text">Harga : <small class="text-muted"><?= $dt['harga_sepatu']; ?></small></p>
                <?php if(session()->get('isLoggedIn')): ?>
                <a href="<?= BASE_URL('/order/'.$dt['id']); ?>" class="btn btn-primary">Beli</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>