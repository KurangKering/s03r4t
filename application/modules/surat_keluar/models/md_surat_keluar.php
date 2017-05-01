<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_Surat_keluar extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	
	public function select_detail($id)
	{
		
		if ($id) {
			$sql = 'SELECT surat_keluar.*, ref_tahapan_proses.nama as tahap_nama , tbl_pengiriman.nama_pengiriman from surat_keluar join ref_tahapan_proses on surat_keluar.status_surat_id = ref_tahapan_proses.id join tbl_pengiriman on surat_keluar.dikirim_via = tbl_pengiriman.id where id_surat_keluar = ?'; 
			$result = $this->db->query($sql, array($id));
			if ($result->num_rows() > 0 ) {
				$data[] = $result->row_array();
				return $data[0];
			}
		}
		return '';
		
	}
	public function select_surat_masuk()
	{

		$sql = 'SELECT surat_keluar.*, ref_eselon.kode, ref_eselon.nama    FROM surat_masuk  JOIN ref_eselon ON surat_masuk.disposisi_tujuan_id = ref_eselon.id ';
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0 ) {
			return $result->result_array();
			# code...
		}
		return array();
		
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

	public function json_select()
	{
		$this->datatables->select('id_surat_keluar, no_surat_keluar, tgl_surat, tujuan_text, perihal, file, pembuat_surat_text, ref_tahapan_proses.nama ')
		->from('surat_keluar')
		->join('ref_tahapan_proses', 'surat_keluar.status_surat_id = ref_tahapan_proses.id')

		->add_column('nomor_urut', '0')
		->add_column('view', '<button class="btn btn-round btn-info btn-xs"  onClick="showDetails($1)" id="detail" data-tooltip="tooltip" data-placement="left" title="Lihat Detail">details</button> <a href="'. base_url('surat_keluar/') .'edit/$1" class="btn btn-round btn-warning btn-xs">edit</a> <button type="button" class="btn btn-round btn-danger btn-xs" data-id_surat_keluar="$1" data-href="surat_keluar/hapus/$1"  data-toggle="modal" data-target="#confirm_delete_keluar">delete</button>', 'id_surat_keluar');
		return $this->datatables->generate();

	}

}

/* End of file md_surat_masuk.php */
/* Location: ./application/modules/surat_masuk/models/md_surat_masuk.php */