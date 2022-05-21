<?php

class Kerusakan_model extends CI_Model{
public $id;
public $nama_kerusakan;
public $definisi;
public $solusi;
public $cf;
public $gambar = array ();

public function __construct(){
	parent::__construct();
	$this->load->database();
}


public function insert(){
	$query = $this->db->query("select max(id_kerusakan) as max_id from kerusakan");
	$rows = $query->row();
	$kode= $rows->max_id;
	$noUrut=(int)substr($kode, 1, 2);
	$noUrut++;
	$char="P";
	$kode=$char.sprintf("%02s", $noUrut);
	$data =[
	'id_kerusakan'=>$kode,
	'nama_kerusakan'=>$this->nama_kerusakan,
	//'faktor_kepastian'=>$this->cf,
	//'definisi' => $this->definisi,
	'solusi' =>$this->solusi,
	'foto1' => $this->gambar[0]];
	//'foto2' => $this->gambar[1],
	//'foto3' => $this->gambar[2]];
	$this->db->insert('kerusakan',$data);
	
}

public function update(){
	$data =[
	'nama_kerusakan'=>$this->nama_kerusakan,
	//'definisi' => $this->definisi,
	'solusi'=> $this->solusi,
	'foto1' => $this->gambar[0],
	'foto2' => $this->gambar[1],
	'foto3' => $this->gambar[2]
	];
	$this->db->where('id_kerusakan',$this->id);
	$this->db->update('kerusakan',$data);
}

public function detail(){
$this->db->select('*')
		 ->from('kerusakan')
		 ->where('id_kerusakan=',$this->id);
$query = $this->db->get();
return $query->row();
}

public function delete(){
	$array = array('pengetahuan','kerusakan');
	$this->db->where('id_kerusakan',$this->id);
	$this->db->delete($array);
}

public function select(){
$query = $this->db->get('kerusakan');
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('kerusakan')
->like('id_kerusakan', $kunci)
->or_like('nama_kerusakan', $kunci);
$query = $this->db->get();
return $query->result();
} 


}