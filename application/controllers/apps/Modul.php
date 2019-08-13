<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Home','M_Model'));

		if(!$this->session->userdata('logged_in_pas')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger"> Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
            redirect('index.php/welcome');
        }
	}

	// module Rental Marketing Office (RMO)
function home() {
		$this->load->view('user/home');
	}

function add() {

		$this->load->view('user/form_pass_keluar');

	}

	function berkas() {


		$this->load->view('user/cek_berkas');

	}

	function C_customer() {

		$array=array();
		foreach ($this->M_Model->Ambil_Customer() as $row) {

			$array[]=$row;
		}
		echo json_encode($array);
	}

	function C_Unit() {

		$array=array();
		foreach ($this->M_Model->Ambil_Nopol() as $row) {

			$array[]=$row;
		}
		echo json_encode($array);
	}

	function get_Pass_Data() {

		$this->load->view('user/get_pass_data');

	}


	function Save_pass() {

		$this->M_Model->M_Save_pass();

	}

	function Edit_pass() {

		$this->M_Model->M_Edit_pass();

	}

	function Delete_pass() {

		$this->M_Model->M_Delete_pass();

	}


	// MODULE ADMIN

	function Received_pass() {

		$this->M_Model->M_Received_pass();

	}

	//get data for datagrid
    public function get_Data_Pass(){

        /*Default request pager params dari jeasyUI*/
        $offset = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $limit  = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $offset = ($offset-1)*$limit;
        $data   = $this->M_Model->get_Data($offset,$limit,$search);
        $i	= 0;
        $rows   = array();
        foreach ($data ['data'] as $r) {

           //array keys ini = attribute 'field' di view nya
		   $rows[$i]['idpass'] = $r->idpass;
           $rows[$i]['customer'] = $r->customer;
           $rows[$i]['nomor_rdo'] = $r->nomor_rdo;
           $rows[$i]['driver'] = $r->driver;
           $rows[$i]['warna'] = $r->warna;
		   $rows[$i]['nopol'] = $r->nopol;
		   $rows[$i]['tujuan'] = $r->tujuan;
		   $rows[$i]['jamkeluar'] = $r->jamkeluar;
		   $rows[$i]['tglkeluar'] = $r->tglkeluar;
		   $rows[$i]['start'] = $r->start_sewa;
		   $rows[$i]['end'] = $r->end_sewa;
		   $rows[$i]['status'] = $r->status;
         $i++;
        }

        //keys total & rows wajib bagi jEasyUI
        $result = array('total'=>$data['count'],'rows'=>$rows);
        echo json_encode($result); //return nya json
    }

	// Verifikasi Berkas Order Pass Keluar ( Admin)
	public function get_Data_berkas_Pass_Keluar(){

        /*Default request pager params dari jeasyUI*/
        $offset = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $limit  = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $offset = ($offset-1)*$limit;
        $data   = $this->M_Model->get_Data_Berkas_pass_keluar($offset,$limit,$search);
        $i	= 0;
        $rows   = array();
        foreach ($data ['data'] as $r) {

           //array keys ini = attribute 'field' di view nya
		   $rows[$i]['idpass'] = $r->idpass;
       $rows[$i]['customer'] = $r->customer;
       $rows[$i]['nomor_rdo'] = $r->nomor_rdo;
       $rows[$i]['driver'] = $r->driver;
       $rows[$i]['warna'] = $r->warna;
		   $rows[$i]['nopol'] = $r->nopol;
		   $rows[$i]['tujuan'] = $r->tujuan;
		   $rows[$i]['jamkeluar'] = $r->jamkeluar;
		   $rows[$i]['tglkeluar'] = $r->tglkeluar;
		   $rows[$i]['start'] = $r->start_sewa;
		   $rows[$i]['end'] = $r->end_sewa;
		   $rows[$i]['status'] = $r->status;
		   $rows[$i]['kilometer2'] = $r->kilometer2;
		   $rows[$i]['bbm2'] = $r->bbm2;
		   $rows[$i]['kilometer1'] = $r->kilometer1;
		   $rows[$i]['bbm1'] = $r->bbm1;
		   $rows[$i]['tglmasuk'] = $r->tglmasuk;
		   $rows[$i]['jammasuk'] = $r->jammasuk;
		   $rows[$i]['keterangan'] = $r->keterangan;
		   $rows[$i]['disetujui'] = $r->approved;
		   $rows[$i]['dibuatoleh'] = $r->dibuatoleh;
         $i++;
        }

        //keys total & rows wajib bagi jEasyUI
        $result = array('total'=>$data['count'],'rows'=>$rows);
        echo json_encode($result); //return nya json
    }



	//get data for datagrid History Pass Keluar
    public function get_Data_Pass_History(){

        /*Default request pager params dari jeasyUI*/
        $offset = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $limit  = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $offset = ($offset-1)*$limit;
        $data   = $this->M_Model->get_Data_Pass_History($offset,$limit,$search);
        $i	= 0;
        $rows   = array();
        foreach ($data ['data'] as $r) {

           //array keys ini = attribute 'field' di view nya
		   $rows[$i]['idpass'] = $r->idpass;
           $rows[$i]['customer'] = $r->customer;
           $rows[$i]['nomor_rdo'] = $r->nomor_rdo;
           $rows[$i]['driver'] = $r->driver;
           $rows[$i]['warna'] = $r->warna;
		   $rows[$i]['nopol'] = $r->nopol;
		   $rows[$i]['tujuan'] = $r->tujuan;
		   $rows[$i]['jamkeluar'] = $r->jamkeluar;
		   $rows[$i]['tglkeluar'] = $r->tglkeluar;
		   $rows[$i]['start'] = $r->start_sewa;
		   $rows[$i]['end'] = $r->end_sewa;
		   $rows[$i]['status'] = $r->status;
		   $rows[$i]['kilometer2'] = $r->kilometer2;
		   $rows[$i]['bbm2'] = $r->bbm2;
		   $rows[$i]['kilometer1'] = $r->kilometer1;
		   $rows[$i]['bbm1'] = $r->bbm1;
		   $rows[$i]['tglmasuk'] = $r->tglmasuk;
		   $rows[$i]['jammasuk'] = $r->jammasuk;
		   $rows[$i]['keterangan'] = $r->keterangan;
		   $rows[$i]['disetujui'] = $r->approved;
		    $rows[$i]['dibuatoleh'] = $r->dibuatoleh;
         $i++;
        }

        //keys total & rows wajib bagi jEasyUI
        $result = array('total'=>$data['count'],'rows'=>$rows);
        echo json_encode($result); //return nya json
    }


	// Module Fleet

	function list_pending() {

		$this->load->view('user/pending_pass_keluar');

	}

	function list_Out() {

		$this->load->view('user/out_pass_keluar');

	}

	function get_print($id) {

		$data['print']=$this->M_Model->GetPrintData($id);
		$this->load->view('user/print_pass_keluar',$data);

	}

	function get_Pass_Pending() {

		$this->load->view('user/get_pass_data');

	}

	function Edit_Pass_Pending() {

		if($_POST['status']=='Pending') {
		$this->M_Model->M_Edit_pass_Pending();
		} else if ($_POST['status']=='Out') {
		$this->M_Model->M_Edit_pass_Out();
		}

	}

	function Reject_pass() {

		$this->M_Model->M_Reject_pass_Pending();

	}

	public function get_Data_Pass_Pending(){

        /*Default request pager params dari jeasyUI*/
        $offset = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $limit  = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $offset = ($offset-1)*$limit;
        $data   = $this->M_Model->get_Data_OutStanding($offset,$limit,$search);
        $i	= 0;
        $rows   = array();
        foreach ($data ['data'] as $r) {

           //array keys ini = attribute 'field' di view nya
		   $rows[$i]['idpass'] = $r->idpass;
           $rows[$i]['customer'] = $r->customer;
           $rows[$i]['nomor_rdo'] = $r->nomor_rdo;
           $rows[$i]['driver'] = $r->driver;
           $rows[$i]['warna'] = $r->warna;
		   $rows[$i]['nopol'] = $r->nopol;
		   $rows[$i]['tujuan'] = $r->tujuan;
		   $rows[$i]['jamkeluar'] = $r->jamkeluar;
		   $rows[$i]['tglkeluar'] = $r->tglkeluar;
		   $rows[$i]['start'] = $r->start_sewa;
		   $rows[$i]['end'] = $r->end_sewa;
		   $rows[$i]['kilometer'] = $r->kilometer1;
		   $rows[$i]['bbm'] = $r->bbm1;
		   $rows[$i]['status'] = $r->status;
         $i++;
        }

        //keys total & rows wajib bagi jEasyUI
        $result = array('total'=>$data['count'],'rows'=>$rows);
        echo json_encode($result); //return nya json
    }

	public function get_Data_Pass_Out(){

        /*Default request pager params dari jeasyUI*/
        $offset = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $limit  = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $offset = ($offset-1)*$limit;
        $data   = $this->M_Model->get_Data_Out($offset,$limit,$search);
        $i	= 0;
        $rows   = array();
        foreach ($data ['data'] as $r) {

           //array keys ini = attribute 'field' di view nya
		   $rows[$i]['idpass'] = $r->idpass;
           $rows[$i]['customer'] = $r->customer;
           $rows[$i]['nomor_rdo'] = $r->nomor_rdo;
           $rows[$i]['driver'] = $r->driver;
           $rows[$i]['warna'] = $r->warna;
		   $rows[$i]['nopol'] = $r->nopol;
		   $rows[$i]['tujuan'] = $r->tujuan;
		   $rows[$i]['jamkeluar'] = $r->jamkeluar;
		   $rows[$i]['tglkeluar'] = $r->tglkeluar;
		   $rows[$i]['start'] = $r->start_sewa;
		   $rows[$i]['end'] = $r->end_sewa;
		   $rows[$i]['kilometer'] = $r->kilometer1;
		   $rows[$i]['bbm'] = $r->bbm1;
		   $rows[$i]['status'] = $r->status;
         $i++;
        }

        //keys total & rows wajib bagi jEasyUI
        $result = array('total'=>$data['count'],'rows'=>$rows);
        echo json_encode($result); //return nya json
    }

}
