<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mori : Toko Sepatu dengan daftar terlengkap yang ada di Indonesia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
        $uri = service('uri');

    ?>
    <div class="container mt-4">
        <div class="row">
            <img class="logo" src="/assets/images/logo.png" style="width:10%"/>
            <h1 class="m-4">Mori Toko Sepatu</h1>
        </div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>" aria-current="page" href="<?= BASE_URL('/'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(1) == 'daftarsepatu' ? 'active' : null) ?>" aria-current="page" href="<?= BASE_URL('/daftarsepatu'); ?>">Daftar Sepatu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(1) == 'about' ? 'active' : null) ?>" aria-current="page" href="<?= BASE_URL('/about'); ?>">About</a>
                        </li>
                        <?php if(session()->get('isSuperLoggedIn')): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'tambah-data' ? 'active' : null) ?>" href="<?= BASE_URL('/tambah-data'); ?>">Tambah Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'admin' ? 'active' : null) ?>" href="<?= BASE_URL('/admin'); ?>">Update Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>" aria-current="page" href="<?= BASE_URL('/profile'); ?>">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= BASE_URL('/logout'); ?>">Logout</a>
                            </li>
                        
                        <?php elseif(session()->get('isLoggedIn')): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>" aria-current="page" href="<?= BASE_URL('/profile'); ?>">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= BASE_URL('/logout'); ?>">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>" aria-current="page" href="<?= BASE_URL('/login'); ?>">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                                    
                    <form method='get' action="/search" id="searchForm">
                        <input type='text' name='search' value='' placeholder="Search here...">
                        <input type='button' id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'>
                    </form>
                </div>
            </div>
        </nav>

        <!-- content -->
        <?= $this->renderSection('content') ?>
        
    </div>
    <div class="container mt-4 text-light bg-dark"> 
        <h4 class="fs-6" id="footer">
            Ingin beli Sepatu? Beli di Mori saja.
        </h4>
    </div>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>