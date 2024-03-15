<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RKBU extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
	   	$this->load->helper('url', 'form');	   	
		$this->load->database();
		$this->load->model('M_User');
		$this->load->model('M_Post');
		$this->load->model('M_Master');
	}
	
	public function dashboard()
	{
		$this->session_check();
		$id_user =  $this->session->userdata('id_user');
		$bidang =  $this->session->userdata('bidang');
		$data['role'] =  $this->session->userdata('role');
		$data['tahun'] =  $this->session->userdata('tahun');
		$result =  $this->M_User->getById($id_user);
		$data['totalanggaran'] =  $this->M_User->totalanggaransemua($id_user,$bidang,$data['role']);
		$data['belanjapegawai'] =  $this->M_User->totalbelanjapegawai($id_user,$bidang,$data['role']);
		$data['belanjamodal'] =  $this->M_User->totalbelanjamodal($id_user,$bidang,$data['role']);
		$data['belanjabarjas'] =  $this->M_User->totalbelanjabarjas($id_user,$bidang,$data['role']);
		$data['profile'] = $result;
		//$posts =  $this->M_Post->gettimeline();
		//$data['posts'] = $posts;
		$this->load->view('Rkbu/Dashboard',$data);
	}
	public function tes()
	{
		$this->session_check();
	
		$this->load->view('Rkbu/tes');
	}
	public function belanjaperunit(){
		$this->session_check();
		$id_user =  $this->session->userdata('id_user');
		$bidang =  $this->session->userdata('bidang');
		$data['role'] =  $this->session->userdata('role');
		$baru =  $this->M_User->belanjaperunit($id_user,$bidang,$data['role']);
		$data['data']=$baru;
		echo json_encode($data);

	}
	
	public function rekapitulasi()
	{
		$this->session_check();
		$id_user =  $this->session->userdata('id_user');
		$data['role'] =  $this->session->userdata('role');
		$result =  $this->M_User->getById($id_user);
		$data['profile'] = $result;
		//$posts =  $this->M_Post->gettimeline();
		//$data['posts'] = $posts;
		$this->load->view('Rkbu/Rekapitulasi',$data);
	}
	
	function CetakSemua(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['profile'] = $unit_kerja;
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
		$bidang =  $this->session->userdata('bidang');
		$role =  $this->session->userdata('role');
		$data['role'] =  $this->session->userdata('role');
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_semua_2024($id,$role,$bidang,$tahun);

			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_data_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_semua($id);

		//	var_dump($unit_kerja);die;
			$this->load->view("Cetak/export_semua_data",$data);
			
		}
						
	
	}
	function CetakSemuaBarjas(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
		$bidang =  $this->session->userdata('bidang');
		$role =  $this->session->userdata('role');
		$data['role'] =  $this->session->userdata('role');
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_barjas_2024($id,$role,$bidang,$tahun);

			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_barjas_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_barjas($id);
		
			$this->load->view("Cetak/export_semua_barjas",$data);
		}
		//var_dump($unit_kerja);die;
						
	
	}
	function CetakSemuaPegawai(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
		$bidang =  $this->session->userdata('bidang');
		$role =  $this->session->userdata('role');
		$data['role'] =  $this->session->userdata('role');
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_pegawai_2024($id,$role,$bidang,$tahun);

			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_pegawai_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_pegawai($id);

			//var_dump($unit_kerja);die;
			$data['profile'] = $unit_kerja;
			$this->load->view("Cetak/export_semua_pegawai",$data);
			}					
	
	}
	function CetakSemuaModal(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
		$bidang =  $this->session->userdata('bidang');
		$role =  $this->session->userdata('role');
		$data['role'] =  $this->session->userdata('role');
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_modal_2024($id,$role,$bidang,$tahun);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_modal_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_modal($id);
	
				
			//var_dump($unit_kerja);die;
			$data['profile'] = $unit_kerja;
			$this->load->view("Cetak/export_semua_modal",$data);
		}					
	
	}
	function Cetaksemuabarangdanspesifikasi(){
		$this->session_check();
		$id = $this->uri->segment(3);
		// var_dump($id);die;
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
		$data['profile'] = $unit_kerja;
		$bidang =  $this->session->userdata('bidang');
		$role =  $this->session->userdata('role');
		$data['role'] =  $this->session->userdata('role');
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_barangdanspesifikasi_2024($id,$role,$bidang,$tahun);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_barangdanspesifikasi_2024",$data);
			
		}else{
			
			//var_dump($unit_kerja);die;
			$data['belanja'] = $this->M_Master->get_cetak_barangdanspesifikasi($id);
		$this->load->view("Cetak/export_semua_barangdanspesifikasi",$data);
		}	
	
	}
	function CetakSemuaUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
	
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
		//	var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$bidang =  $this->session->userdata('bidang');
		$role =  'only';
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_semua_2024($id,$role,$bidang,$tahun);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_data_user_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_semua($id);
		
			$this->load->view("Cetak/export_semua_data_user",$data);
		}				
	
	}
	function CetakSemuaBarjasUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$data['profile'] = $unit_kerja;
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
		$bidang =  $this->session->userdata('bidang');
		$role =  'only';
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_barjas_2024($id,$role,$bidang);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_barjas_user_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_barjas($id);
		
		
		
		//var_dump($unit_kerja);die;
		$this->load->view("Cetak/export_semua_barjas_user",$data);
		}			
	
	}
	function CetakSemuaPegawaiUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
		$data['profile'] = $unit_kerja;
		$bidang =  $this->session->userdata('bidang');
		$role =  'only';
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_pegawai_2024($id,$role,$bidang,$tahun);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_pegawai_user_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_pegawai($id);
		


		//var_dump($unit_kerja);die;
		$this->load->view("Cetak/export_semua_pegawai_user",$data);
		}				
	
	}
	function CetakSemuaModalUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
		$data['profile'] = $unit_kerja;
		$data['tahun'] =  $this->session->userdata('tahun');
		$tahun =  $data['tahun'];
	
		$bidang =  $this->session->userdata('bidang');
		$role =  'only';
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_modal_2024($id,$role,$bidang,$tahun);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_modal_user_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_modal($id);
		
				
		//var_dump($unit_kerja);die;
		$this->load->view("Cetak/export_semua_modal_user",$data);
		}				
	
	}
	function CetaksemuabarangdanspesifikasiUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		// var_dump($id);die;
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$data['tahun'] =  $this->session->userdata('tahun');
			$tahun =  $data['tahun'];
	
		$bidang =  $this->session->userdata('bidang');
		$role =  'only';
		
		if($data['tahun']>2023){
			$data['belanja'] = $this->M_Master->get_cetak_barangdanspesifikasi_2024($id,$role,$bidang,$tahun);
			
			// var_dump($data['tahun']);die;
			$this->load->view("Cetak/export_semua_barangdanspesifikasi_user_2024",$data);
			
		}else{
			$data['belanja'] = $this->M_Master->get_cetak_barangdanspesifikasi($id);
		
		$this->load->view("Cetak/export_semua_barangdanspesifikasi_user",$data);
		}		
	
	}
		
	function PreviewSemua(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_semua($id);

	//	var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_data",$data);
						
	
	}
	function PreviewSemuaBarjas(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_barjas($id);
		
		
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_barjas",$data);
						
	
	}
	function PreviewSemuaPegawai(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_pegawai($id);

		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_pegawai",$data);
						
	
	}
	function PreviewSemuaModal(){
		$this->session_check();
		$id = $this->uri->segment(3);
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_modal($id);

				
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_modal",$data);
						
	
	}
	function Previewsemuabarangdanspesifikasi(){
		$this->session_check();
		$id = $this->uri->segment(3);
		// var_dump($id);die;
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_barangdanspesifikasi($id);
		
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_barangdanspesifikasi",$data);
		
	
	}
	function PreviewSemuaUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_semua($id);
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
	//	var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_data_user",$data);
						
	
	}
	function PreviewSemuaBarjasUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_barjas($id);
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;

		
		
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_barjas_user",$data);
						
	
	}
	function PreviewSemuaPegawaiUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_pegawai($id);
		if($data['belanja']){
			$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
			
		}else{
			$data['belanja'] = '';
			$data['jenis_belanja'] = '';
		}


		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_pegawai_user",$data);
						
	
	}
	function PreviewSemuaModalUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		$unit_kerja =  $this->session->userdata('unit_kerja'); 
		$data['belanja'] = $this->M_Master->get_cetak_modal($id);
		$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;

				
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_modal_user",$data);
						
	
	}
	function PreviewsemuabarangdanspesifikasiUser(){
		$this->session_check();
		$id =  $this->session->userdata('id_user');
		// var_dump($id);die;
		$unit_kerja =  $this->session->userdata('unit_kerja');
		$data['belanja'] = $this->M_Master->get_cetak_barangdanspesifikasi($id);
		//	$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
		//var_dump($unit_kerja);die;
		$data['profile'] = $unit_kerja;
		$this->load->view("Cetak/pre_semua_barangdanspesifikasi_user",$data);
						
	
	}

	function session_check(){
		//var_dump($this->session->userdata('is_login'));die; 
		if($this->session->userdata('is_login') == FALSE){
			$data = ['status' => true, 'message' => 'Silahkan Login Terlebih Dahulu! '];
			$this->session->set_flashdata('data', $data);
			redirect('C_Home/index');
		}
	}
}
