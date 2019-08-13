<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model('M_Home');
		
		if(!$this->session->userdata('logged_in_pas')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger"> Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){
		$data['title']='Dashboard';		
		/*$data['material']=$this->M_Home->get_Count_Material();
		$data['group']=$this->M_Home->get_Count_Group();
		$data['unit']=$this->M_Home->get_Count_Unit();
		$data['satuan']=$this->M_Home->get_Count_Satuan();
		$data['masuk']=$this->M_Home->get_Transaksi_In();
		$data['lastSaldo']=$this->M_Home->get_LastMonthSaldo(); */
		//$data['PerHari']=$this->M_Home->get_Transaksi_daily(); 
		$data['main']='user/home'; 				
		$this->load->view('user/layout',$data);
		
	}
	
	public function guestbook(){
		$data['title']='Guest Book';		
		$data['main']='template/Form_GuestBook'; 				
		$this->load->view('template/main_layout',$data);
		
	}

    public function add_guestbook(){		
	
		 $data = array(       
		'iduser'=>$this->session->userdata('iduser'),
		'tipe'=>$this->input->post('tipe'),
		'nama'=>$this->input->post('nama'),
		'nopol'=>$this->input->post('nopol'),
		'instansi'=>$this->input->post('instansi'),
		'kilometer'=>$this->input->post('km'),
		'bbm'=>$this->input->post('bbm'),
		'jam'=>$this->input->post('jam'),
		'keterangan'=>$this->input->post('keterangan')
          );
        $save=$this->M_Home->simpan_Data($data);
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success"> Guest Book berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
		 
	    redirect('index.php/apps/dashboard/guestbook');
		
	}
	
		function delete_guestbook($id){
		
		$save=$this->M_Home->hapus_Data_Guest($id);	
		$this->session->set_flashdata('sukses','<div class="alert alert-success"> Guest Book berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
		
        redirect('index.php/apps/dashboard');
	
    }
	
	function changeStatus_guestbook($id){
		
		$this->db->query("UPDATE guestbook SET status='2',idapproval='".$this->session->userdata('iduser')."' WHERE idguest='$id'");
		$this->session->set_flashdata('sukses','<div class="alert alert-success"> Guest Book telah di approved <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
		
        redirect('index.php/apps/dashboard');
	
    }
	

}