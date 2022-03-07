
<html>
<head><title>Data Gejala</title>
	<?php require_once 'app/Views/Admin/gej/partials/header.php';?>
</head>
<body>
	<?php require_once 'app/Views/Admin/menu.php';?><br><br>
	<div class="container col-12 p-2">
		<div class="border p-4">
			<?php if(isset($_SESSION["alert"])){
			echo $_SESSION["alert"];
			unset($_SESSION["alert"]);
		}?>
			<h2>Data Gejala</h2><br>
			<div class="card-header">
				<a href="#" data-toggle="modal" data-target="#modal-add" class="add"><i class="fas fa-plus" ></i> Add new</a>
			</div>
			<div class="card mb-3">
          		<div class="card-body">
					<table class="table table-bordered col-md-8 table-responsive" id="dataTable" width="100%" cellspacing="0">
						<thead>
		                  <tr>
		                    <th>Nama Gejala</th>
		                    <th>Kontrol</th>
		                  </tr>
                		</thead>
		                <tfoot>
		                  <tr>
		                    <th>Nama Gejala</th>
		                    <th>Kontrol</th>
		                  </tr>
		                </tfoot>
                		<tbody>
							<?php foreach ($data as $dt) {?>
							  <tr>
			                    <td><?php echo $dt["nm_gej"];?></td>
			                    <td><a href="#" class="text-primary btn btn-small" data-target="#modal-edit" data-toggle="modal" title="Edit data"><i class="edit fas fa-edit" data-id="<?php echo $dt["kd_gej"];?>"></i></a>   <a class="text-danger btn btn-small" href="?a=Gej/Del&&key=<?php echo $dt["kd_gej"];?>" title="Hapus Data"><i class="fas fa-trash"></i></a></td>
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
						<h2 class="modal-title">Tambah Gejala</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=Gej/insert" method="post" enctype="multipart/form-data"> 
							<input class="form-control" placeholder="gejala..." name="nm"><br>
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
		<?php require_once 'app/Views/Admin/gej/partials/js.php';?>
</body>

</html>
