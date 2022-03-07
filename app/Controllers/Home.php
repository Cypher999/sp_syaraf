<?php
class Home extends Controller{
	public function index(){
		if(isset($_SESSION["id"])){
			$data=$this->model("Model_home")->read_data();
			$this->view("Admin/home/index",$data);
	}
	else{
		$this->view("Non_admin/home/index");
	}
}

public function form_login(){
	$this->view("login/index");
}

public function login(){
	$data["nm"]=htmlspecialchars($_POST["nm"]);
	$data["ps"]=md5($_POST["ps"]);
	$cek_login=$this->model("Model_user")->cek_login($data);
	if($cek_login>0){
		$hasil_login=$this->model("Model_user")->hasil_login($data);
		$_SESSION["id"]=$hasil_login[0]["id_user"];
		echo "<script>alert('Login berhasil');window.location.href='".BASE_URL."';</script>";
	}
	else{
		echo "<script>alert('Username atau password salah');window.location.href='".BASE_URL."';</script>";
	}
}

public function logout(){
	session_unset();
	session_destroy();
	echo "<script>window.location.href='".BASE_URL."';</script>";
}
}
?>