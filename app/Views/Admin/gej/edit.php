<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit Gejala</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<?php foreach($data as $dt){?>
						<form class="bordered update" action="?a=Gej/update&&key=<?php echo $_POST["a"];?>" method="post" enctype="multipart/form-data"> 
							<input class="form-control" name="nm" placeholder="gejala..." value="<?php echo $dt["nm_gej"];?>"><br>
							<input class="btn btn-primary" value="Simpan Perubahan" type="submit">
						</form>
						<?php } ?>
					</div>
				</div>
			</div>