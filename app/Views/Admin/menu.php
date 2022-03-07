<?php
$nm_user=$this->model("Model_user")->read_one($_SESSION["id"]);
$nm_user=$nm_user[0]["nm_user"];
?>
<nav class="navbar navbar-expand-md bg-success navbar-dark" style="position: fixed; z-index: 1000;width: 100%">
	<a class="navbar-brand" href="#">User : <?php echo $nm_user;?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsiblenavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<div class='nav-link'>
					<a class="btn sing-it" href="index.php">Home</a>
				</div>
			</li>
			<li class="nav-item">
				<div class="dropdown nav-link">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Menu data</button>
					<div class="dropdown-menu">
						<a class="btn dropdown-item" href="?a=Gej">Data gejala</a>
						<a class="btn dropdown-item" href="?a=Penyakit">Data penyakit</a>
						<a class="btn dropdown-item" href="?a=Sol">Data solusi</a>
						<a class="btn dropdown-item" href="?a=Rule">Data rule</a>
						<a class="btn dropdown-item" href="?a=Hasil_diag">Data hasil diagnosa</a>
						<a class="btn dropdown-item" href="?a=User">Data user</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<div class='nav-link'>
					<a class="btn sing-it" href="?a=Home/logout">Logout</a>
				</div>
			</li>
		</ul>
	</nav>