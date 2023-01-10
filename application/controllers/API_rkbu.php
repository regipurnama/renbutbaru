<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_rkbu extends CI_Controller {

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

	// constructor: fungsi yang pasti dieksekusi pertama kali

	
    public function __construct(){
		parent::__construct();
	   	$this->load->helper('url', 'form');	   	
		$this->load->database();
		$this->load->model('M_User');

		$this->load->library('session');

		/* MODEL */
		//temp_pemeliharaan
		$this->load->model('M_T_Pemeliharaan');
		//head_pemeliharaan
		$this->load->model('M_H_Pemeliharaan');
		//detail_pemeliharaan
		$this->load->model('M_D_Pemeliharaan');
		//admin
		$this->load->model('M_Admin');
		
	}
    
	public function importdata()
	{
		$this->session_check();

		$id_user =  $this->session->userdata('id_user');
		$role =  $this->session->userdata('role');
		$result =  $this->M_User->getById($id_user);

		if($role =='Admin'){
			$data = $this->M_H_Pemeliharaan->get_pemeliharaan_admin();
		}else{
			$data = $this->M_H_Pemeliharaan->get_pemeliharaan_user($id_user);
			
		}
		$data['profile'] = $result;
		$this->load->view('Admin/importdata',$data);
	}

    // public function lihatdata()
	// {
	// 	$this->session_check();

	// 	$id_user =  $this->session->userdata('id_user');
	// 	$role =  $this->session->userdata('role');
	// 	$result =  $this->M_User->getById($id_user);

	// 	if($role =='Admin'){
	// 		$data = $this->M_H_Pemeliharaan->get_pemeliharaan_admin();
	// 	}else{
	// 		$data = $this->M_H_Pemeliharaan->get_pemeliharaan_user($id_user);
			
	// 	}
	// 	$data['profile'] = $result;
	// 	$this->load->view('Admin/lihatdata',$data);
	// }
	public function Uploadcsv()
	{
		$this->session_check();
		$baru = array();	

		$id_user =  $this->session->userdata('id_user');
		$role =  $this->session->userdata('role');
		$result =  $this->M_User->getById($id_user);

		if($role =='Admin'){
			$data = $this->M_H_Pemeliharaan->get_pemeliharaan_admin();
		}else{
			$data = $this->M_H_Pemeliharaan->get_pemeliharaan_user($id_user);
			
		}
		
	
		if ( isset($_FILES['fileToUpload']['name'])) {
			//var_dump("cek");
			//die;
            $file = $_FILES['fileToUpload']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['fileToUpload']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["fileToUpload"]["size"] > 0) {
					
					$handle = fopen($file,"r");
					$i=0;
					
					while (($row = fgetcsv($handle, 2048,";"))) {
					
						
						$data = [
							'kode_urusan['.$i.']' => trim($row[0]),
							'nama_urusan['.$i.']' => trim($row[1]),
							//insert nama uptd
							'kode_uptd['.$i.']' => trim($row[2]),
							'nama_uptd['.$i.']' => trim($row[3]),
							//insert nama program 
							'kode_program['.$i.']' => trim($row[4]),
							'nama_program['.$i.']' => trim($row[5]),
							//insert nama kegiatan 
							'kode_kegiatan['.$i.']' => trim($row[6]),
							'nama_kegiatan['.$i.']' => trim($row[7]),
							//insert nama subkegiatan 
							'kode_subkegiatan['.$i.']' => trim($row[8]),
						    'nama_subkegiatan['.$i.']' => trim($row[9]),
						
							
						];
						array_push($baru,$data);
						$i++;

					}
					

					fclose($handle);
					
					
				} else {
					echo 'Format file tidak valid!';
				}
			}
        }
		$data['profile'] = $result;
		$data['csvData'] = $baru;
		$this->load->view('Admin/uploadcsv',$data);
	}

	function simpandatacsv(){
		//belum fix
		$data_csv = json_decode($_POST['arr_js'],true);
		$i = 0;
		
		//print_r($data_csv);
		foreach($data_csv as $data){
			//print_r($masuk['kode_urusan']);
			if($data['kode_urusan['.$i.']'] == $data['kode_urusan['.($i+1).']']){
				
				//cek sudah ada?
				$nkodeurusan = $this->cekUrusan($data['kode_urusan['.$i.']'],$data['nama_urusan['.$i.']']);

				
			}
			 $data['kode_urusan['.$i.']'];	
			 $data['nama_urusan['.$i.']'];	
			 $data['kode_uptd['.$i.']'];
			 $data['nama_uptd['.$i.']'];
			 $data['kode_program['.$i.']'];
			 $data['nama_program['.$i.']'];
			 $data['kode_kegiatan['.$i.']'];
			 $data['nama_kegiatan['.$i.']'];
			 $data['kode_subkegiatan['.$i.']'];
			 $data['nama_subkegiatan['.$i.']'];
			 
			$i++;
		  }
		// $js = json_decode($js);
		// $baru = json_encode($_POST['js']);
		// print_r($js);die;
	}
	
	function session_check(){
		if($this->session->userdata('is_login') == FALSE){
			$this->session->set_flashdata('status', 'Please Login First! ');
			redirect('C_Home/index');
		}
	}

	function cekUrusan($id,$nama_urusan){
		echo $id;
		echo $nama_urusan;
		die;
	}
	


	
}
