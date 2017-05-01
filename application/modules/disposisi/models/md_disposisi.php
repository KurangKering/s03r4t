<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_disposisi extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	
	public function select_detail($id)
	{

		$sql = 'SELECT surat_masuk.*, surat_disposisi.* from surat_masuk 
		join surat_disposisi on surat_masuk.id_surat_masuk = surat_disposisi.id_surat_masuk';

		$result = $this->db->query($sql, array($id));

		if ($result->num_rows() > 0 ) {
			$data[] = $result->row_array();
			return $data;

		}
		return array();


	}
	public function get_user_satu()
	{
		$sql = 'SELECT * from sys_users join sys_user_group on sys_users.id = sys_user_group.user_id join sys_groups on sys_groups.id = sys_user_group.group_id and sys_groups.id IN (30, 40)';
	}
	public function select_tujuan_disposisi_satu()
	{
		$sql = 'SELECT * FROM sys_groups WHERE id IN ("10")';
		$result = $this->db->qurey($sql);

		return $result->result_array();

	}
	public function select_surat_masuk()
	{

		$sql = 'SELECT surat_masuk.*, ref_eselon.kode, ref_eselon.nama    
		FROM surat_masuk  JOIN ref_eselon ON surat_masuk.disposisi_tujuan_id = ref_eselon.id ';

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

	public function json_select($status)
	{
		$query = '';
		$and_separator = 'AND status_id = ';
		if ($status == '0')
			$link_disposisi = '';
		else if ($status == '1'){
			$query .= $and_separator . $status;
			$link_disposisi = '<a href="'. base_url('disposisi/') .'tahap_satu/$1#step-1" class="btn btn-round btn-primary btn-xs">Disposisi</a>';
		}
		else if ($status == '2'){
			$query .= $and_separator . $status;
			$link_disposisi = '<a href="'. base_url('disposisi/') .'tahap_dua/$1#step-2" class="btn btn-round btn-primary btn-xs">Disposisi</a>';
		}
		else if ($status == '3'){
			$query .= $and_separator . $status;
			$link_disposisi = '<a href="'. base_url('disposisi/') .'tahap_tiga/$1#step-3 " class="btn btn-round btn-primary btn-xs">Disposisi</a>';
		}


		$this->datatables->select(
			'id_surat_masuk, 
			no_lembar_disposisi, 
			DATE_FORMAT(tgl_masuk, "%d/%m/%Y") as tgl_masuk, 
			pengirim, 
			perihal, 
			tujuan_text, 
			ref_tahapan_proses.nama as status_nama'
			)
		->from('surat_masuk')
		->join(
			'ref_tahapan_proses', 
			'surat_masuk.status_id = ref_tahapan_proses.id '. $query)
		->add_column('nomor_urut', '0')
		->add_column('view', 
			'<button class="btn btn-round btn-info btn-xs"  onClick="showDetails($1)" id="detail" data-tooltip="tooltip" data-placement="left" title="Lihat Detail">details</button> '. $link_disposisi , 'id_surat_masuk');
		return $this->datatables->generate();

	}

}

/* End of file md_surat_masuk.php */
	/* Location: ./application/modules/surat_masuk/models/md_surat_masuk.php */