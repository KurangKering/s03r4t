<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_arsip extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	
	public function select_detail($id)
	{
		
		if ($id) {
			$sql = 'SELECT surat_arsip.*, concat(sys_users.first_name, " " , sys_users.last_name) as nama from surat_arsip join sys_users on surat_arsip.nama_penyerah = sys_users.id';
			$result = $this->db->query($sql, array($id));
			if ($result->num_rows() > 0 ) {
				$data[] = $result->row_array();
			}
		}
		return $data[0];
		
	}
	public function select_surat_masuk()
	{

		$sql = 'SELECT surat_masuk.*, ref_eselon.kode, ref_eselon.nama    FROM surat_masuk  JOIN ref_eselon ON surat_masuk.disposisi_tujuan_id = ref_eselon.id ';
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
		$this->datatables->select('surat_arsip.id as id_surat_arsip, no_ruang, no_lemari, no_rak, no_berkas, nomor_arsip, perkara_id, nomor_perkara, tanggal_masuk_arsip, nama_penerima, nama_penyerah, lengkap, status, keterangan, concat(sys_users.first_name, " ", sys_users.last_name) as nama' )
		->from('surat_arsip')
		->join('sys_users', 'surat_arsip.nama_penerima = sys_users.id')
		->add_column('nomor_urut', '0')
		->add_column('view', '<button class="btn btn-round btn-info btn-xs"  onClick="showDetails($1)" id="detail_arsip" data-tooltip="tooltip" data-placement="left" title="Lihat Detail">details</button> <a href="'. base_url('arsip/') .'edit/$1" class="btn btn-round btn-warning btn-xs">edit</a> <button type="button" class="btn btn-round btn-danger btn-xs" data-id_arsip="$1" data-href="arsip/hapus/$1"  data-toggle="modal" data-target="#confirm-delete">delete</button>', 'id_surat_arsip');
		return $this->datatables->generate();

	}

}

/* End of file md_surat_masuk.php */
/* Location: ./application/modules/surat_masuk/models/md_surat_masuk.php */