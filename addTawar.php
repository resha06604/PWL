<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informastesti Akademik::Tambah Data Penawaran</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require "head.html";
	require "fungsi.php";
    // $rs_matkul = ('matkul');
    $q = "select * from matkul";
    $rs_matkul = mysqli_query($koneksi, $q);
    
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Tambah Data Penawaran</h2>
		<form action="saveJadwal.php" method="post"></form>
            <div class="form-group">
                <label for="matkul">Mata Kuliah</label>
                <select name="matkul" id="matkul" class="form-control">
                    <option disabled selected>Pilih Mata Kuliah</option>
                    <?php
                    while($data_matkul = mysqli_fetch_object($rs_matkul))
                    {
                    ?>
                        <option value="<?php echo $data_matkul->id?>"><?php echo $data_matkul->idmatkul,"-",$data_matkul->namamatkul?></option>
                    <?php
                    }
                    
                    ?>

                </select>
            </div>
            <div class="form-group">
                <select name="dosen" id="dosen" class="form-control">
                    <option dosabled selected>- Pilih Dosen -</option>
                </select>
            </div>
	</div>
</body>

</html>