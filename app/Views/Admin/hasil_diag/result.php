
<html>
<head><title>Hasil Diagnosa</title>
	<?php $this->view("admin/hasil_diag/partials/header");?>
</head>
<body>
<?php if ($data["msg"]==TRUE){?>
<h2 align='middle'>RUMAH SAKIT UMUM MAYJEN H.A. THALIB</h2>
<h3 align='middle'>KOTA SUNGAI PENUH</h3>
<hr>
<h3 align='middle'>HASIL DIAGNOSA PENYAKIT SYARAF</h3><br>
<table>
<tr><td>Nama Pasien</td><td>:</td><td><?php echo $data["nm_pasien"];?></td></tr>
<tr><td>Nama Pendiagnosa</td><td>:</td><td><?php echo $data["nm_pendiag"];?></td></tr>
<tr><td>Tanggal Diagnosa</td><td>:</td><td><?php echo $data["tgl"];?></td></tr>
</table><br>

<p>Berikut adalah hasil diagnosa penyakit syaraf</p>
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
<div align="right" style="padding-right:100px">
<table align='middle'>
<tr><td>Sungai penuh <?php echo date('d-m-Y');?></td></tr>
<tr><td>Ditanda tangani oleh</td></tr>
<tr><td style="height:200px"></td></tr>
<tr><td><?php echo $data["nm_pendiag"];?></td></tr>
</table>
</div>
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
