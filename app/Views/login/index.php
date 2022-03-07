<html>
<head><title>Home</title>
	<?php require_once 'app/Views/login/partials/header.php';?>
</head>
<body>
<div class="container col-md-5">
<div class="card"> 
	<div class="card-header">
		<h2>Sistem Pakar Penyakit Syaraf</h2>
	</div>
	<div class="card-body">
		<form action="?a=Home/login" method="post">
			<input type="text" name="nm" placeholder="nama user..." class="form-control"><br>
			<input type="password" name="ps" placeholder="password" class="form-control"><br>
			<div class="row">
				<div class="col">
					<input type="submit" value="Login" class="btn btn-primary">
				</div>
				<div class="col">
					<a href="index.php"><input type="button" value="Kembali" class="btn btn-secondary"></a>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</body>
<?php require_once 'app/Views/login/partials/js.php' ?>
</html>

