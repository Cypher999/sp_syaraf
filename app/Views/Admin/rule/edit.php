
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit rule</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=Rule/update&&key=<?php echo $_POST["a"];?>" method="post" enctype="multipart/form-data"> 
							<Label>Nama Penyakit Ikan</Label>
							<select name="pen" class="form-control">
								<?php foreach($data["form"]["pen"] as $pen){?>
									<option <?php if($data["gej_rule"][0]["kd_pen"]==$pen["kd_pen"]){echo "selected";}?> value="<?php echo $pen["kd_pen"];?>"><?php echo $pen["nm_pen"];?></option>
								<?php }?>
							</select><br>
							<label>Nama Gejala</label>
							<ul>
							<?php foreach ($data["form"]["gej"] as $gej) {?>
								<li><input 
									<?php foreach($data["gej_rule"] as $gej_rule){
										if($gej_rule["kd_gej"]==$gej["kd_gej"]){
											echo "checked";
										}
									}?>
									type="checkbox" value="<?php echo $gej["kd_gej"];?>" name="gej[]"><?php echo $gej["nm_gej"];?></li>
							<?php }?>
							</ul><br>
							<input class="btn btn-primary" value="Simpan" type="submit">
						</form>
					</div>
				</div>
			</div>