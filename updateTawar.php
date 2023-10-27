<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Daftar Penawaran Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
	<?php

	//memanggil file berisi fungsi2 yang sering dipakai
	require "fungsi.php";
	require "head.html";
    

    $sql = "select * from matkul a JOIN kultawar b ON (a.id = b.idmatkul) JOIN dosen c ON (c.npp=b.npp)";

    $hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	$kosong=false;
    if(mysqli_num_rows($hasil)== 0){
        $kosong=true;
    }
	?>

<div class="utama">
		<h2 class="text-center mt-3">Daftar Penawaran Mata Kuliah</h2>
		<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
		<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
		<span class="float-left">
			<a class="btn btn-success" href="addTawar.php">Tambah Data</a>
		</span>
		<span class="float-right">
			<form action="" method="post" class="form-inline">
				<button class="btn btn-success" type="submit">Cari</button>
				<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data penawaran..." autocomplete="off">
			</form>
		</span>
		</span>
		<br><br>
		<!-- <ul class="pagination">
			<?php
			//navigasi pagination
			//cetak navigasi back
			// if ($halAktif > 1) {
			// 	$back = $halAktif - 1;
			// 	echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
			// }
			// //cetak angka halaman
			// for ($i = 1; $i <= $jmlHal; $i++) {
			// 	if ($i == $halAktif) {
			// 		echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
			// 	} else {
			// 		echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
			// 	}
			// }
			// //cetak navigasi forward
			// if ($halAktif < $jmlHal) {
			// 	$forward = $halAktif + 1;
			// 	echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
			// }
			?>
		</ul> -->
		<!-- Cetak data dengan tampilan tabel -->
		<table class="table table-hover">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Mata Kuliah</th>
					<th>Nama Dosen</th>
					<th style="text-align: center">Hari</th>
					<th>Jam</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//jika data tidak ada
				if ($kosong) {
				?>
					<tr>
						<th colspan="6">
							<div class="alert alert-info alert-dismissible fade show text-center">
								<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
								Data tidak ada
							</div>
						</th>
					</tr>
					<?php
				} else {
					if ($awalData == 0) {
						$no = $awalData + 1;
					} else {
						$no = $awalData;
					}
					while ($row = mysqli_fetch_assoc($hasil)) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row["namamatkul"] ?></td>
							<td><?php echo $row["namadosen"] ?></td>
                            <td><?php echo $row["hari"] ?></td>
                            <td><?php echo $row["jamkul"] ?></td>

							
						</tr>
				<?php
						$no++;
					}
				}
				?>
			</tbody>
		</table>
	</div>

<script>
    $(document).ready(function(){
        $("#matkul").change(function(){
            var mk = $(this).val()
            $.post('ajaxTawar.php',{matkul:mk},function(data){
                if(data!=" ")
                {
                    $("dosen").html(data)
                }
            })
        })
    })
</script>
</body>

</html>