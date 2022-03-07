<?php
class Gej extends Controller{
	public function index(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_gej")->read_data();
		$this->view("Admin/gej/index",$data);
		}else{
			header("Location: index.php");
		}
	}
	public function form_edit(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_gej")->read_one($_POST["a"]);
		$this->view("Admin/gej/edit",$data);
		}
	}
	public function Del(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_gej")->delete($_GET["key"]);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Dihapus</h5>";
			header("Location: ".BASE_URL."?a=Gej");
		}
		else{
			echo "Terjadi Kesalahan";
		}
	}
	}
	public function insert(){
		if(isset($_SESSION["id"])){
		$data["kd_gej"]="";
		$cek["kd_gej_len"]=$this->model("Model_gej")->length_data();
		if($cek["kd_gej_len"]<=0){
			$data["kd_gej"]="G1";
		}
		else{
			$cek["kd_gej_kontainer"]=array();
			$cek["kd_gej"]=$this->model("Model_gej")->read_data();

			foreach ($cek["kd_gej"] as $kd_gej) {
					$split=explode("G", $kd_gej["kd_gej"]);
					array_push($cek["kd_gej_kontainer"],$split[1]);
				}	
			sort($cek["kd_gej_kontainer"]);
			$data["kd_gej"]="G".($cek["kd_gej_kontainer"][count($cek["kd_gej_kontainer"])-1]+1);
		}
		
		$data["nm_gej"]=htmlspecialchars($_POST["nm"]);
		$cek_nm=$this->model("Model_gej")->read_nm($data["nm_gej"]);
		if($cek_nm<=0){
		$data=$this->model("Model_gej")->insert($data);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Ditambahkan</h5>";
			header("Location: ".BASE_URL."?a=Gej");
		}
		else{
			echo "Terjadi Kesalahan";
		}
		}
		else{
			echo "<script>alert('Data sudah ada');window.location.href='".BASE_URL."?a=Gej';</script>";	
		}
	}
	}

	public function update(){
		if(isset($_SESSION["id"])){
		$data["kd_gej"]=htmlspecialchars($_GET["key"]);
		$data["nm_gej"]=htmlspecialchars($_POST["nm"]);
		$cek_nm=$this->model("Model_gej")->read_nm($data["nm_gej"]);
		if($cek_nm<=0){
		$data=$this->model("Model_gej")->update($data);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Diedit</h5>";
			header("Location: ".BASE_URL."?a=Gej");
		}
		else{
			echo "Terjadi Kesalahan";
		}

		}
		else{
			echo "<script>alert('Data sudah ada');window.location.href='".BASE_URL."?a=Gej';</script>";	
		}
	}}
}
?>