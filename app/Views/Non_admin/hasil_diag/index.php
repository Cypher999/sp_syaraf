
<html>
<head><title>Hasil diagnosa</title>
	<?php require_once 'app/Views/Non_admin/hasil_diag/partials/header.php';?>
</head>
<body>
	<?php require_once 'app/Views/Non_admin/menu.php';?><br><br>
	<div class="container col-12 p-2">
		<div class="border p-4">
            <?php if(isset($_SESSION["alert"])){
            echo $_SESSION["alert"];
            unset($_SESSION["alert"]);
        }?>
			<h2>Data hasil diagnosa</h2><br>
			<div class="card-header">
						<a href="#" data-toggle="modal" data-target="#modal-add" class="add"><i class="fas fa-plus" ></i> Add new</a>
					</div>
			<div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
<table class="table table-bordered table-responsive col-md-8" id="dataTable" width="100%" cellspacing="0">
<thead>
                  <tr>
                    <th>Tanggal diagnosa</th>
                    <th>Nama Pasien</th>
                    <th>Nama Pendiagnosa</th>
                    <th>Gejala</th>
                    <th>Kontrol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>                    
                    <th>Tanggal diagnosa</th>
                    <th>Nama Pasien</th>
                    <th>Nama Pendiagnosa</th>
                    <th>Gejala</th>
                    <th>Kontrol</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php 
                $tgl="";
                foreach ($data["hasil_diag"] as $hasil_diag) {
                	if($tgl!=$hasil_diag["tgl"]){
                		$tgl=$hasil_diag["tgl"];
                	?>
				<tr>
                    
                    <td><?php echo $hasil_diag["tgl"];?></td>
                    <td><?php echo $hasil_diag["nm_pasien"];?></td>
                    <td><?php echo $hasil_diag["nm_pendiag"];?></td>
                    <td><ul><?php 
                    	$hasil_gej=$this->model("Model_diag")->read_one($hasil_diag["tgl"]);
                    	foreach ($hasil_gej as $hs_gj) {
                    		echo "<li>".$hs_gj["nm_gej"]."</li>";
                    	}?></ul></td>
                    <td>
                    	<a class="text-danger btn btn-small" href="?a=Hasil_diag/prev&&key=<?php echo $hasil_diag["tgl"];?>" title="Preview"><i class="fa fa-search"></i></a></td>
                </tr>
                <?php }}?>
				</tbody>
				</table>
				</div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
		</div>
		<div class="modal" id="modal-add">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Diagnosa</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=Hasil_diag/insert" method="post" enctype="multipart/form-data"> 
							<Label>Nama Pasien</Label>
							<input type="text" name="nm_pasien" class="form-control" placeholder="nama pasien..">
							<Label>Pendiagnosa</Label>
							<input type="text" name="nm_pendiag" class="form-control" placeholder="nama pendiagnosa..">
							<label>Nama Gejala</label>
							<ul>
							<?php foreach ($data["gej"] as $gej) {?>
								<li><input type="checkbox" value="<?php echo $gej["kd_gej"];?>" name="gej[]"><?php echo $gej["nm_gej"];?></li>
							<?php }?>
							</ul><br>
							<input class="btn btn-primary" value="Simpan" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modal-edit">
			
		</div>
	</div>
	
		<div class="jumbotron text-center" style="margin-bottom: 0">
			<p>Copyright :2020</p>
		</div>
		<?php require_once 'app/Views/Non_admin/hasil_diag/partials/js.php';?>
</body>

</html>
