<?php
require "fungsi.php";
$type = $_GET['type'];

//ternary (mirip if else tapi cuma sebaris)
$param = isset($_GET['nim']) ? $_GET['nim'] : null;

if ($type == 'krs') {



    // echo $type;
    // echo is_null($param) ? "tidak ada parameter" : $param;

    //untuk php v.8 keatas
    // generatepdf(html: "krsmhs.php", filename: 'krs_' . $param);

    //untuk php v.8 kebawah
    header("location:krsmhs.php?nim=" . $param);
} else {
    echo "operasi gagal";
}
