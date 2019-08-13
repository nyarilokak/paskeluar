<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Home extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

	function get_Transaksi_daily() {
		
		$query = $this->db->query("SELECT a.*,b.nama as security FROM guestbook a INNER JOIN user b ON a.iduser=b.iduser WHERE status='1' AND b.cabang='".$this->session->userdata('session_cabang')."' ");
		return $query->result();		
		
	}
	
	 function simpan_Data($data){
		$save=$this->db->insert('guestbook',$data);
	    return $save;
    }  
	
	function hapus_Data_Guest($id){
		$update=$this->db->where('idguest', $id);
        $delete=$this->db->delete("guestbook");
        return $delete;
    }
	
	
	
	
	
}