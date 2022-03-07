<?php
class Sol extends Controller{
	public function index(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_sol")->read_data();
		$this->view("Admin/sol/index",$data);
		}else{
			header("Location: index.php");
		}
	}
	public function form_edit(){
		$data=$this->model("Model_sol")->read_one($_POST["a"]);
		$this->view("Admin/sol/edit",$data);
	}
	public function Del(){
		if(isset($_SESSION["id"])){
		$data=$this->model("Model_sol")->delete($_GET["key"]);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Dihapus</h5>";
			header("Location: ".BASE_URL."?a=Sol");
		}
		else{
			echo "Terjadi Kesalahan";
		}}
	}
	public function insert(){
		if(isset($_SESSION["id"])){
		$data["kd_sol"]=random(5);
		$data["sol"]=htmlspecialchars($_POST["nm"]);
		$cek_nm=$this->model("Model_sol")->read_nm($data["sol"]);
		if($cek_nm<=0){
		$data=$this->model("Model_sol")->insert($data);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Ditambahkan</h5>";
			header("Location: ".BASE_URL."?a=Sol");
		}
		else{
			echo "Terjadi Kesalahan";
		}
		}
		else{
			$_SESSION["alert"]="<h5>data sudah ada</h5>";
			header("Location: ".BASE_URL."?a=Sol");
		}}
	}

	public function update(){
		if(isset($_SESSION["id"])){
		$data["kd_sol"]=htmlspecialchars($_GET["key"]);
		$data["sol"]=htmlspecialchars($_POST["nm"]);
		$cek_nm=$this->model("Model_sol")->read_nm($data["sol"]);
		if($cek_nm<=0){
		$data=$this->model("Model_sol")->update($data);
		if($data){
			$_SESSION["alert"]="<h5>Data Sudah Diedit</h5>";
			header("Location: ".BASE_URL."?a=Sol");
		}
		else{
			echo "Terjadi Kesalahan";
		}

		}
		else{
			$_SESSION["alert"]="<h5>Data Sudah ada</h5>";
			header("Location: ".BASE_URL."?a=Sol");
		}
	}}
}
?>