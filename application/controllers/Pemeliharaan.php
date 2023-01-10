<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller {

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
		$db2 = $this->load->database('database_kedua', TRUE);
		$this->load->model('M_User');

		$this->load->library('session');

		/* MODEL */
		//temp_pemeliharaan
		$this->load->model('M_T_Pemeliharaan');
		//head_pemeliharaan
		$this->load->model('M_H_Pemeliharaan');
		//detail_pemeliharaan
		$this->load->model('M_D_Pemeliharaan');
		
	}
	public function index()
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
		
		// var_dump($data);
		$this->load->view('Pemeliharaan/index',$data);
	}
	
	function session_check(){
		if($this->session->userdata('is_login') == FALSE){
			$this->session->set_flashdata('status', 'Please Login First! ');
			redirect('C_Home/index');
		}
	}
	
	
	function save_pemeliharaan(){
		$id_user =  $this->session->userdata('id_user');
		$unik = uniqid();
		//ambil data dari keranjang 
		$temp = $this->M_T_Pemeliharaan->get_keranjang($id_user);
		$this->M_H_Pemeliharaan->save_pemeliharaan($temp[0]->tgl_usulan);
		$data = $this->M_H_Pemeliharaan->get_by_id($id_user);
		$i=0;
		foreach ($temp as $key) {
			# code...
			$this->M_D_Pemeliharaan->save_pemeliharaan_from_temp($data[0]->id_pemeliharaan,$key);
			$this->M_T_Pemeliharaan->delete_temp_by_id($key->id_temp_pemeliharaan);
			$i++;
		}
		echo json_encode($data);
		
	}
			
		function data_temp_pemeliharaan(){
				$id_user =  $this->session->userdata('id_user');
		
				$baru=$this->M_T_Pemeliharaan->temp_list($id_user);
				$data['data']=$baru;
				echo json_encode($data);
				
    }
		
		function data_detail_pemeliharaan(){
				$id_user =  $this->session->userdata('id_user');
		
				$baru=$this->M_D_Pemeliharaan->tampil_detail($id_user);
				$data['data']=$baru;
				echo json_encode($data);
				
    }
		
		function data_pemeliharaan(){
				$id_user =  $this->session->userdata('id_user');
				//$result =  $this->M_User->getById($id_user);
				$role =  $this->session->userdata('role');
				$result =  $this->M_User->getById($id_user);

				if($role =='Admin'){
					$baru = $this->M_H_Pemeliharaan->get_pemeliharaan_admin();
				}else{
					$baru = $this->M_H_Pemeliharaan->get_pemeliharaan_user($id_user);
					
				}
				$data['data']=$baru;
				//$data['profile'] = $result;
				//print_r($data);die;
		
				echo json_encode($data);
			
		}
		
		function get_id_detail(){
		
				$data=$this->M_D_Pemeliharaan->get_id_detail();
				//$data['data']=$baru;
				echo json_encode($data);
			
		}
 
		function deleteTemp(){
	      $data=$this->M_T_Pemeliharaan->delete_temp();
        echo json_encode($data);
			
		}
		function get_id_temp(){
	      $data=$this->M_T_Pemeliharaan->get_id_temp();
        echo json_encode($data);
			
		}
	
		function save_temp_pemeliharaan(){
		
        $data=$this->M_T_Pemeliharaan->save();
        echo json_encode($data);
    }
 
		function save_detail_pemeliharaan(){
		
        $data=$this->M_D_Pemeliharaan->save_pemeliharaan_from_edit();
        echo json_encode($data);
    }
 
    function update_temp_pemeliharaan(){
        $data=$this->M_T_Pemeliharaan->update_temp();
        echo json_encode($data);
    }
  	function update_pemeliharaan(){
        $data=$this->M_D_Pemeliharaan->update_pemeliharaan();
        echo json_encode($data);
    }
    
    function delete(){
        $data=$this->M_H_Pemeliharaan->delete_product();
        echo json_encode($data);
    }
		function deletedetail(){
	      $data=$this->M_D_Pengadaan->delete_detail();
        echo json_encode($data);
			
    }
			function save_detail_pengadaan(){
		
        $data=$this->M_D_Pengadaan->save_pengadaan_from_edit();
        echo json_encode($data);
    }
}
