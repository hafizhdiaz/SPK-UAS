<?php

$host = 'localhost'; 
$user = 'root';
$pass = '';
$dbnm = 'spk_uas';

$connect = new mysqli($host, $user, $pass, $dbnm);

if ($connect->connect_error) {
   die('Maaf koneksi gagal: '. $connect->connect_error);
}