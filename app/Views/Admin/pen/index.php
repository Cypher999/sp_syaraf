
<html>
<head><title>Data Penyakit</title>
	<?php require_once 'app/Views/Admin/pen/partials/header.php';?>
</head>
<body>
	<?php require_once 'app/Views/Admin/menu.php';?><br><br>
	<div class="container col-12 p-2">
		<div class="border p-4">
			<?php if(isset($_SESSION["alert"])){
			echo $_SESSION["alert"];
			unset($_SESSION["alert"]);
		}?>
			<h2>Data Penyakit</h2><br>
			<div class="card-header">
						<a href="#" data-toggle="modal" data-target="#modal-add" class="add"><i class="fas fa-plus" ></i> Add new</a>
					</div>
			<div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
<table class="table table-bordered col-md-8" id="dataTable" width="100%" cellspacing="0">
<thead>
                  <tr>
                    <th>Nama Penyakit</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th>Kontrol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama Penyakit</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th>Kontrol</th>
                  </tr>
                </tfoot>
                <tbody>
                
                
<?php foreach ($data as $dt) {?>
				  <tr>
                    <td><?php echo $dt["nm_pen"];?></td>
                    <td><?php echo $dt["des_pen"];?></td>
                    <td><ul><?php
                     $sol=explode(",", $dt["kd_sol"]);
                     foreach ($sol as $sl){
                     	$hasil=$this->model("Model_sol")->read_one($sl);
                     	echo "<li>".$hasil[0]["sol"]."</li>";
                     }
                     ?></ul>
                 	</td>
                    <td><a href="#" class="text-primary btn btn-small" data-target="#modal-edit" data-toggle="modal" title="Edit data"><i class="edit fas fa-edit" data-id="<?php echo $dt["kd_pen"];?>"></i></a>   <a class="text-danger btn btn-small" href="?a=Penyakit/Del&&key=<?php echo $dt["kd_pen"];?>" title="Hapus Data"><i class="fas fa-trash"></i></a></td>
                  </tr>
				<?php } ?>

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
						<h2 class="modal-title">Tambah Data Penyakit</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=Penyakit/insert" method="post" enctype="multipart/form-data"> 
							<Label>Nama Penyakit</Label>
							<input class="form-control" name="pen" placeholder="Nama Penyakit..." required=""><br>
							<Label>Deskripsi Penyakit</Label><br>
							<textarea class="form-control" name="des" col="10" row="5" placeholder="Deskripsi Penyakit"></textarea><br>
							<label>Solusi</label>
							<ul>
							<?php $sol=$this->model("Model_sol")->read_data();
							foreach ($sol as $sl) {?>
								<li><input type="checkbox" value="<?php echo $sl["kd_sol"];?>" name="sol[]"><?php echo $sl["sol"];?></li>
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
		<?php require_once 'app/Views/Admin/pen/partials/js.php';?>
</body>

</html>
