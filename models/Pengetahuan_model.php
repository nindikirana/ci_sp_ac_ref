<?php

class Pengetahuan_model extends CI_Model{
public $id;	
public $id_kerusakan;
public $id_gejala;
public $validasi;


public function __construct(){
	parent::__construct();
	$this->load->database();
}


public function insert(){
	$data =[
	'id_kerusakan'=>$this->id_kerusakan,
	'id_gejala' => $this->id_gejala];
	$this->db->insert('pengetahuan',$data);
	
}

public function detail(){
$this->db->select('*')
		 ->from('pengetahuan a')
		 ->join('kerusakan b', 'a.id_kerusakan=b.id_kerusakan')
		 ->join('gejala c', 'c.id_gejala=a.id_gejala')
		 ->where('a.id_kerusakan=',$this->id);
$query = $this->db->get();
return $query->result();
}

public function select_count(){
$this->db->select('*')
		 ->from('pengetahuan a')
		 ->join('kerusakan b', 'a.id_kerusakan=b.id_kerusakan')
		 ->join('gejala c', 'c.id_gejala=a.id_gejala')
		 ->group_by('a.id_kerusakan');
$query = $this->db->get();
return $query->num_rows();
}

public function delete(){
	$this->db->where('id_kerusakan',$this->id);
	$this->db->delete('pengetahuan');
}

public function select($limit, $start){
$this->db->select('*')
->from('pengetahuan a')
->join('kerusakan b','a.id_kerusakan=b.id_kerusakan')
->group_by('a.id_kerusakan')
->limit($limit, $start);
$query = $this->db->get();
return $query;
}


public function select1(){
$query = $this->db->get('kerusakan');
return $query->result();
}

public function select2(){
$query = $this->db->get('gejala');
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('pengetahuan a')
->join('kerusakan b', 'a.id_kerusakan=b.id_kerusakan')
->like('a.id_kerusakan', $kunci)
->or_like('b.nama_kerusakan', $kunci);
$query = $this->db->get();
return $query;
}

public function validasi_delete(){
	$this->where = array('id_kerusakan'=>$this->validasi);
	$this->db->select('*')
			 ->from('pengetahuan')
			 ->where($this->where);
	$query = $this->db->get();
	return $query->result();
} 


}