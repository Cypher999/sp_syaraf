<?php
class Hasil_diag extends Controller{
	public function Del(){
		if(isset($_SESSION["id"])){
		$del=$this->model("Model_diag")->delete($_GET["key"]);
		if($del){
			$_SESSION["alert"]="<h2>Data Sudah Dihapus</h2>";
			header("Location: ".BASE_URL."?a=Hasil_diag");
		}
		else{
			echo "Terjadi Kesalahan";
		}
		}
	}
	public function index(){
		$data["hasil_diag"]=$this->model("Model_diag")->read_data();
		$data["gej"]=$this->model("Model_gej")->read_data();
		if(isset($_SESSION["id"])){
		$this->view("Admin/hasil_diag/index",$data);
		}else{
			$this->view("Non_admin/hasil_diag/index",$data);
		}
	}
	public function prev(){
		$kd_gej=$this->model("Model_diag")->read_one($_GET["key"]);
		$result_data["nm_pasien"]=$kd_gej[0]["nm_pasien"];
		$result_data["nm_pendiag"]=$kd_gej[0]["nm_pendiag"];
		$result_data["tgl"]=$kd_gej[0]["tgl"];
		$daftar_penyakit=$this->model("Model_penyakit")->read_data();
		$find=FALSE;
		$i=0;
		$kd_pen="";
		while(($i<count($daftar_penyakit))&&(!$find)){
			$identified=0;
			$cek_ker=$this->model("Model_rule")->read_ker($daftar_penyakit[$i]["kd_pen"]);
			$jum_gej=$this->model("Model_rule")->length_ker($daftar_penyakit[$i]["kd_pen"]);
				foreach ($cek_ker as $ck_kr) {
				foreach ($kd_gej as $gj_in) {
					if($gj_in["kd_gej"]==$ck_kr["kd_gej"]){
						$identified+=1;
					}
				}
			}
			if(($identified==$jum_gej)&&($jum_gej>0)&&($identified==count($kd_gej))){
				$kd_pen=$daftar_penyakit[$i]["kd_pen"];
				$find=TRUE;
			
			
			}$i+=1;
			
		}
		if($find){
			$result_data["msg"]=TRUE;
			$result_data["get_ker"]=$this->model("Model_penyakit")->read_one($kd_pen);
		}
		else{
			$result_data["msg"]=FALSE;
		}
		$this->view("Admin/hasil_diag/result",$result_data);
	}
	public function insert(){
	$kd_gej=$_POST["gej"];
		$daftar_penyakit=$this->model("Model_penyakit")->read_data();
		$find=FALSE;
		$i=0;
		$kd_pen="";
		$form_data["tgl"]=date('Y/m/d h:i:s');
	while($i<count($kd_gej)){
		$form_data["kd_diag"]=random(5);
		$form_data["nm_pasien"]=htmlspecialchars($_POST["nm_pasien"]);
		$form_data["nm_pendiag"]=htmlspecialchars($_POST["nm_pendiag"]);
		
		$form_data["kd_gej"]=$kd_gej[$i];
		
		$sql=$this->model("Model_diag")->insert($form_data);
		$i++;
	}
	$i=0;
		while(($i<count($daftar_penyakit))&&(!$find)){
			$identified=0;
			$cek_ker=$this->model("Model_rule")->read_ker($daftar_penyakit[$i]["kd_pen"]);
			$jum_gej=$this->model("Model_rule")->length_ker($daftar_penyakit[$i]["kd_pen"]);
			
				foreach ($cek_ker as $ck_kr) {
				foreach ($kd_gej as $gj_in) {
					if($gj_in==$ck_kr["kd_gej"]){
						$identified+=1;
					}
				}
			}
			if(($identified==$jum_gej)&&($jum_gej>0)&&($identified==count($kd_gej))){
				$kd_pen=$daftar_penyakit[$i]["kd_pen"];
				$find=TRUE;
			}
			
			
			$i+=1;
			
		}
		if($find){
			$result_data["msg"]=TRUE;
			$result_data["nm_pasien"]=$form_data["nm_pasien"];
			$result_data["nm_pendiag"]=$form_data["nm_pendiag"];
			$result_data["tgl"]=$form_data["tgl"];
			$result_data["get_ker"]=$this->model("Model_penyakit")->read_one($kd_pen);
		}
		else{
			$result_data["msg"]=FALSE;
		}
		$this->view("Admin/hasil_diag/result",$result_data);
	}
}
?>