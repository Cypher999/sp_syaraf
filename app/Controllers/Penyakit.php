<?php
class Penyakit extends Controller{
	public function index(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_penyakit")->read_data();
		$this->view("Admin/pen/index",$data);
	}else{
			header("Location: index.php");
		}
	}
	public function form_edit(){
		if(isset($_SESSION["id"])){
		$data["pen"]=$this->model("Model_penyakit")->read_one($_POST["a"]);
		$data["sol_lm"]=explode(",", $data["pen"][0]["kd_sol"]);
		$data["sol"]=$this->model("Model_sol")->read_data();
		$this->view("Admin/pen/edit",$data);
	}
	}
	public function Del(){
		if(isset($_SESSION["id"])){
		$del=$this->model("Model_penyakit")->delete($_GET["key"]);
		if($del){
			$_SESSION["alert"]="<h5>Data Sudah Dihapus</h5>";
			header("Location: ".BASE_URL."?a=Penyakit");
		}
		else{
			echo "Terjadi Kesalahan";
		}
	}
	}
	public function Insert(){
		if(isset($_SESSION["id"])){
		$data["kd_pen"]="";
		$cek["kd_pen_len"]=$this->model("Model_penyakit")->length_data();
		if($cek["kd_pen_len"]<=0){
			$data["kd_pen"]="P1";
		}
		else{
			$cek["kd_pen_kontainer"]=array();
			$cek["kd_pen"]=$this->model("Model_penyakit")->read_data();

			foreach ($cek["kd_pen"] as $kd_pen) {
					array_push($cek["kd_pen_kontainer"],str_replace("P", "", $kd_pen["kd_pen"]));
				}	
			sort($cek["kd_pen_kontainer"]);
			$data["kd_pen"]="P".($cek["kd_pen_kontainer"][count($cek["kd_pen_kontainer"])-1]+1);
		}
		$form_data["kd_pen"]=$data["kd_pen"];
		$form_data["nm_pen"]=htmlspecialchars($_POST["pen"]);
		$form_data["des_pen"]=htmlspecialchars($_POST["des"]);
		$form_data["kd_sol"]=implode(",", $_POST["sol"]);
		$cek=$this->model("Model_penyakit")->read_nm($form_data["nm_pen"]);
		if($cek<=0){
		$in=$this->model("Model_penyakit")->insert($form_data);
		if($in){
			$_SESSION["alert"]="<h5>Data Sudah Ditambah</h5>";
			header("Location: ".BASE_URL."?a=Penyakit");
		}
		else{
			echo "Terjadi Kesalahan";
		}
	}
	else{
		$_SESSION["alert"]="<h5>Nama sudah ada</h5>";
		header("Location: ".BASE_URL."?a=Penyakit");
	}	
}
}
	public function Update(){
		if(isset($_SESSION["id"])){
		$form_data["kd_pen"]=htmlspecialchars($_GET["key"]);
		$form_data["nm_pen"]=htmlspecialchars($_POST["pen"]);
		$form_data["des_pen"]=htmlspecialchars($_POST["des"]);
		$form_data["kd_sol"]=implode(",", $_POST["sol"]);
		$cek=$this->model("Model_penyakit")->read_nm($form_data["nm_pen"]);
		$nm_lm=$this->model("Model_penyakit")->read_one($form_data["kd_pen"]);
		if($cek<=0||$form_data["nm_pen"]==$nm_lm[0]["nm_pen"]){
		$in=$this->model("Model_penyakit")->update($form_data);
		if($in){
			$_SESSION["alert"]="<h5>Data Sudah Diupdate</h5>";
			header("Location: ".BASE_URL."?a=Penyakit");
		}
		else{
			echo "Terjadi Kesalahan";
		}
	}else{
			$_SESSION["alert"]="<h5>Data Sudah ada</h5>";
			header("Location: ".BASE_URL."?a=Penyakit");
		}
	}
}
}
?>