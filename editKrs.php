<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik:Edit Data KRS</title>
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
	$idKrs = dekripsiurl($_GET["kode"]);
	$sql="select * from krs where idKrs='$idKrs'";
	$qry=mysqli_query($koneksi,$sql);
	if(mysqli_num_rows($qry) == 0){
		echo "<script>
		alert('idkrs tidak ditemukan');
		javascript:history.go(-1);</script>";
		exit();
	}

	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">Edit Mata Kuliah</h2>	
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editKrs.php">
      <input value=<?= $row["idKrs"] ?> type="hidden" class="form-control" name="idKrs" required>
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="idmatkul" class="form-label">Nama Mahasiswa:</label>
            <input readonly class="form-control" type="text" name="nim" id="mhs" value=<?php echo $row['nim']; ?> required style="width: 100%`; background-color: #fff">
					</div>
        </div>
        <div class="row">
					<div class="form-group mb-3 col-12">
						<label for="dosen" class="form-label">Nama Dosen:</label>
            <input readonly class="form-control" type="text" name="nppDos" id="dosen" value=<?php echo $row['nppDos']; ?> required style="width: 100%`; background-color: #fff">
					</div>
        </div>
        <div class="row">
          <div class="form-group mb-3 col-12">
						<label for="matkul">Nama Mata Kuliah:</label>
						<div class="d-flex justify-content-between" id="klpGroup">
							<input readonly class=" form-control" type="text" name="idMatkul" id="idmatkul" style="width:100% ; background-color: #fff" value=<?php echo $row['idMatkul']; ?> required>
						</div>
					</div>
        </div>
        <div class="row">
                    <div class="form-group mb-3 col-3">
                       <label for="npp">Nilai</label>
                       <select class="form-select px-2 w-100" name="nilai" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                               <option value='' disabled selected>Pilih Nilai</option>
                               <option value="A" <?= $row['nilai'] == "A"? ' selected="selected"' : ''; ?>>A</option>
                               <option value="B" <?= $row['nilai'] == "B"? ' selected="selected"' : ''; ?>>B</option>
                               <option value="C" <?= $row['nilai'] == "C"? ' selected="selected"' : ''; ?>>C</option>
                               <option value="D" <?= $row['nilai'] == "D"? ' selected="selected"' : ''; ?>>D</option>
                               <option value="E" <?= $row['nilai'] == "E"? ' selected="selected"' : ''; ?>>E</option>
                       </select>
                   </div>
                   <div class="form-group mb-3 col-3">
                        <label for="hari">Hari</label>
                        <select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Hari</option>
                            <option value="Senin" <?= $row['hari'] == "Senin"? ' selected="selected"' : ''; ?>>Senin</option>
                            <option value="Selasa" <?= $row['hari'] == "Selasa"? ' selected="selected"' : ''; ?>>Selasa</option>
                            <option value="Rabu" <?= $row['hari'] == "Rabu"? ' selected="selected"' : ''; ?>>Rabu</option>
                            <option value="Kamis" <?= $row['hari'] == "Kamis"? ' selected="selected"' : ''; ?>>Kamis</option>
                            <option value="Jumat" <?= $row['hari'] == "Jumat"? ' selected="selected"' : ''; ?>>Jumat</option>
                        </select>
                  </div>
                  <div class="form-group mb-3 col-3">
                        <label for="waktu">Waktu</label>
                        <select class="form-select px-2 w-100" name="waktu" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Jam</option>
                            <option value="07.00-08.40" <?= $row['waktu'] == "07.00-08.40"? ' selected="selected"' : ''; ?>>07.00-08.40</option>
                            <option value="07.00-09.30" <?= $row['waktu'] == "07.00-09.30"? ' selected="selected"' : ''; ?>>07.00-09.30</option>
                            <option value="08.40-10.20" <?= $row['waktu'] == "08.40-10.20"? ' selected="selected"' : ''; ?>>08.40-10.20</option>
                            <option value="10.20-12.00" <?= $row['waktu'] == "10.20-12.00"? ' selected="selected"' : ''; ?>>10.20-12.00</option>
                            <option value="12.30-14.10" <?= $row['waktu'] == "12.30-14.10"? ' selected="selected"' : ''; ?>>12.30-14.10</option>
                            <option value="12.30-15.00" <?= $row['waktu'] == "12.30-15.00"? ' selected="selected"' : ''; ?>>12.30-15.00</option>
                            <option value="14.10-16.20" <?= $row['waktu'] == "14.10-16.20"? ' selected="selected"' : ''; ?>>14.10-16.20</option>
                            <option value="15.30-18.00" <?= $row['waktu'] == "15.30-18.00"? ' selected="selected"' : ''; ?>>15.30-18.00</option>
                            <option value="16.20-18.00" <?= $row['waktu'] == "16.20-18.00"? ' selected="selected"' : ''; ?>>16.20-18.00</option>
                            <option value="18.30-20.10" <?= $row['waktu'] == "18.30-20.10"? ' selected="selected"' : ''; ?>>18.30-20.10</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label for="npp">Tahun Akademik</label>
                        <div class="d-flex justify-content-between" id="klpGroup">
                            <input class=" form-control" type="text" name="thAkd" id="thAkd" style="width:100%" required>
                        </div>
                    </div>
        </div>
        
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
		</div>
	</div>
	<!-- <script>
		$('#submit').on('click',function(){
			var idmatkul 		= $('#idmatkul').val();
			var namamatkul	= $('#namamatkul').val();
			var sks 	      = $('#sks').val();
			var jns 	      = $('#jns').val();
			var smt 	      = $('#smt').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMatkul.php",
				data	: {idmatkul:idmatkul, namamatkul:namamatkul, sks:sks, jns:jns, smt:smt}
			});
		});
	</script> -->
</body>
</html>