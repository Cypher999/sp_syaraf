<?php
class User extends Controller{
	public function index(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_user")->read_data();
		$this->view("Admin/user/index",$data);
		}else{
			header("Location: index.php");
		}
	}
	public function form_edit_nm(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_user")->read_one($_POST["a"]);
		$this->view("Admin/user/edit_nm",$data);
		}
	}

	public function form_edit_pas(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_user")->read_one($_POST["a"]);
		$this->view("Admin/user/edit_pas",$data);
		}
	}
	public function Del(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_user")->delete($_GET["key"]);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Dihapus</h5>";
			header("Location: ".BASE_URL."?a=User");
		}
		else{
			echo "Terjadi Kesalahan";
		}
	}
	}
	public function insert(){
		if(isset($_SESSION["id"])){
			if($_POST["ps"]==$_POST["kf"]){
		$data["id_user"]=random(5);
		$data["nm_user"]=htmlspecialchars($_POST["nm"]);
		$data["password"]=md5($_POST["ps"]);
		$cek_nm=$this->model("Model_user")->read_nm($data["nm_user"]);
		if($cek_nm<=0){
		$data=$this->model("Model_user")->insert($data);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Ditambahkan</h5>";
			header("Location: ".BASE_URL."?a=User");
		}
		else{
			echo "Terjadi Kesalahan";
		}
		}
		else{
			$_SESSION["alert"]="<h5>Nama Sudah Ada</h5>";
			header("Location: ".BASE_URL."?a=User");
		}
	}else{
		$_SESSION["alert"]="<h5>Password konfirmasi tidak sama</h5>";
			header("Location: ".BASE_URL."?a=User");
	}
}
	}

	public function update_nm(){
		if(($_SESSION["id"]==$_GET["key"])&&(isset($_SESSION["id"]))){
			if($_POST["ps"]==$_POST["kf"]){
				$data["id_user"]=htmlspecialchars($_GET["key"]);
		$data["nm_user"]=htmlspecialchars($_POST["nm"]);
		$cek_nm=$this->model("Model_user")->read_nm($data["nm_user"]);
		$nm_lm=$this->model("Model_user")->read_one($_GET["key"]);
		if(($cek_nm<=0)||($nm_lm[0]["nm_user"]==$data["nm_user"])){
		$data=$this->model("Model_user")->update_nm($data);
		if($data){
			$_SESSION["alert"]="<h5>Nama Sudah Diedit</h5>";
			header("Location: ".BASE_URL."?a=User");
		}
		else{
			echo "Terjadi Kesalahan";
		}

		}
		else{
			echo "<script>alert('Data sudah ada');window.location.href='".BASE_URL."?a=User';</script>";	
		}
	}else{
		$_SESSION["alert"]="<h5>Password konfirmasi tidak sama</h5>";
			header("Location: ".BASE_URL."?a=User");
	}}
	}

	public function update_pas(){
		if(($_SESSION["id"]==$_GET["key"])&&(isset($_SESSION["id"]))){
			$form_data["id_user"]=htmlspecialchars($_GET["key"]);
			$cek_pas=$this->model("Model_user")->read_one($_GET["key"]);
			if($cek_pas[0]["password"]==md5($_POST["lm"])){
				if($_POST["br"]==$_POST["kf"]){
					$form_data["password"]=md5($_POST["br"]);
					$update=$this->model("Model_user")->update_pas($form_data);
					if($update){
						$_SESSION["alert"]="<h5>Password Sudah dirubah</h5>";
						header("Location: ".BASE_URL."?a=User");					
					}else{
						echo "Terjadi kesalahan";
					}
				}else{
					$_SESSION["alert"]="<h5>Password Konfirmasi tidak sama</h5>";
					header("Location: ".BASE_URL."?a=User");					
				}
				
			}else{
				$_SESSION["alert"]="<h5>Password Lama tidak sama</h5>";
						header("Location: ".BASE_URL."?a=User");					
			}
			}
	}
}
?>