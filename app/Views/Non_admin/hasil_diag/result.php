
<html>
<head><title>Hasil Diagnosa</title>
	<?php require_once 'app/Views/Admin/rule/partials/header.php';?>
</head>
<body>
<?php if ($data["msg"]==TRUE){?>
<h2 align='middle'>DINAS PETERNAKAN DAN PERIKANAN</h2>
<h3 align='middle'>KOTA SUNGAI PENUH</h3>
<hr>
<h3>HASIL DIAGNOSA PENYAKIT IKAN</h3>
<table class="table table-bordered">
<tr>
	<td>Nama Penyakit</td>
	<td>:</td>
	<td><?php echo $data["get_ker"][0]["nm_pen"];?></td>
</tr>
<tr>
	<td>Deskripsi Penyakit</td>
	<td>:</td>
	<td><?php echo $data["get_ker"][0]["des_pen"];?></td>
</tr>
<tr>
	<td>Solusi</td>
	<td>:</td>
	<td><ul><?php $sol=explode(",",$data["get_ker"][0]["kd_sol"]);
	 foreach($sol as $sl){
		$res_sol=$this->model("Model_sol")->read_one($sl);
		echo "<li>".$res_sol[0]["sol"]."</li>";
	}?></ul></td>
</tr>
</table><br>
<div id="button-opt">
<a href="?a=Hasil_diag">Kembali</a>
<a onclick="window.print()">Cetak</a>
</div>
<?php } else{?>
<h2> Penyakit Tidak ditemukan </h2>
<a href="?a=Hasil_diag">Kembali</a>
<?php } ?>
</body>
<script>
</script>
</html>
