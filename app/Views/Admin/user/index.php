
<html>
<head><title>Data User</title>
	<?php require_once 'app/Views/Admin/user/partials/header.php';?>
</head>
<body>
	<?php require_once 'app/Views/Admin/menu.php';?><br><br>
	<div class="container col-12 p-2">
		<div class="border p-4">
			<?php if(isset($_SESSION["alert"])){
			echo $_SESSION["alert"];
			unset($_SESSION["alert"]);
		}?>
			<h2>Data User</h2><br>
			<div class="card-header">
						<a href="#" data-toggle="modal" data-target="#modal-add" class="add"><i class="fas fa-plus" ></i> Add new</a>
					</div>
			<div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
<table class="table table-bordered col-md-8" id="dataTable" width="100%" cellspacing="0">
<thead>
                  <tr>
                    <th>Nama User</th>
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
                    <td><?php echo $dt["nm_user"];?></td>
                    <td><?php if($dt["id_user"]==$_SESSION["id"]){;?><input type="button" href="#" class="text-primary btn btn-small edit-nama" data-target="#modal-edit" data-toggle="modal" value="Edit nama" data-id="<?php echo $dt["id_user"];?>">
                    <input type='button' href="#" class="text-primary btn btn-small edit-pas" data-target="#modal-edit" data-toggle="modal" value="Edit password" data-id="<?php echo $dt["id_user"];?>"><?php } ?>   <input type="button" class="text-danger btn btn-small" href="?a=User/Del&&key=<?php echo $dt["id_user"];?>" value="Hapus Data"></td>
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
						<h2 class="modal-title">Tambah User</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=User/insert" method="post" enctype="multipart/form-data"> 
							<input class="form-control" placeholder="nama user..." name="nm"><br>
							<input class="form-control" type="password" placeholder="password..." name="ps"><br>
							<input class="form-control" type="password" placeholder="konfirmasi password..." name="kf"><br>
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
		<?php require_once 'app/Views/Admin/user/partials/js.php';?>
</body>

</html>
