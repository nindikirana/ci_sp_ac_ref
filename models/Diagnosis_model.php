<?php

class Diagnosis_model extends CI_Model{
public $id;
public $id1;
public $id2;
public $tanggal;
public $id_konsultasi;
public $id_gejala = array ();
public $id_kerusakan = array();
public $id_pengguna = array();
public $id_penggunaa;
//public $nilai_cf;
public $status = array();
public $baris;
public $isi_gejala;
public $definisi;
public $solusi;
public $i = 0;
public $gambar = array ();

public function __construct(){
	parent::__construct();
	$this->load->database();
}


public function insert(){
	date_default_timezone_set('Asia/Jakarta');
	$data =[
	'id_kerusakan'=>$this->id1,
	//'tingkat_kepercayaan'=>$this->nilai_cf,
	'id_pengguna' => $this->id2,
	'tanggal' =>date("Y-m-d H:i:s")];
	$this->db->insert('hasil_diagnosa',$data);
	
}	

public function tampil_diagnosis(){
$this->db->select('*')
->from('hasil_diagnosa a')
->join('pengguna b', 'a.id_pengguna=b.id_pengguna')
->where('b.username', $this->session->userdata('user_pengguna'));
$query = $this->db->get();
return $query->num_rows();
}


public function hasil_diagnosis(){
$this->db->distinct()
->select('*')
->from('pengetahuan a')
->join('kerusakan b', 'a.id_kerusakan=b.id_kerusakan')
->join('tmp_gejala c', 'a.id_gejala=c.id_gejala')
->where('a.id_gejala', 'c.id_gejala');
$query = $this->db->get();
return $query->result();
}

public function insert_diagnosa(){
	for($i=0;$i<$this->baris;$i++){
	$data =[
	'id_pengguna'=>$this->id_pengguna[0],
	'id_kerusakan'=>$this->id_kerusakan[$i],
	'id_gejala' => $this->id_gejala[$i]];
	$this->db->insert('tmp_diagnosa',$data);
	}
}


public function insert_gejala(){
	$data =[
	'id_pengguna'=>$this->id_pengguna[0],
	'id_gejala'=>$this->id_gejala[0],
	'status' => $this->status[0]];
	//'cf'=>$this->nilai_cf];
	$this->db->insert('tmp_gejala',$data);
	
}

public function insert_kerusakan(){
	for($i=0;$i<$this->baris;$i++){
	$data =[
	'id_pengguna'=>$this->id_pengguna[0],
	'id_kerusakan'=>$this->id_kerusakan[$i]];
	$this->db->insert('tmp_kerusakan',$data);
	}	
}


public function delete(){
	$this->db->empty_table('tmp_diagnosa');
	$this->db->empty_table('tmp_gejala');
	$this->db->empty_table('tmp_kerusakan');
}

public function delete1(){
	$sql = sprintf("delete from hasil_diagnosa where id_konsultasi='%s'",
				$this->id);
	$this->db->query($sql);
}

public function select($limit, $start){
$this->db->select('*')
->from('hasil_diagnosa a')
->join('kerusakan b','on a.id_kerusakan=b.id_kerusakan')
->join('pengguna c','on a.id_pengguna=c.id_pengguna')
->where('c.username',$this->session->userdata('user_pengguna'))
->limit($limit, $start);
$query = $this->db->get();
return $query;
}

public function detail(){
$this->db->select('*')
		 ->from('hasil_diagnosa a')
		 ->join('kerusakan b', 'a.id_kerusakan=b.id_kerusakan')
		 ->join('pengguna c', 'c.id_pengguna=a.id_pengguna')
		 ->where('a.id_konsultasi=',$this->id);
$query = $this->db->get();
return $query->row();
}

public function cetak_laporan(){
$this->db->select('*')
->from('hasil_diagnosa a')
->join('kerusakan b','a.id_kerusakan=b.id_kerusakan')
->join('pengguna c','a.id_pengguna=c.id_pengguna')
->where('a.id_pengguna',$this->id_penggunaa);
$query = $this->db->get();
return $query;
}


public function searching($kunci){
$this->db->select('*')
->from('hasil_diagnosa a')
->join('kerusakan b','on a.id_kerusakan=b.id_kerusakan')
->join('pengguna c','on a.id_pengguna=c.id_pengguna')
->like('a.id_konsultasi', $kunci)
->or_like('a.tanggal', $kunci);
$query = $this->db->get();
return $query;
}

public function rules_p1(){
	$where = array('b.id_gejala'=>'G01', 'b.id_gejala'=>'G02','b.id_gejala'=>'G03');
	$this->db->select('*')
			 ->from('pengetahuan a')
			 ->join('tmp_gejala b', 'a.id_gejala=b.id_gejala')
			 ->where($where);
	$query = $this->db->get();
	return $query->result();
}

public function rules_p2(){
	$where = array('b.id_gejala'=>'G04','b.id_gejala'=>'G05','b.id_gejala'=>'G06');
	$this->db->select('*')
			 ->from('pengetahuan a')
			 ->join('tmp_gejala b', 'a.id_gejala=b.id_gejala')
			 ->where($where);
	$query = $this->db->get();
	return $query->result();
}

public function rules_p3(){
	$where = array('b.id_gejala'=>'G07','b.id_gejala'=>'G08','b.id_gejala'=>'G09');
	$this->db->select('*')
			 ->from('pengetahuan a')
			 ->join('tmp_gejala b', 'a.id_gejala=b.id_gejala')
			 ->where($where);
	$query = $this->db->get();
	return $query->result();
}

public function rules_p4(){
	$where = array('b.id_gejala'=>'G10','b.id_gejala'=>'G11','b.id_gejala'=>'G12');
	$this->db->select('*')
			 ->from('pengetahuan a')
			 ->join('tmp_gejala b', 'a.id_gejala=b.id_gejala')
			 ->where($where);
	$query = $this->db->get();
	return $query->result();
}

public function rules_p5(){
	$where = array('b.id_gejala'=>'G13','b.id_gejala'=>'G14','b.id_gejala'=>'G15','b.id_gejala'=>'G16');
	$this->db->select('*')
			 ->from('pengetahuan a')
			 ->join('tmp_gejala b', 'a.id_gejala=b.id_gejala')
			 ->where($where);
	$query = $this->db->get();
	return $query->result();
}

public function rules_p6(){
	$where = array('b.id_gejala'=>'G17', 'b.id_gejala'=>'G18');
	$this->db->select('*')
			 ->from('pengetahuan a')
			 ->join('tmp_gejala b', 'a.id_gejala=b.id_gejala')
			 ->where($where);
	$query = $this->db->get();
	return $query->result();
}
}