<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit Kerusakan</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=Penyakit/update&&key=<?php echo $_POST["a"];?>" method="post" enctype="multipart/form-data">
						<?php foreach ($data["pen"] as $pen) {?>
							<Label>Nama Penyakit</Label>
							<input class="form-control" name="pen" placeholder="Nama Kerusakan..." required="" value="<?php echo $pen["nm_pen"];?>"><br>
							<Label>Deskripsi Penyakit</Label><br>
							<textarea class="form-control" name="des"  col="10" row="5" placeholder="Deskripsi Kerusakan"><?php echo $pen["des_pen"];?></textarea><br>
							<label>Solusi</label>
							<ul>
							<?php 
							foreach ($data["sol"] as $sol) {?>
								<li><input type="checkbox" value="<?php echo $sol["kd_sol"];?>"
									<?php foreach ($data["sol_lm"] as $sol_lm) {
									if($sol["kd_sol"]==$sol_lm){ echo "checked";}}?>
								 name="sol[]"><?php echo $sol["sol"];?></li>
							<?php }?>
							</ul><br>
						<?php } ?>
							<input class="btn btn-primary" value="Simpan" type="submit">
						</form>
					</div>
				</div>
			</div>