<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Surat_keluar extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('md_Global');
		$this->load->model('md_Surat_keluar');
		// notify css
		$this->template->css_add('template/gentelella/vendors/pnotify/dist/pnotify.css');
		$this->template->css_add('template/gentelella/vendors/pnotify/dist/pnotify.buttons.css');
		$this->template->css_add('template/gentelella/vendors/pnotify/dist/pnotify.nonblock.css');
		// notify js
		$this->template->js_add('template/gentelella/vendors/pnotify/dist/pnotify.js');
		$this->template->js_add('template/gentelella/vendors/pnotify/dist/pnotify.buttons.js');
		$this->template->js_add('template/gentelella/vendors/pnotify/dist/pnotify.nonblock.js');
		//dataTables css
		$this->template->css_add('assets/dataTables/media/css/jquery.dataTables.min.css');
		$this->template->css_add('assets/dataTables/media/css/dataTables.bootstrap.min.css');
		// dataTables js
		$this->template->js_add('assets/dataTables/media/js/jquery.dataTables.min.js');
		$this->template->js_add('assets/dataTables/media/js/dataTables.bootstrap.min.js');			
		$this->template->title('Surat Keluar');
	}
	
	public function dummy()
	{
		$x = $this->md_Surat_keluar->json_select();
		var_dump($x);
	}

	public function index()
	{
		$this->template->render('vw_lihat_surat_keluar');
	}


	public function ajax_lihat()
	{
		$var = $this->md_Surat_keluar->json_select();
		echo $var;
	}
	
	public function ajax_detail()
	{
		$id = $this->input->post('id_surat_keluar');
		$data = $this->md_Surat_keluar->select_detail($id);
		if($data)
		{
			$table     = '<h4>Surat Keluar</h4><br/>';
			$table    .= '<table class="table table-condensed table-striped">';
			$table 	  .= "<tr><td>Nomor Surat Keluar</td><td>".$data['no_surat_keluar']."</td></tr>";	
			$table 	  .= "<tr><td>Tanggal Masuk Surat</td><td>".$data['tgl_surat']."</td></tr>";	
			$table 	  .= "<tr><td>Ditujukan Kepada</td><td>".$data['tujuan_text']."</td></tr>";	
			$table 	  .= "<tr><td>Pengirim Surat</td><td>".$data['pembuat_surat_text']."</td></tr>";	
			$table 	  .= "<tr><td>Perihal</td><td>".$data['perihal']."<td></tr>";	
			$table 	  .= "<tr><td>Status</td><td>".$data['tahap_nama']."</td></tr>";	
			$table 	  .= "<tr><td>Catatan Tambahan</td><td>".$data['catatan_tambahan']."</td></tr>";	
			$file  	   = ($data['file'] ? anchor(base_url('uploads/surat_keluar/' . $data['file']), 'Click Untuk Melihat File Ini','target="_blank"') :'..');
			$table 	  .= "<tr><td>File Scanned</td><td>".$file."</td></tr>";	
			$table 	  .= '';
			$table    .= '</table>';
			echo $table;
		}
	}
	public function ajax_delete_surat_keluar()
	{
		$id  = $this->input->post('id_surat_keluar');
		if ($id) {
			$result = $this->md_Global->delete_data('surat_keluar', array('id_surat_keluar' => $id));
			if ($this->db->error()['code']) {
				echo json_encode($this->db->error());
			}
			else if($result)
			{
				echo 'YES';
			}
		}
		else {
			echo 'NO';
		}
	}
	public function ajax_delete_file()
	{
		$id_surat_keluar = $this->input->post('id_surat_keluar');
		$file_name = $this->input->post('file_keluar');
		$upload_path = base_url('uploads/surat_keluar/');
		$bool = get_file_info('uploads/surat_keluar/'. $file_name);
		if ($bool) {
			unlink('uploads/surat_keluar/' .  $file_name);
			$this->md_Global->update_data('surat_keluar', array('file' => '' ), array('id_surat_keluar' => $id_surat_keluar ));
			echo 'OK';
		}
		else
			echo 'NO';
	}

	public function tambah()
	{
		$this->form_validation->set_rules(
			'no_surat_keluar',
			'Nomor Surat Keluar',
			'trim|is_unique[surat_keluar.no_surat_keluar]',
			array(
				'is_unique' => 'No. Surat Keluat telah terdaftar !' 
				)
			);
		$this->form_validation->set_rules('file_keluar', '', 'callback_file_check');
		if ($this->form_validation->run() == TRUE) {
			$file_path               = '';
			$this->load->helper(array('form', 'url'));
			$config['upload_path']   ='./uploads/surat_keluar/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 0;
			$config['encrypt_name']  = true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file_keluar'))
				$file_path = $this->upload->data()['file_name'] ;
			$container = array(
				'no_surat_keluar'       => $this->input->post('no_surat_keluar'),
				'tgl_surat'             => date_converter($this->input->post('tanggal_keluar')),
				'jenis_surat_keluar_id' => $this->input->post('jenis_keluar'),
				'tujuan_id'             => $this->input->post('tujuan_id_keluar'),
				'tujuan_text'           => $this->input->post('penerima_keluar'),
				'perihal'               => $this->input->post('perihal_keluar'),
				'dikirim_via'           => $this->input->post('dikirim_via'),
				'status_surat_id'       => '1',
				'no_resi_pengiriman'    => $this->input->post('no_resi'),
				'tanggal_pengiriman'    => $this->input->post('tanggal_pengiriman'),
				'pembuat_surat_text'    => $this->input->post('pengirim_keluar'),
				'file'                  => $file_path,
				'catatan_tambahan'      => $this->input->post('catatan_tambahan_keluar'),
				'created_by'            => $this->ion_auth->user()->row_array()['username'],
				'created_on'            => time()
				);
			$res = $this->md_Global->insert_data('surat_keluar', $container);
			if ($res) {
				$this->session->set_flashdata('message', 'Berhasil entry surat Keluar');
				$this->upload->display_errors();
				exit();

				redirect('surat_keluar','refresh');
			}
		} else {
			$data['message']          = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$data['dikirim_via'] = $this->md_Global->get_data_all('tbl_pengiriman');
			$this->template->render('vw_tambah_surat_keluar', $data);
		}
	}
	public function edit($id = null)
	{
		if ($id == null || !$this->md_Global->get_data_where('surat_keluar', array('id_surat_keluar' => $id))) {
			show_404();
		}
		$this->form_validation->set_rules('file', '', 'callback_file_check');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == TRUE ) {

				$container = array(
					'no_surat_keluar'       => $this->input->post('no_surat_keluar'),
					'tgl_surat'             => date_converter($this->input->post('tanggal_keluar')),
					'jenis_surat_keluar_id' => $this->input->post('jenis_keluar'),
					'tujuan_id'             => $this->input->post('tujuan_id_keluar'),
					'tujuan_text'           => $this->input->post('penerima_keluar'),
					'perihal'               => $this->input->post('perihal_keluar'),
					'dikirim_via'           => $this->input->post('dikirim_via'),
					'status_surat_id'       => '1',
					'no_resi_pengiriman'    => $this->input->post('no_resi'),
					'tanggal_pengiriman'    => date_converter($this->input->post('tanggal_pengiriman')),
					'pembuat_surat_text'    => $this->input->post('pengirim_keluar'),
					'catatan_tambahan'      => $this->input->post('catatan_tambahan_keluar'),
					'modified_by'            => $this->ion_auth->user()->row_array()['username'],
					'modified_on'            => time()
					);

				$this->load->helper(array('form', 'url'));
				$config['upload_path'] ='./uploads/surat_keluar/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 0;
				$config['encrypt_name'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file_keluar')) {
					$file_path = $this->upload->data()['file_name'];
					$container['file'] = $file_path;	
				}


				$res = $this->md_Global->update_data('surat_keluar', $container, array('id_surat_keluar' => $id));
				if ($res) {
					$this->session->set_flashdata('message', 'Berhasil merubah data surat Keluar');
					redirect('surat_keluar','refresh');
				}
				else if ($this->db->error()['code'] == 1062) {
					$this->session->set_flashdata('message', 'Duplikat Nomor Surat Keluar');
					redirect('surat_keluar/edit/' . $id,'refresh');
				}
			}
			else {
				$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
				$surat_keluar = $this->md_Global->get_data_single('surat_keluar', array('id_surat_keluar' => $id));
				$data['dikirim_via'] = $this->md_Global->get_data_all('tbl_pengiriman');
				$data['surat_keluar'] = $surat_keluar;
				$this->template->render('vw_edit_surat_keluar', $data);
			}  
				# code...
		} 
		else 
		{
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$surat_keluar = $this->md_Global->get_data_single('surat_keluar', array('id_surat_keluar' => $id));
			$data['dikirim_via'] = $this->md_Global->get_data_all('tbl_pengiriman');
			$data['surat_keluar'] = $surat_keluar;
			$this->template->render('vw_edit_surat_keluar', $data);
		}
	}
	public function hapus($id = null)
	{
		if ($id == null) {
			show_404();
		}
		$result = $this->md_Global->delete_data('surat_masuk', array('id_surat_masuk' => $id));
		if ($this->db->error()['code']) {
			$this->session->set_flashdata('message', 'Gagal Menghapus data Penjualan');
		}
		else if ($result){
			$this->session->set_flashdata('message', 'Berhasil menghapus data Penjualan');
		}
		var_dump($this->db->error());
	}
  /*
     * file value and type check during validation
     */
  public function file_check($str)
  {
  	$allowed_mime_type_arr = array('application/pdf');
  	if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
  		$mime = get_mime_by_extension($_FILES['file']['name']);
  		if(in_array($mime, $allowed_mime_type_arr)){
  			return true;
  		}else{
  			$this->form_validation->set_message('file_check', 'Extension File Hanya Boleh PDF');
  			return false;
  		}
  	}else{
  		// $this->form_validation->set_message('file_check', 'Silahkan Pilih File PDF nya.');
  		// return false;
  		return true;
  	}
  }
  public function ipsum()
  {
  	echo form_open_multipart('surat_masuk/lorem');
  	echo form_input(array('type' => 'file','name' => 'userfile'));
  	echo form_submit('submit','upload');
  	echo form_close();
  }
  public function lorem()
  {
      // load codeigniter helpers
  	$this->load->helper(array('form','url'));
        // set path to store uploaded files
  	$config['upload_path'] = './uploads';
        // set allowed file types
  	$config['allowed_types'] = 'pdf';
        // set upload limit, set 0 for no limit
  	$config['max_size']    = 0;
        // load upload library with custom config settings
  	$this->load->library('upload');
  	$this->upload->initialize($config);
         // if upload failed , display errors
  	if (!$this->upload->do_upload())
  	{
  		echo  $this->upload->display_errors();
  	}
  	else
  	{
  		print_r($this->upload->data());
             // print uploaded file data
  	}
  }
  public function ajax_retrieve_data()
  {
  	$this->datatables->select('perihal')->from('surat_masuk');
  	echo $this->datatables->generate();
  }
}
/* End of file Surat_masuk.php */
/* Location: ./application/modules/surat_masuk/controllers/Surat_masuk.php */