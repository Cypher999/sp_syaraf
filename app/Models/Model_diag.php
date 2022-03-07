<?php
class Model_diag{
	private $table="hasil_diag";
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$ker=$this->db->query("SELECT hasil_diag.*, gej.nm_gej FROM ".$this->table." INNER JOIN gej ON hasil_diag.kd_gej=gej.kd_gej ORDER BY hasil_diag.tgl")->result();
		return $ker;
	}

	public function read_one($a){
		$a=$this->db->escape_str($a);
		$ker=$this->db->query("SELECT hasil_diag.*,gej.nm_gej,gej.kd_gej FROM ".$this->table." INNER JOIN gej ON hasil_diag.kd_gej=gej.kd_gej WHERE hasil_diag.tgl='".$a."' ORDER BY hasil_diag.tgl")->result();
		return $ker;
	}

	public function read_gej($a){
		$a=$this->db->escape_str($a);
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE cek_gej='".$a."'")->num_rows();
		return $ker;
	}

	public function delete($a){
		$a=$this->db->escape_str($a);
		$ker=$this->db->query("DELETE FROM ".$this->table." WHERE tgl='".$a."'");
		return $ker;
	}

	public function insert($a){
		$a["kd_diag"]=$this->db->escape_str($a["kd_diag"]);
		$a["nm_pasien"]=$this->db->escape_str($a["nm_pasien"]);
		$a["nm_pendiag"]=$this->db->escape_str($a["nm_pendiag"]);
		$a["tgl"]=$this->db->escape_str($a["tgl"]);
		$a["kd_gej"]=$this->db->escape_str($a["kd_gej"]);
		$ker=$this->db->query("INSERT INTO ".$this->table." VALUES ('".$a["kd_diag"]."','".$a["nm_pasien"]."','".$a["nm_pendiag"]."','".$a["tgl"]."','".$a["kd_gej"]."')");
		return $ker;
	}
}
?>