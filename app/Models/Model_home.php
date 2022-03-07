<?php
class Model_home{
	private $table=array("gej","penyakit","rule","sol","hasil_diag","user");
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$rows=array();
		$rows["gej"]=$this->db->query("SELECT * FROM ".$this->table[0])->num_rows();
		$rows["penyakit"]=$this->db->query("SELECT * FROM ".$this->table[1])->num_rows();
		$rows["rule"]=$this->db->query("SELECT rule.*, penyakit.*, gej.* FROM ".$this->table[2]." INNER JOIN penyakit ON rule.kd_pen=penyakit.kd_pen INNER JOIN gej ON rule.kd_gej=gej.kd_gej ORDER BY rule.kd_pen")->result();
		$cek_data="";
		$i=0;
		if(count($rows["rule"])>0){
			foreach ($rows["rule"] as $rule) {
				if($rule["nm_pen"]!=$cek_data){
					$cek_data=$rule["nm_pen"];
					$i+=1;
				}
			}	
		}
		$rows["rule"]=$i;
		$rows["sol"]=$this->db->query("SELECT * FROM ".$this->table[3])->num_rows();
		$rows["hasil_diag"]=$this->db->query("SELECT * FROM ".$this->table[4]." ORDER BY tgl desc")->result();
		$tgl="";
		$j=0;
		foreach ($rows["hasil_diag"] as $hasil_diag) {
			if($tgl!=$hasil_diag["tgl"]){
				$tgl=$hasil_diag["tgl"];
				$j+=1;
			}
		}
		$rows["hasil_diag"]=$j;
		$rows["user"]=$this->db->query("SELECT * FROM ".$this->table[5])->num_rows();
		return $rows;
	}
}
?>