<?php
class Model_rule{
	private $table="rule";
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$ker=$this->db->query("SELECT rule.*, penyakit.*, gej.* FROM ".$this->table." INNER JOIN penyakit ON rule.kd_pen=penyakit.kd_pen INNER JOIN gej ON rule.kd_gej=gej.kd_gej ORDER BY rule.kd_pen")->result();
		return $ker;
	}
	public function read_one($a){
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_rule='".$a."'")->result();
		return $ker;
	}

	public function read_gej_one($a){
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_pen='".$a."'")->result();
		return $ker;
	}


	public function length_ker($a){
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_pen='".$a."'")->num_rows();
		return $ker;
	}

	public function length_gej($a){
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE cek_gej='".$a."'")->num_rows();
		return $ker;
	}
	public function read_ker($a){
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_pen='".$a."'")->result();
		return $ker;
	}
	public function get_gej($a){
		$ker=$this->db->query("SELECT rule.kd_rule, ker.kd_sol,ker.des_ker,ker.nm_ker,ker.kd_pen, gej.nm_gej, rule.cek_gej FROM ".$this->table." INNER JOIN ker ON rule.kd_pen=ker.kd_pen INNER JOIN gej ON rule.kd_gej=gej.kd_gej where rule.cek_gej='".$a."' ORDER BY rule.kd_pen ")->result();
		return $ker;
	}
	public function read_gej($a){
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE cek_gej='".$a."'")->num_rows();
		return $ker;
	}

	public function delete($a){
		$ker=$this->db->query("DELETE FROM ".$this->table." WHERE kd_pen='".$a."'");
		return $ker;
	}

	public function insert($a){
		$ker=$this->db->query("INSERT INTO ".$this->table." VALUES ('".$a["kd_rule"]."','".$a["kd_pen"]."','".$a["kd_gej"]."','".$a["cek_gej"]."')");
		return $ker;
	}

	public function update($a){
		$ker=$this->db->query("UPDATE ".$this->table." SET kd_pen='".$a["kd_pen"]."', des_ker='".$a["des_ker"]."', kd_sol='".$a["kd_sol"]."' where kd_rule='".$a["kd_rule"]."'");
		return $ker;
	}
}
?>