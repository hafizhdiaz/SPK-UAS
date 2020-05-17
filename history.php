<?php include_once 'database/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pendukung Keputusan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="assets/css/aos.css">
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" style="background-color: #4baea0" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.php">SPK ELECTRE MOTOR</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block m-0 p-0">
                <li>
                  <a href="index.php" class="nav-link">Beranda</a>
                </li>
                <li>
                  <a href="konsul.php" class="nav-link">Konsul</a>
                </li>
                <li>
                  <a href="history.php" class="nav-link">History</a>
                </li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="site-section">
      <div class="container">
        <div class="row mt-5 justify-content-center">
          <div class="col-lg-12">
            <h3 class="text-center" style="color: #000">History Perhitungan</h3>
            
            <div class="card">
              <div class="card-header">
                Data History
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Tanggal Akses</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $data = $connect->query('SELECT tb_history.*, tb_nama.nama_mhs FROM tb_history INNER JOIN tb_nama ON tb_history.id_nama = tb_nama.id_nama ORDER BY id_history'); while ($row = $data->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                          <td><?= $row['id_history'] ?></td>
                          <td><?= $row['nim'] ?></td>
                          <td><?= $row['tgl_akses'] ?></td>
                          <td><?= $row['nama_mhs'] ?></td>
                          <td><?= $row['alamat'] ?></td>
                          <td>
                            <a href="history_detail.php?id_history=<?= $row['id_history'] ?>">Detail</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    
  </div> <!-- .site-wrap -->

  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/jquery.countdown.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/jquery.sticky.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>