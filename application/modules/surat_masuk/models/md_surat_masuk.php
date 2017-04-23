<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_Surat_masuk extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	

	public function select_disposisi_tujuan()
	{
		$sql = 'SELECT * FROM ref_eselon WHERE kode = "ESELON IV" ';
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0 ) {
			return $result->result_array();
			# code...
		}
		return array();
	}

}

/* End of file md_surat_masuk.php */
/* Location: ./application/modules/surat_masuk/models/md_surat_masuk.php */