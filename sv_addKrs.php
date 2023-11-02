
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$nim = $_POST["nim"];
$nppDos = $_POST["nppDos"];
$hari = $_POST["hari"];
$idMatkul = $_POST["idMatkul"];
$waktu = $_POST["waktu"];
$nilai = $_POST["nilai"];
$thAkd = $_POST["thAkd"];

    $sql = "insert into krs values('','$thAkd','$nim','$idMatkul','$nilai','$nppDos','$hari','$waktu')";
    mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    header("location:updateKrs.php");
?>