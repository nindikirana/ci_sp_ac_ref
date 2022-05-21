<?php

class Data_kerusakan extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('Kerusakan_model');
		$this->model = $this->Kerusakan_model;
	}

	public function index(){
		if(isset($_GET['tambah'])){
		$this->load->view('module/module_sp/view_tambah_kerusakan', ['model'=>$this->model]);
		} else {
		$this->select(); }
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$config = [
						'upload_path' => './uploads/',
						'allowed_types' => 'jpg|png',
						'encrypt_name' => TRUE];
			$this->load->library('upload', $config);
			$this->model->nama_kerusakan = $_POST['nama_kerusakan'];	
			// $this->model->cf = $_POST['cf'];	
			// $this->model->definisi = $_POST['definisi'];
			$this->model->solusi = $_POST['solusi'];
			$jumlah = count($_FILES['gambar']['name']);
			if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
			$nama_file = $_FILES['gambar']['name'][$i];
			$tmp_file = $_FILES['gambar']['tmp_name'][$i];
			$this->model->gambar[$i] = $nama_file; }		
			$this->model->insert();
			$this->session->set_flashdata('tambah', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Data Kerusakan Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Penyakit yang Tersimpan
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>');
			redirect('data_kerusakan/index');
		}} else {
			$this->load->view('module/module_sp/view_tambah_kerusakan', ['model'=>$this->model]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->load->view('module/module_sp/view_data_kerusakan', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->load->view('module/module_sp/view_data_kerusakan', ['rows'=>$rows]); }
	}

	public function update(){
		if(isset($_POST['btnSubmit'])){
			$config = [
						'upload_path' => './uploads/',
						'allowed_types' => 'jpg|png',
						'encrypt_name' => TRUE];
			$this->load->library('upload', $config);
			$this->model->id = $_POST['id_kerusakan'];
			$this->model->nama_penyakit = $_POST['nama_kerusakan'];	
			//$this->model->cf = $row->faktor_kepastian;
			$this->model->definisi = $_POST['definisi'];
			$this->model->solusi = $_POST['solusi'];
			$jumlah = count($_FILES['gambar']['name']);
			if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
			$nama_file = $_FILES['gambar']['name'][$i];
			$tmp_file = $_FILES['gambar']['tmp_name'][$i];
			$this->model->gambar[$i] = $nama_file; }
			$this->model->update();
			$this->session->set_flashdata('ubah', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Data Kerusakan Berhasil Diubah !</strong>
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>');
			redirect('data_kerusakan/index');
		} }else {
			$id_kerusakan = $_GET['id_kerusakan'];
			$query = $this->db->query("select * from kerusakan where id_kerusakan='$id_kerusakan'");
			$row = $query->row();
			$this->model->id = $row->id_kerusakan;
			$this->model->nama_kerusakan = $row->nama_kerusakan;
			// $this->model->cf = $row->faktor_kepastian;
			// $this->model->definisi = $row->definisi;
			$this->model->solusi = $row->solusi;
			$this->load->view('module/module_sp/view_ubah_kerusakan',['model'=>$this->model]);
		}
	}

	public function detail(){
	$this->model->id = $_GET['id_kerusakan'];
	$this->model->detail();
	$this->row = $this->model->detail();
	$this->load->view('module/module_sp/view_detail_kerusakan', ['rows'=>$this->row]); 
	
	}

	public function delete(){
	$this->model->id = $_GET['id_kerusakan'];
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Data kerusakan Berhasil Dhapus !</strong>
     <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_kerusakan/index');
	}
}