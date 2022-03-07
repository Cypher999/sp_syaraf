<?php
class Rule extends Controller{
	public function index(){
		if(isset($_SESSION["id"])){
		$data["show"]["rule"]=$this->model("Model_rule")->read_data();

		$data["form"]["penyakit"]=$this->model("Model_penyakit")->read_data();
		$data["form"]["gej"]=$this->model("Model_gej")->read_data();
		$this->view("Admin/rule/index",$data);
		}else{
			header("Location: index.php");
		}
	}
	public function form_edit(){
		if(isset($_SESSION["id"])){
		$read_rule=$this->model("Model_rule")->read_one($_POST["a"]);
		$data["gej_rule"]=$this->model("Model_rule")->read_gej_one($read_rule[0]["kd_pen"]);
		$data["form"]["pen"]=$this->model("Model_penyakit")->read_data();
		$data["form"]["gej"]=$this->model("Model_gej")->read_data();
		$this->view("Admin/rule/edit",$data);
	}
	}
	public function Del(){
		if(isset($_SESSION["id"])){
		$del=$this->model("Model_rule")->delete($_GET["key"]);
		if($del){
			$_SESSION["alert"]="<h5>Data Sudah Dihapus</h5>";
			header("Location: ".BASE_URL."?a=Rule");
		}
		else{
			echo "Terjadi Kesalahan";
		}}
	}
	public function Insert(){
		if(isset($_SESSION["id"])){
		$err=FALSE;
		$gej_arr=array();
		for($i=0;$i<count($_POST["gej"]);$i++){
			$wadah=explode("G", $_POST["gej"][$i]);
			array_push($gej_arr, $wadah[1]);
		}
		sort($gej_arr);
		for($i=0;$i<count($gej_arr);$i++){
			$gej_arr[$i]="G".$gej_arr[$i];
		}
		$gj=implode(",", $gej_arr);
		$form_data["kd_pen"]=htmlspecialchars($_POST["pen"]);
		$form_data["cek_gej"]=$gj;
		$cek_ker=$this->model("Model_rule")->length_ker($form_data["kd_pen"]);
		$cek_gej=$this->model("Model_rule")->length_gej($form_data["cek_gej"]);
		if(($cek_ker==0)&&($cek_gej==0)){
		foreach ($_POST["gej"] as $gej) {
			$form_data["kd_rule"]=random(5);
			$form_data["kd_gej"]=htmlspecialchars($gej);
			$in=$this->model("Model_rule")->insert($form_data);
			if(!$in){
				$err=TRUE;
				break;
				echo "Terjadi Kesalahan";
				exit();
			}
		}
		if(!$err){
			$_SESSION["alert"]="<h5>Data Sudah Ditambahkan</h5>";
			header("Location: ".BASE_URL."?a=Rule");
		}
		}
		else{
			$_SESSION["alert"]="<h5>Data Sudah ada</h5>";
			header("Location: ".BASE_URL."?a=Rule");
		}
	}
}	

	public function update(){
		if(isset($_SESSION["id"])){
			$data_lm=$this->model("Model_rule")->read_one($_GET["key"]);
			$gej_arr=array();
			for($i=0;$i<count($_POST["gej"]);$i++){
				$wadah=explode("G", $_POST["gej"][$i]);
				array_push($gej_arr, $wadah[1]);
			}
			sort($gej_arr);
			for($i=0;$i<count($gej_arr);$i++){
				$gej_arr[$i]="G".$gej_arr[$i];
			}
			$kd_pen_lm=$data_lm[0]["kd_pen"];
			$kd_gej_lm=$data_lm[0]["cek_gej"];
			$gj=implode(",", $_POST["gej"]);
			$form_data["kd_pen"]=htmlspecialchars($_POST["pen"]);
			$form_data["cek_gej"]=implode(",", $gej_arr);
			$cek_pen=$this->model("Model_rule")->length_ker($form_data["kd_pen"]);
			$cek_gej=$this->model("Model_rule")->length_gej($form_data["cek_gej"]);
			if((($cek_pen>0)&&($form_data["kd_pen"]!=$kd_pen_lm))||(($cek_gej>0)&&($form_data["cek_gej"]!=$data_lm[0]["cek_gej"]))){
				$_SESSION["alert"]="<h5>Data Sudah ada</h5>";
				header("Location: ".BASE_URL."?a=Rule");		
			}
			else{
				$this->model("Model_rule")->delete($data_lm[0]["kd_pen"]);
				foreach ($_POST["gej"] as $gej) {
				$form_data["kd_rule"]=random(5);
				$form_data["kd_gej"]=htmlspecialchars($gej);
				$in=$this->model("Model_rule")->insert($form_data);
				if(!$in){
					$err=TRUE;
					break;
					echo "Terjadi Kesalahan";
					}
				}
				if(!$err){
					$_SESSION["alert"]="<h5>Data Sudah Ditambahkan</h5>";
					header("Location: ".BASE_URL."?a=Rule");
				}
			}
		}
	}
}
?>
