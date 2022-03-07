<html>
<head><title>Home</title>
	<?php require_once 'app/Views/Admin/gej/partials/header.php';?>
</head>
<body>
	<?php require_once 'app/Views/Admin/menu.php';?>
	<div class="container col-12 p-5">
		<div class="jumbotron text-center  mb-3" style="margin-bottom: 0; background-color: #92aaed;" >
			<h3 align="middle">Selamat Datang Di</h3>
			<h3 align="middle">Sistem Pakar Penyakit Syaraf</h3>
		</div>
		<div class="card-deck">
			<div class="card mb-3">
				<div class="card-header">					
					<h2>Data Gejala Penyakit</h2>
				</div>
				<div class="card-body">
					<p><?php echo $data["gej"];?></p>
				</div>
				<div class="card-footer">
					<input class="btn btn-primary" type="button" value="Lihat Selengkapnya" onclick="window.location.href='<?php echo BASE_URL;?>?a=Gej'">
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">										
					<h2>Data Penyakit</h2>
				</div>
				<div class="card-body">					
					<p><?php echo $data["penyakit"];?></p>
				</div>
				<div class="card-footer">
					<input class="btn btn-primary" type="button" value="Lihat Selengkapnya" onclick="window.location.href='<?php echo BASE_URL;?>?a=Penyakit'">
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">										
					<h2>Data Solusi</h2>
				</div>
				<div class="card-body">					
					<p><?php echo $data["sol"];?></p>
				</div>
				<div class="card-footer">
					<input onclick="window.location.href='<?php echo BASE_URL;?>?a=Sol'" class="btn btn-primary" type="button" value="Lihat Selengkapnya">
				</div>				
			</div>
		</div>
		<div class="card-deck">
			<div class="card mb-3">
				<div class="card-header">					
					<h2>Rule Penyakit Ikan</h2>
				</div>
				<div class="card-body">					
					<p><?php echo $data["rule"];?></p>
				</div>
				<div class="card-footer">
					<input onclick="window.location.href='<?php echo BASE_URL;?>?a=Rule'" class="btn btn-primary" type="button" value="Lihat Selengkapnya">
				</div>
			</div>

			<div class="card mb-3">
				<div class="card-header">					
					<h2>Data Hasil Diagnosa</h2>
				</div>
				<div class="card-body">					
					<p><?php echo $data["hasil_diag"];?></p>
				</div>
				<div class="card-footer">
					<input onclick="window.location.href='<?php echo BASE_URL;?>?a=Hasil_diag'" class="btn btn-primary" type="button" value="Lihat Selengkapnya">
				</div>
			</div>
			
			<div class="card mb-3">
				<div class="card-header">					
					<h2>Data User</h2>
				</div>
				<div class="card-body">					
					<p><?php echo $data["user"];?></p>
				</div>
				<div class="card-footer">
					<input onclick="window.location.href='<?php echo BASE_URL;?>?a=User'" class="btn btn-primary" type="button" value="Lihat Selengkapnya">
				</div>
			</div>
		</div>
		<div class="jumbotron text-center" style="margin-bottom: 0; background-color:#92aaed">
			<p>Copyright :<?php echo date("Y");?></p>
		</div>
		<div class="modal" id="modal-signup">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Signup</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="#" method="post" enctype="multipart/form-data"> 
							<input class="form-control" placeholder="username..."><br>
							<input class="form-control" placeholder="password..."><br>
							<input class="form-control" placeholder="konfirmasi password..."><br>
							<input class="btn btn-primary" value="Daftar" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once 'app/Views/Admin/sol/partials/js.php';?>
</html>
