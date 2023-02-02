<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

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
	   	// $this->load->helper('url', 'form');	   
		   $this->load->helper(array('form', 'url'));	

		$this->load->database();
		$this->load->model('M_Status');

		$this->load->library('session');
		// $this->load->library('upload');

		/* MODEL */
		//temp_pemeliharaan
		$this->load->model('M_User');
		$this->load->model('M_T_Pengadaan');
		//head_pemeliharaan
		$this->load->model('M_H_Pengadaan');
		//detail_pemeliharaan
		$this->load->model('M_D_Pengadaan');
		//Master
		$this->load->model('M_Master');
		
	}
	
	public function index()
	{
     $this->session_check();

      $id_user =  $this->session->userdata('id_user');
      $role =  $this->session->userdata('role');
      $result =  $this->M_User->getById($id_user);
	  $jenis_belanja = 2;
      if($role =='Admin'){
        $data = $this->M_H_Pengadaan->get_pengadaan_admin($jenis_belanja);
      }else{
        $data = $this->M_H_Pengadaan->get_pengadaan_user($id_user,$jenis_belanja);
        
      }
      $data['profile'] = $result;
      
      // var_dump($data);
      $this->load->view('Status/index',$data);
    
  }
	function session_check(){
		if($this->session->userdata('is_login') == FALSE){
			$this->session->set_flashdata('status', 'Please Login First! ');
			redirect('C_Home/index');
		}
  }
  
	function data_status_pengadaan(){
				$role =  $this->session->userdata('role');
				$id_user =  $this->session->userdata('id_user');
				if($role =='Admin'){
					$baru=$this->M_Status->data_status_admin();
				}else{
					$baru=$this->M_Status->data_status_user($id_user);
				}
				$data['data']=$baru;
				echo json_encode($data);
				
    }

  function data_temp_pengadaan(){
				$id_user =  $this->session->userdata('id_user');
				$jenis_belanja = 2;
		
				$baru=$this->M_T_Pengadaan->temp_list($id_user,$jenis_belanja);
				$data['data']=$baru;
				echo json_encode($data);
				
    }

    function data_pengadaan(){
				$id_user =  $this->session->userdata('id_user');
				//$result =  $this->M_User->getById($id_user);
				$role =  $this->session->userdata('role');
				$result =  $this->M_User->getById($id_user);
				$jenis_belanja = 2;
				if($role =='Admin'){
					$baru = $this->M_H_Pengadaan->get_pengadaan_admin($jenis_belanja);
				}else{
					$baru = $this->M_H_Pengadaan->get_pengadaan_user($id_user,$jenis_belanja);
					
				}
				$data['data']=$baru;
				//$data['profile'] = $result;
				//print_r($data);die;
		
				echo json_encode($data);
			
    }

    	function save_temp_pengadaan(){
	// print_r($_POST);
      $config['file_type']           = $_FILES['image']['type'];
			$config['file_name']           = $_FILES['image']['name'] ;
			$config['upload_path']          = './uploadfile/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			// $config['max_size']             = 100;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			
			
			$apaini = $this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image'))
			{
				// echo"<br/>";
				// var_dump("kalau kosong/error");
				// var_dump('no');
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					// $this->load->view('upload_form', $error);
			}
			else
			{
				// echo"<br/>";
				// var_dump("kalau ada");
				
					$data = array('upload_data' => $this->upload->data());
					var_dump($data);
					
					// $this->load->view('upload_success', $data);
			}
			// die;
        $data=$this->M_T_Pengadaan->save();
        echo json_encode($data);
    }
    	function get_id_status(){
	      $data=$this->M_Status->get_id_status();
        echo json_encode($data);
			
    }
    	function deleteTemp(){
	      $data=$this->M_T_Pengadaan->delete_temp();
        echo json_encode($data);
			
    }
    function update_temp_pengadaan(){
			$config['file_type']           = $_FILES['image']['type'];
			$config['file_name']           = $_FILES['image']['name'] ;
			$config['upload_path']          = './uploadfile/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			// $config['max_size']             = 100;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			
			
			$apaini = $this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image'))
			{
				// echo"<br/>";
				// var_dump("kalau kosong/error");
				// var_dump('no');
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					// $this->load->view('upload_form', $error);
			}
			else
			{
				// echo"<br/>";
				// var_dump("kalau ada");
				
					$data = array('upload_data' => $this->upload->data());
					var_dump($data);
					
					// $this->load->view('upload_success', $data);
			}
			
        $data=$this->M_T_Pengadaan->update_temp();
        echo json_encode($data);
    }
  	function update_pengadaan(){
			$config['file_type']           = $_FILES['edit_image']['type'];
			$config['file_name']           = $_FILES['edit_image']['name'] ;
			$config['upload_path']          = './uploadfile/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			// $config['max_size']             = 100;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			
			
			$apaini = $this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('edit_image'))
			{
				// echo"<br/>";
				// var_dump("kalau kosong/error");
				// var_dump('no');
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					// $this->load->view('upload_form', $error);
			}
			else
			{
				// echo"<br/>";
				// var_dump("kalau ada");
				
					$data = array('upload_data' => $this->upload->data());
					var_dump($data);
					
					// $this->load->view('upload_success', $data);
			}
			
      
        $data=$this->M_D_Pengadaan->update_pengadaan();
        echo json_encode($data);
		}
		function save_detail_pengadaan(){
			$config['file_type']           = $_FILES['edit_image']['type'];
				$config['file_name']           = $_FILES['edit_image']['name'] ;
				$config['upload_path']          = './uploadfile/';
				$config['allowed_types']        = 'gif|jpg|png|pdf';
				// $config['max_size']             = 100;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				
				
				
				$apaini = $this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('edit_image'))
				{
					// echo"<br/>";
					// var_dump("kalau kosong/error");
					// var_dump('no');
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
						// $this->load->view('upload_form', $error);
				}
				else
				{
					// echo"<br/>";
					// var_dump("kalau ada");
					
						$data = array('upload_data' => $this->upload->data());
						var_dump($data);
						
						// $this->load->view('upload_success', $data);
				}
				
					$data=$this->M_D_Pengadaan->save_pengadaan_from_edit();
        echo json_encode($data);
		}

		function save_pengadaan(){
			$id_user =  $this->session->userdata('id_user');
			$unik = uniqid();
			//ambil data dari keranjang 
			//belanja barang dan jasa 1 //belanja modal 2
			$jenis_belanja = 2;

			$temp = $this->M_T_Pengadaan->get_keranjang($id_user,$jenis_belanja);
			$this->M_H_Pengadaan->save_pengadaan($temp[0]->tgl_usulan,$jenis_belanja);
			$data = $this->M_H_Pengadaan->get_by_id($id_user,$jenis_belanja);
			$i=0;
			foreach ($temp as $key) {
				# code...
				$this->M_D_Pengadaan->save_pengadaan_from_temp($data[0]->id_pengadaan,$key);
				$this->M_T_Pengadaan->delete_temp_by_id($key->id_temp_pengadaan);
				$i++;
			}
			echo json_encode($data);
			
		}
		function save_status(){
			$id_user =  $this->session->userdata('id_user');
			$data=$this->M_Status->update_status();
      echo json_encode($data);
			
		}
		
		function data_detail_pengadaan(){
			$id_user =  $this->session->userdata('id_user');
		
			$baru=$this->M_D_Pengadaan->tampil_detail($id_user);
			$data['data']=$baru;
			echo json_encode($data);
				
    }
		
		function get_id_detail(){
		
				$data=$this->M_D_Pengadaan->get_id_detail();
				//$data['data']=$baru;
				echo json_encode($data);
			
		}
		function deletedetail(){
	      $data=$this->M_D_Pengadaan->delete_detail();
        echo json_encode($data);
			
    }
			
			function ambil_tipe_barang(){
				
				$data['data']=$this->M_Master->ambil_tipe_barang();
				echo json_encode($data);
			}
				function ambil_jenis_barang(){
				
				$data['data']=$this->M_Master->ambil_jenis_barang();
				echo json_encode($data);
			}
			function ambil_program(){
				
				$data['data']=$this->M_Master->ambil_program();
				echo json_encode($data);
			}
			function ambil_uraian(){
				
				$data['data']=$this->M_Master->ambil_uraian();
				echo json_encode($data);
			}

			function ambil_kegiatan(){
				
				$data['data']=$this->M_Master->ambil_kegiatan();
				echo json_encode($data);
			}
			function ambil_subkegiatan(){
				
				$data['data']=$this->M_Master->ambil_subkegiatan();
				echo json_encode($data);
			}
			function ambil_kegiatantemp(){
				
				$data['data']=$this->M_Master->ambil_kegiatantemp();
				echo json_encode($data);
			}
			function ambil_subkegiatantemp(){
				
				$data['data']=$this->M_Master->ambil_subkegiatantemp();
				echo json_encode($data);
			}
			function CetakUsulan(){
				$this->session_check();
				$id = $this->uri->segment(3);
				
				
				$data['belanja'] = $this->M_H_Pengadaan->get_cetak_belanja($id);
				//var_dump($data['data'][0]->unit_kerja);
				$data['profile'] = $data['belanja'][0]->unit_kerja;
				$data['jenis_belanja'] = $data['belanja'][0]->jenis_belanja;
				$this->load->view("Cetak/export_usulan_modal",$data);
								
			
			}
		
	
		
}
