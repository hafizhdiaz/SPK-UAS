<?php include_once 'database/koneksi.php'; ?>

<?php 
error_reporting(0);
// mengambil hasil inputan

$id_history = $_GET['id_history'];
$get_data = "SELECT tb_history.*, tb_nama.nama_mhs FROM tb_history INNER JOIN tb_nama ON tb_history.id_nama = tb_nama.id_nama WHERE id_history = '$id_history' ";
$q_data   = $connect->query($get_data);
$s_data   = $q_data->fetch_array(MYSQLI_ASSOC);

$nim = $s_data['nim'];
$nma_mhs     = $s_data['nama_mhs'];
$id_nama      = $s_data['id_nama'];
$alamat         = $s_data['alamat'];


$sql2 = "SELECT * FROM tb_alternatif";
$result2 = $connect->query($sql2);

$sql3 = "SELECT id_criteria, criteria FROM tb_kriteria";
$result3 = $connect->query($sql3);

$motor = array();
$alternatif = array();

while($row = $result2->fetch_row()){
  $motor[$row[0]] = $row[0];
  $alternatif[$row[0]]=array($row[1]);
}


$query4   = $connect->query("SELECT * FROM tb_kriteria_nama WHERE id_nama = '$id_nama'");
$row      = $query4->fetch_array(MYSQLI_ASSOC);
$kriteria = json_decode($row['kriteria'], true);

$array_kriteria = array(
  ['id_kriteria' => $kriteria[0]['id_kriteria'], 'kriteria' => $kriteria[0]['kriteria'], 'weight' => $kriteria[0]['weight']],
  ['id_kriteria' => $kriteria[1]['id_kriteria'], 'kriteria' => $kriteria[1]['kriteria'], 'weight' => $kriteria[1]['weight']],
  ['id_kriteria' => $kriteria[2]['id_kriteria'], 'kriteria' => $kriteria[2]['kriteria'], 'weight' => $kriteria[2]['weight']],
  ['id_kriteria' => $kriteria[3]['id_kriteria'], 'kriteria' => $kriteria[3]['kriteria'], 'weight' => $kriteria[3]['weight']],
);
$data_kriteria = json_encode($array_kriteria);
$connect->query("UPDATE tb_kriteria_nama SET kriteria = '$data_kriteria' WHERE id_nama = '$id_nama'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pendukung Keputusan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            <h3 class="text-center" style="color: #000">Detail History</h3>
            
            <div class="card">
              <div class="card-header">
                Hasil Perhitungan Metode
              </div>
              <div class="card-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Profil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Proses Metode Electre</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                  <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                    
                    <br>

                    <div class="card">
                      <div class="card-header">
                        Detail Pengunjung
                      </div>
                      <div class="card-body">
                        <form action="konsul_proses.php" method="post">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                              <?= $nim ?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                              <?= $nma_mhs ?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                              <?= $alamat ?>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>

                  <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">

                   <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                        <div class="card-header">
                          Membentuk Perbandingan Berpasangan (X)
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Alternatif</th>
                                <?php 
                                foreach ($result3 as $key) {
                                  echo "<th>".$key['criteria']."</th>";
                                }
                                ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              $sql="SELECT COUNT(*) FROM tb_kriteria";
                              $result=$connect->query($sql);
                              $row=$result->fetch_row();
                              $n=$row[0];
                              $sql="SELECT * FROM tb_evaluasi
                              ORDER BY id_alternative, id_criteria";
                              $result=$connect->query($sql);
                              $X=array();
                              $alternative='';
                              $m=0;

                              while($row=$result->fetch_row()){
                                if($row[0]!=$alternative){
                                  $X[$row[0]]=array();
                                  $alternative=$row[0];
                                  ++$m;
                                }
                                $X[$row[0]][$row[1]]=$row[2];
                              }

                              foreach ($X as $key => $value) {
                                echo "<tr>";
                                echo "<td>".$alternatif[$key][0]."</td>";
                                for ($i = 1; $i <= count($value); $i++) {
                                  echo "<td>".$value[$i]."</td>";
                                }
                                echo "</tr>";
                              }

                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                        <div class="card-header">
                          Perbandingan Berpasangan Ternormalisasi (R)
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                <?php 
                                foreach ($result3 as $key) {
                                  echo "<th>".$key['criteria']."</th>";
                                }
                                ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $x_rata=array();
                              foreach($X as $i=>$x){
                                foreach($x as $j=>$value){
                                  $x_rata[$j]=(isset($x_rata[$j])?$x_rata[$j]:0)+pow($value,2);
                                }
                              }
                              for($j=1;$j<=$n;$j++){
                                $x_rata[$j]=sqrt($x_rata[$j]);
                              }
                              $R=array();
                              $alternative='';
                              foreach($X as $i=>$x){
                                if($alternative!=$i){
                                  $alternative=$i;
                                  $R[$i]=array();
                                }
                                foreach($x as $j=>$value){
                                  $R[$i][$j]=$value/$x_rata[$j];
                                }
                              }

                              foreach ($R as $key => $value) {
                                echo "<tr>";                        
                                echo "<td>".$motor[$key]."</td>";
                                for ($i = 1; $i <= count($value); $i++) {
                                  echo "<td>".$value[$i]."</td>";
                                }
                                echo "</tr>";
                              }

                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                        <div class="card-header">
                          Menentukan Bobot tiap-tiap Kriteria (W)
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <?php 

                                foreach ($result3 as $key) {
                                  echo "<th>".$key['criteria']."</th>";
                                }

                                ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                            // query untuk mengambil data nilai bobot criteria
                              $sql="SELECT kriteria FROM tb_kriteria_nama WHERE id_nama = '$id_nama'";
                              $result = $connect->query($sql);

                              $criteria = array();
                              while ($row = $result->fetch_array()) {

                                $kriteria = json_decode($row['kriteria'], true);      
                                for ($i=0; $i < count($kriteria) ; $i++) { 
                                  $criteria[$kriteria[$i]['id_kriteria']] = $kriteria[$i]['weight'];
                                }  

                              }

                              echo "<tr>";
                              for ($i = 1; $i <= count($criteria); $i++) {
                                echo "<td>".$criteria[$i]."</td>";
                              }
                              echo "</tr>";



                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                        <div class="card-header">
                          Membentuk Matrik Preferensi (V)
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                <?php 
                                foreach ($result3 as $key) {
                                  echo "<th>".$key['criteria']."</th>";
                                }
                                ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              $V=$w=array();
                              foreach($criteria as $j=>$weight)
                                $w[$j]=$weight;
                              $alternative='';
                              foreach($R as $i=>$r){
                                if($alternative!=$i){
                                  $alternative=$i;
                                  $V[$i]=array();
                                }
                                foreach($r as $j=>$value){
                                  $V[$i][$j]=$w[$j]*$value;
                                }
                              }

                              foreach ($V as $key => $value) {
                               echo "<tr>";                        
                               echo "<td>".$motor[$key]."</td>";
                               for ($i = 1; $i <= count($value); $i++) {
                                echo "<td>".$value[$i]."</td>";
                              }
                              echo "</tr>";
                            }

                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      <div class="card-header">
                        Menentukan Concordance Index (Ckl)
                      </div>
                      <div class="body table-responsive">
                        <table class="table table-bordered">
                         <thead>
                          <tr>
                            <th></th>
                            <?php 
                            foreach ($result2 as $key => $value) {
                              echo "<th>".$value['name']."</th>";
                            }
                            ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          $c=array();
                          $c_index='';
                          for($k=1;$k<=$m;$k++){
                            if($c_index!=$k){
                              $c_index=$k;
                              $c[$k]=array();
                            }
                            for($l=1;$l<=$m;$l++){
                              if($k!=$l){
                                for($j=1;$j<=$n;$j++){
                                  if(!isset($c[$k][$l]))$c[$k][$l]=array();
                                  if($V[$k][$j]>=$V[$l][$j]){
                                    array_push($c[$k][$l],$j);
                                  }
                                }
                              } else if (isset($c[$k][$l]) == NULL) {
                                $c[$k][$l]=$c[$k][$l] = "-";
                              }
                            }
                          }

                          foreach ($c as $key => $value) {
                           echo "<tr>";                        
                           echo "<td>".$motor[$key]."</td>";
                           for ($i = 1; $i <= count($c); $i++) {
                            echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
                          }
                          echo "</tr>";
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    Menentukan Discordance Index (Dkl)
                  </div>
                  <div class="body table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <?php 
                          foreach ($result2 as $key => $value) {
                            echo "<th>".$value['name']."</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $d=array();
                        $d_index='';
                        for($k=1;$k<=$m;$k++){
                          if($d_index!=$k){
                            $d_index=$k;
                            $d[$k]=array();
                          }
                          for($l=1;$l<=$m;$l++){
                            if($k!=$l){
                              for($j=1;$j<=$n;$j++){
                                if(!isset($d[$k][$l]))$d[$k][$l]=array();
                                if($V[$k][$j]<$V[$l][$j]){
                                  array_push($d[$k][$l],$j);
                                }
                              }
                            } else if (isset($d[$k][$l]) == NULL) {
                              $d[$k][$l]=$d[$k][$l] = "-";
                            }
                          }
                        }

                        foreach ($d as $key => $value) {
                         echo "<tr>";                        
                         echo "<td>".$motor[$key]."</td>";
                         for ($i = 1; $i <= count($c); $i++) {
                          echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
                        }
                        echo "</tr>";
                      }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  Membentuk Matriks Concordance (C)
                </div>
                <div class="body table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                        <?php 
                        foreach ($result2 as $key => $value) {
                          echo "<th>".$value['name']."</th>";
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $C=array();
                      $c_index='';
                      for($k=1;$k<=$m;$k++){
                        if($c_index!=$k){
                          $c_index=$k;
                          $C[$k]=array();
                        }
                        for($l=1;$l<=$m;$l++){
                          if($k!=$l && count($c[$k][$l])){
                            $f=0;
                            foreach($c[$k][$l] as $j){
                              $C[$k][$l]=(isset($C[$k][$l])?$C[$k][$l]:0)+$w[$j];
                            }
                          } else if (isset($C[$k][$l]) == NULL) {
                            $C[$k][$l]=$C[$k][$l] = "-";
                          }
                        }
                      }

                      foreach ($C as $key => $value) {
                        echo "<tr>";
                        echo "<tr>";                        
                        echo "<td>".$motor[$key]."</td>";
                        for ($i = 1; $i <= count($c); $i++) {
                          echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
                        }
                        echo "</tr>";
                      }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  Threshold c
                </div>
                <div class="body table-responsive">
                  <?php

                  $sigma_c=0;
                  foreach($C as $k=>$cl){
                    foreach($cl as $l=>$value){
                      $sigma_c+=$value;
                    }
                  }
                  $threshold_c=$sigma_c/($m*($m-1));
                  echo $threshold_c;

                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  Membentuk Matriks Discordance (D)
                </div>
                <div class="body table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                        <?php 
                        foreach ($result2 as $key => $value) {
                          echo "<th>".$value['name']."</th>";
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $D=array();
                      $d_index='';
                      for($k=1;$k<=$m;$k++){
                        if($d_index!=$k){
                          $d_index=$k;
                          $D[$k]=array();
                        }
                        for($l=1;$l<=$m;$l++){
                          if($k!=$l){
                            $max_d=0;
                            $max_j=0;
                            if(count($d[$k][$l])){
                              $mx=array();
                              foreach($d[$k][$l] as $j){
                                if($max_d < abs($V[$k][$j]-$V[$l][$j]))
                                  $max_d=abs($V[$k][$j]-$V[$l][$j]);
                              }
                            }
                            $mx=array();
                            for($j=1;$j<=$n;$j++){
                              if($max_j < abs($V[$k][$j]-$V[$l][$j]))
                                $max_j=abs($V[$k][$j]-$V[$l][$j]);
                            }
                            $D[$k][$l]= $max_d == 0 ? 0 : $max_d/$max_j;
                          } else if (isset($D[$k][$l]) == NULL) {
                            $D[$k][$l]=$D[$k][$l] = "-";
                          }
                        }
                      }

                      foreach ($D as $key => $value) {
                       echo "<tr>";                        
                       echo "<td>".$motor[$key]."</td>";
                       for ($i = 1; $i <= count($c); $i++) {
                        echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
                      }
                      echo "</tr>";
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                Threshold d
              </div>
              <div class="body table-responsive">
                <?php

                $sigma_d=0;
                foreach($D as $k=>$dl){
                  foreach($dl as $l=>$value){
                    $sigma_d+=$value;
                  }
                }
                $threshold_d=$sigma_d/($m*($m-1));
                echo $threshold_d;

                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                Membentuk Matrik Concordance Dominan(F)
              </div>
              <div class="body table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th></th>
                      <?php 
                      foreach ($result2 as $key => $value) {
                        echo "<th>".$value['name']."</th>";
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $F=array();
                    foreach($C as $k=>$cl){
                      $F[$k]=array();
                      foreach($cl as $l=>$value){
                        $F[$k][$l]=($value >= $threshold_c?1:0);
                      }
                    }

                    foreach ($F as $key => $value) {
                     echo "<tr>";                        
                     echo "<td>".$motor[$key]."</td>";
                     for ($i = 1; $i <= count($c); $i++) {
                      echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
                    }
                    echo "</tr>";
                  }

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="card-header">
              Membentuk Matrik Discordance Dominan(G)
            </div>
            <div class="body table-responsive">
              <table class="table table-bordered">
               <thead>
                <tr>
                  <th></th>
                  <?php 
                  foreach ($result2 as $key => $value) {
                    echo "<th>".$value['name']."</th>";
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php

                $G=array();
                foreach($D as $k=>$dl){
                  $G[$k]=array();
                  foreach($dl as $l=>$value){
                    $G[$k][$l]=($value >= $threshold_d?1:0);
                  }
                }

                foreach ($G as $key => $value) {
                 echo "<tr>";                        
                 echo "<td>".$motor[$key]."</td>";
                 for ($i = 1; $i <= count($c); $i++) {
                  echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
                }
                echo "</tr>";
              }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header">
          Membentuk Matrik Agregasi Dominan(E)
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered">
           <thead>
            <tr>
              <th></th>
              <?php 
              foreach ($result2 as $key => $value) {
                echo "<th>".$value['name']."</th>";
              }
              ?>
              <th>Poin</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $hasil1 = array();

            $E=array();
            foreach($F as $k=>$sl){
              $E[$k]=array();
              foreach($sl as $l=>$value){
                $E[$k][$l]=$F[$k][$l]*$G[$k][$l];
              }
            }

            foreach ($E as $key => $value) {
              $hasil1[$motor[$key]] = array_sum($value);

              echo "<tr>";                        
              echo "<td>".$motor[$key]."</td>";
              for ($i = 1; $i <= count($c); $i++) {
                echo is_array($value[$i]) ? "<td>".implode(", ", $value[$i])."</td>" : "<td>".$value[$i]."</td>";
              }
              echo "<td>".array_sum($value)."</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row ">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="card-header">
        Ranking Motor
      </div>
      <div class="body table-responsive">
        <table class="table table-bordered">
         <thead>
          <tr>
            <th>Ranking</th>
            <th>Nama Motor</th>
            <th>Poin</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          arsort($hasil1);
          $ranking = 1;
          foreach ($hasil1 as $key => $value) {
            echo "<tr>";
            echo "<td>".$ranking++."</td>";
            echo "<td>".$alternatif[$key][0]."</td>";
            echo "<td>".$value."</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
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