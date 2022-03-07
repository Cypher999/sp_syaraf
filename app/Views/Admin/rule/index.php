
<html>
<head><title>Data Rule</title>
	<?php require_once 'app/Views/Admin/rule/partials/header.php';?>
</head>
<body>
	<?php require_once 'app/Views/Admin/menu.php';?><br><br>
	<div class="container col-12 p-2">
		<div class="border p-4">
			<?php if(isset($_SESSION["alert"])){
			echo $_SESSION["alert"];
			unset($_SESSION["alert"]);
		}?>
			<h2>Data rule</h2><br>
			<div class="card-header">
						<a href="#" data-toggle="modal" data-target="#modal-add" class="add"><i class="fas fa-plus" ></i> Add new</a>
					</div>
			<div class="card mb-3">
          <div class="card-body">
<table class="table table-responsive table-bordered col-md-8" id="dataTable" width="100%" cellspacing="0">
<thead>
                  <tr>
                    <th>Nama penyakit</th>
                    <th>Gejala</th>
                    <th>Kontrol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama penyakit</th>
                    <th>Gejala</th>
                    <th>Kontrol</th>
                  </tr>
                </tfoot>
                <tbody>
                
                
<?php
$cek_data="";
 foreach ($data["show"]["rule"] as $rule) {
if($rule["nm_pen"]!=$cek_data){
	$cek_data=$rule["nm_pen"];
 	?>
				  <tr>
                    <td><?php echo $rule["nm_pen"]; ?></td>
                    <td><ul><?php
                     $gej=explode(",", $rule["cek_gej"]);
                     foreach ($gej as $gj){
                     	$hasil=$this->model("Model_gej")->read_one($gj);
                     	echo "<li>".$hasil[0]["nm_gej"]."</li>";
                     }
                     ?></ul>
                 	</td>
                    <td><div class="row"><div class="col"><a class="text-danger btn btn-small" href="?a=Rule/Del&&key=<?php echo $rule["kd_pen"];?>" title="Hapus Data"><i class="fas fa-trash"></i></a></div><div class="col"><a class="text-danger btn btn-small" title="Hapus Data"><i class="edit text-primary fas fa-edit" data-target="#modal-edit" data-toggle="modal" data-id="<?php echo $rule["kd_rule"];?>"></i></a></div></td>
                  </tr>
				<?php  }}?>

				</tbody>
				</table>
				</div>
          </div>
		</div>
		<div class="modal" id="modal-add">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Tambah rule</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=Rule/insert" method="post" enctype="multipart/form-data"> 
							<Label>Nama Penyakit Ikan</Label>
							<select name="pen" class="form-control">
								<?php foreach($data["form"]["penyakit"] as $pen){?>
									<option value="<?php echo $pen["kd_pen"];?>"><?php echo $pen["nm_pen"];?></option>
								<?php }?>
							</select><br>
							<label>Nama Gejala</label>
							<ul>
							<?php foreach ($data["form"]["gej"] as $gej) {?>
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
		<?php require_once 'app/Views/Admin/rule/partials/js.php';?>
</body>

</html>
