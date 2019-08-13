<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Model extends CI_Model {


function __construct() {
        parent::__construct();
    }

	// MODULE RENTAL MARKETING OFFICER

	function Ambil_Customer() {

		$sql=$this->db->query("SELECT * FROM master_customer WHERE aktif='1' ORDER BY customer ASC");

		return $sql->result();

	}

	function Ambil_Nopol() {

		$sql=$this->db->query("SELECT * FROM master_unit WHERE status_ready='Y' ORDER BY nopol ASC");

		return $sql->result();

	}

    public function get_Data($offset,$limit,$q=''){

        $sql = "SELECT * FROM tblpass WHERE 1=1 AND iduser='".$this->session->userdata('pas_userid')."' AND status!='Done' ";
        if($q!=''){

            $sql .=" AND nomor_rdo LIKE '%{$q}%' ";
        }
        $result['count'] = $this->db->query($sql)->num_rows();
        $sql .=" LIMIT {$offset},{$limit} ";
        $result['data'] = $this->db->query($sql)->result();

        return $result;
    }

	// History Pass keluar
	public function get_Data_Berkas_pass_keluar($offset,$limit,$q=''){

        $sql = "SELECT * FROM tblpass WHERE 1=1 AND status='In'";
        if($q!=''){

            $sql .=" AND nomor_rdo LIKE '%{$q}%' ";
        }
        $result['count'] = $this->db->query($sql)->num_rows();
        $sql .=" LIMIT {$offset},{$limit} ";
        $result['data'] = $this->db->query($sql)->result();

        return $result;
    }

	// Cek Berkas Pass keluar
	public function get_Data_Pass_History($offset,$limit,$q=''){

        $sql = "SELECT * FROM tblpass WHERE 1=1 AND status='Done'";
        if($q!=''){

            $sql .=" AND nomor_rdo LIKE '%{$q}%' ";
        }
        $result['count'] = $this->db->query($sql)->num_rows();
        $sql .=" LIMIT {$offset},{$limit} ";
        $result['data'] = $this->db->query($sql)->result();

        return $result;
    }


	function M_Save_pass() {

		$query=$this->db->query("INSERT tblpass SET iduser='".$this->session->userdata('pas_userid')."',customer='".strtoupper($_POST['customer'])."',nomor_rdo='$_POST[nomor_rdo]',nopol='$_POST[nopol]',warna='$_POST[warna]',
		driver='".strtoupper($_POST['driver'])."',tujuan='".strtoupper($_POST['tujuan'])."',tglkeluar='$_POST[tglkeluar]',jamkeluar='$_POST[jamkeluar]',start_sewa='$_POST[start]',end_sewa='$_POST[end]',status='Pending'");

		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been save...'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}

	}

	function M_Edit_pass() {

		$query=$this->db->query("UPDATE tblpass SET customer='$_POST[customer]',nomor_rdo='$_POST[nomor_rdo]',nopol='$_POST[nopol]',warna='$_POST[warna]',
		driver='$_POST[driver]',tujuan='$_POST[tujuan]',tglkeluar='$_POST[tglkeluar]',jamkeluar='$_POST[jamkeluar]',start_sewa='$_POST[start]',end_sewa='$_POST[end]' WHERE idpass='$_POST[idpass]'");

		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been updated...'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}

	}

	function M_Delete_pass() {

		$query=$this->db->query("DELETE FROM tblpass WHERE idpass='$_POST[id]'");

		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been delete'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}

	}


	// MODULE FLEET

	public function get_Data_OutStanding($offset,$limit,$q=''){

        $sql = "SELECT * FROM tblpass WHERE 1=1 AND status='Pending'";
        if($q!=''){

            $sql .=" AND nomor_rdo LIKE '%{$q}%' ";
        }

        $result['count'] = $this->db->query($sql)->num_rows();
        $sql .=" LIMIT {$offset},{$limit} ";
        $result['data'] = $this->db->query($sql)->result();

        return $result;
    }

	public function get_Data_Out($offset,$limit,$q=''){

        $sql = "SELECT * FROM tblpass WHERE 1=1 AND status='Out'";
        if($q!=''){

            $sql .=" AND nomor_rdo LIKE '%{$q}%' ";
        }

        $result['count'] = $this->db->query($sql)->num_rows();
        $sql .=" LIMIT {$offset},{$limit} ";
        $result['data'] = $this->db->query($sql)->result();

        return $result;
    }

	function M_Edit_pass_Pending() {

		$cek=$this->db->query("select idpass,nopol,kilometer2 from tblpass where idpass IN (select max(idpass) from tblpass group by nopol) AND nopol='$_POST[nopol]';");
    $rest=$cek->row();
    if($rest->kilometer2 > $_POST['kilometer']) {
      	echo json_encode(array('errorMsg'=>'Kilometer harus lebih tinggi dari kilometer sebelumnya'));
    } else {

		$query=$this->db->query("UPDATE tblpass SET kilometer1='$_POST[kilometer]',bbm1='$_POST[bbm]',dibuatoleh='".$this->session->userdata('pas_nama')."', status='Out' WHERE idpass='$_POST[idpass]';");
        $this->db->query("UPDATE master_unit SET status_ready='N' WHERE nopol='$_POST[nopol]';");

		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been updated...'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}

  }

}

	function M_Edit_pass_Out() {

    if($_POST['kilometer'] > $_POST['kilometerakhir']) {
        echo json_encode(array('errorMsg'=>'Kilometer akhir harus lebih tinggi dari kilometer awal'));
    } else {

		$query=$this->db->query("UPDATE tblpass SET kilometer2='$_POST[kilometerakhir]',bbm2='$_POST[bbmakhir]',tglmasuk='$_POST[tglmasuk]',jammasuk='$_POST[jammasuk]',keterangan='$_POST[reason]',status='In' WHERE idpass='$_POST[idpass]';");
        $this->db->query("UPDATE master_unit SET status_ready='N' WHERE nopol='$_POST[nopol]';");
		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been updated...'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
  }
}

function M_Reject_pass_Pending() {

		$query=$this->db->query("UPDATE tblpass SET keterangan='$_POST[reason]',status='Reject' WHERE idpass='$_POST[idpass]'");

		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been Rejected...'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}

	}

	function GetPrintData($id) {

		$query=$this->db->query("SELECT a.*,b.type FROM tblpass  a inner join master_unit b ON a.nopol=b.nopol WHERE idpass='$id'");

		return $query->result();

	}

	function M_Received_pass() {

		$query=$this->db->query("UPDATE tblpass SET status='Done' WHERE idpass='$_POST[idpass]'");

		if ($query){

			echo json_encode(array('SuccessMsg'=>'Data has been received...'));

		} else {

			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}

	}

}
