<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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

		$this->load->library('session');

		/* MODEL */
		//temp_pemeliharaan
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
	  $data['belanjamodal'] =  $this->M_User->totalbelanjamodal($id_user,$role);
      $data['profile'] = $result;
      
      // var_dump($data);
      $this->load->view('master/index',$data);
      
    }
	function session_check(){
        if($this->session->userdata('is_login') == FALSE){
            $this->session->set_flashdata('status', 'Silahkan Login Terlebih Dahulu!  ');
			redirect('C_Home/index');
		}
    }
    public function pengguna(){
        $this->session_check();

        $id_user =  $this->session->userdata('id_user');
        $role =  $this->session->userdata('role');
        $result =  $this->M_User->getById($id_user);
        
        $data['profile'] = $result;
        
        
        $this->load->view('Master/pengguna',$data);
    }
    public function ambil_pengguna(){
        $baru =  $this->M_Master->ambil_pengguna();
        $data['data']=$baru;
		echo json_encode($data);

    }
    public function ambil_program(){
        $baru =  $this->M_Master->ambil_program();
        $data['data']=$baru;
		echo json_encode($data);

    }
    public function ambil_subkegiatanmaster(){
        $baru =  $this->M_Master->ambil_subkegiatanmaster();
        $data['data']=$baru;
		echo json_encode($data);

    }
    public function ambil_uraianmaster(){
        $baru =  $this->M_Master->ambil_uraianmaster();
        $data['data']=$baru;
		echo json_encode($data);

    }
    public function ambil_kegiatanmaster(){
        $baru =  $this->M_Master->ambil_kegiatanmaster();
        $data['data']=$baru;
		echo json_encode($data);

    }
    public function Program(){
        $this->session_check();

        $id_user =  $this->session->userdata('id_user');
        $role =  $this->session->userdata('role');
        $result =  $this->M_User->getById($id_user);
	 
        $data['profile'] = $result;
            
        $this->load->view('Master/program',$data);
        
    }
    public function Kegiatan(){
        $this->session_check();

        $id_user =  $this->session->userdata('id_user');
        $role =  $this->session->userdata('role');
        $result =  $this->M_User->getById($id_user);
	 
        $data['profile'] = $result;
            
        $this->load->view('Master/kegiatan',$data);
        
    }
    
    public function Subkegiatan(){
        $this->session_check();

        $id_user =  $this->session->userdata('id_user');
        $role =  $this->session->userdata('role');
        $result =  $this->M_User->getById($id_user);
	 
        $data['profile'] = $result;
            
        $this->load->view('Master/subkegiatan',$data);
        
    }
    public function Uraian(){
        $this->session_check();

        $id_user =  $this->session->userdata('id_user');
        $role =  $this->session->userdata('role');
        $result =  $this->M_User->getById($id_user);
	 
        $data['profile'] = $result;
            
        $this->load->view('Master/uraian',$data);
        
    }
    public function import(){
        $this->session_check();

        $id_user =  $this->session->userdata('id_user');
        $role =  $this->session->userdata('role');
        $result =  $this->M_User->getById($id_user);
	 
        $data['profile'] = $result;
            
        $this->load->view('Master/import',$data);
    }  
    function ambil_kegiatan(){
				
        $data['data']=$this->M_Master->ambil_kegiatanmaster();
        echo json_encode($data);
    }
    public function save_pengguna(){
        $baru =  $this->M_Master->save_pengguna();
        $data['data']=$baru;
		echo json_encode($data);
    }
    public function get_id_pengguna(){
        $data =  $this->M_Master->get_id_pengguna();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function update_pengguna(){
        $data =  $this->M_Master->update_pengguna();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function save_program(){
        $baru =  $this->M_Master->save_program();
        $data['data']=$baru;
		echo json_encode($data);
    }
    public function get_id_program(){
        $data =  $this->M_Master->get_id_program();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function update_program(){
        $data =  $this->M_Master->update_program();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function save_kegiatan(){
        $baru =  $this->M_Master->save_kegiatan();
        $data['data']=$baru;
		echo json_encode($data);
    }
    public function get_id_kegiatan(){
        $data =  $this->M_Master->get_id_kegiatan();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function update_kegiatan(){
        $data =  $this->M_Master->update_kegiatan();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function save_subkegiatan(){
        $baru =  $this->M_Master->save_subkegiatan();
        $data['data']=$baru;
		echo json_encode($data);
    }
    public function get_id_subkegiatan(){
        $data =  $this->M_Master->get_id_subkegiatan();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function update_subkegiatan(){
        $data =  $this->M_Master->update_subkegiatan();
       // $data['data']=$baru;
		echo json_encode($data);
    }
    public function save_uraian(){
        $baru =  $this->M_Master->save_uraian();
        $data['data']=$baru;
		    echo json_encode($data);
    }
    public function get_id_uraian(){
        $data =  $this->M_Master->get_id_uraian();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function update_uraian(){
        $data =  $this->M_Master->update_uraian();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function tampil_program(){
        $data =  $this->M_Master->tampil_program();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function delete_program(){
        $data =  $this->M_Master->delete_program();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function tampil_kegiatan(){
        $data =  $this->M_Master->tampil_kegiatan();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function delete_kegiatan(){
        $data =  $this->M_Master->delete_kegiatan();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function tampil_subkegiatan(){
        $data =  $this->M_Master->tampil_subkegiatan();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function delete_subkegiatan(){
        $data =  $this->M_Master->delete_subkegiatan();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function tampil_uraian(){
        $data =  $this->M_Master->tampil_uraian();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
    public function delete_uraian(){
        $data =  $this->M_Master->delete_uraian();
       // $data['data']=$baru;
		    echo json_encode($data);
    }
        
		
}
