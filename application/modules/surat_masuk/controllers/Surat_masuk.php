<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Surat_masuk extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('md_Global');
		$this->load->model('md_Surat_masuk');
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
		$this->template->title('Surat Masuk');
	}
	public function index()
	{
		$this->template->render('vw_lihat_surat_masuk');
	}
	public function ajax_lihat()
	{
		$var = $this->md_Surat_masuk->json_select();
		echo $var;
	}
	
	public function ajax_detail()
	{
		$id = $this->input->post('id_surat_masuk');
		$data = $this->md_Surat_masuk->select_detail($id);
		if($data)
		{
			$table     = '<h4>Surat Masuk</h4><br/>';
			$table    .= '<table class="table table-condensed table-striped">';
			$table 	  .= "<tr><td>Nomor Lembar Disposisi</td><td>".$data['no_lembar_disposisi']."</td></tr>";	
			$table 	  .= "<tr><td>Tanggal Masuk</td><td>".$data['tgl_masuk']."</td></tr>";	
			$table 	  .= "<tr><td>Ditujukan Kepada</td><td>".$data['tujuan_text']."</td></tr>";	
			$table 	  .= "<tr><td>Pengirim Surat</td><td>".$data['pengirim']."</td></tr>";	
			$table 	  .= "<tr><td>Perihal</td><td>".$data['perihal']."<td></tr>";	
			$table 	  .= "<tr><td>Disposisi Tujuan</td><td>".$data['eselon_nama']."</td></tr>";	
			$table 	  .= "<tr><td>Status</td><td>".$data['tahap_nama']."</td></tr>";	
			$table 	  .= "<tr><td>Catatan Tambahan</td><td>".$data['catatan_tambahan']."</td></tr>";	
			$table 	  .= "<tr><td>File Scanned</td><td>".$data['catatan_tambahan']."</td></tr>";	
			$file  	   = ($data['file'] ? anchor(base_url('uploads/surat_masuk/' . $data['file']), 'Click Untuk Melihat File Ini','target="_blank"') :'..');
			$table 	  .= "<tr><td>File Scanned</td><td>".$file."</td></tr>";	
			$table 	  .= '';
			$table    .= '</table>';
			echo $table;
		}
	}
	public function ajax_delete_surat_masuk()
	{
		$id  = $this->input->post('id_surat_masuk');
		if ($id) {
			$result = $this->md_Global->delete_data('surat_masuk', array('id_surat_masuk' => $id));
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
		$id_surat_masuk = $this->input->post('id_surat_masuk');
		$file_name = $this->input->post('file');
		$upload_path = base_url('uploads/surat_masuk/');
		$bool = get_file_info('uploads/surat_masuk/'. $file_name);
		if ($bool) {
			unlink('uploads/surat_masuk/' .  $file_name);
			$this->md_Global->update_data('surat_masuk', array('file' => '' ), array('id_surat_masuk' => $id_surat_masuk ));
			echo 'OK';
		}
		else
			echo 'NO';
	}

	public function tambah()
	{
		$this->form_validation->set_rules(
			'no_lembar_disposisi',
			'Nomor Lembar Disposisi',
			'trim|is_unique[surat_masuk.no_lembar_disposisi]',
			array(
				'is_unique' => 'No. Lembar Disposisi Yang Diinput telah terdaftar !' 
				)
			);
		$this->form_validation->set_rules('file', '', 'callback_file_check');
		if ($this->form_validation->run() == TRUE) {
			$file_path               = '';
			$this->load->helper(array('form', 'url'));
			$config['upload_path']   ='./uploads/surat_masuk/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 0;
			$config['encrypt_name']  = true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file'))
				$file_path = $this->upload->data()['file_name'] ;
			$container = array(
				'no_lembar_disposisi' => $this->input->post('no_lembar_disposisi'),
				'tgl_masuk'           => date_converter($this->input->post('tanggal_masuk')),
				'tujuan_id'           => $this->input->post('tujuan_id'),
				'status_id'           => '1',
				'pengirim'            => $this->input->post('pengirim'),
				'tujuan_text'         => $this->input->post('penerima'),
				'perihal'             => $this->input->post('perihal'),
				'disposisi_tujuan_id' => $this->input->post('disposisi_tujuan_id'),
				'file'                => $file_path,
				'catatan_tambahan'    => $this->input->post('catatan_tambahan'),
				'created_by'          => $this->ion_auth->user()->row_array()['username'],
				'created_on'          => time()
				);
			$res = $this->md_Global->insert_data('surat_masuk', $container);
			if ($res) {
				$this->session->set_flashdata('message', 'Berhasil entry surat Masuk');
				redirect('surat_masuk','refresh');
			}
		} else {
			$data['message']          = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$data['disposisi_tujuan'] = $this->md_Surat_masuk->select_disposisi_tujuan();
			$this->template->render('vw_tambah_surat_masuk', $data);
		}
	}
	public function edit($id = null)
	{
		if ($id == null || !$this->md_Global->get_data_where('surat_masuk', array('id_surat_masuk' => $id))) {
			show_404();
		}
		$this->form_validation->set_rules('file', '', 'callback_file_check');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == TRUE ) {

				$container = array(
					'no_lembar_disposisi' => $this->input->post('no_lembar_disposisi'),
					'tgl_masuk'           => date_converter($this->input->post('tanggal_masuk')),
					'tujuan_id'           => $this->input->post('tujuan_id'),
					'pengirim'            => $this->input->post('pengirim'),
					'tujuan_text'         => $this->input->post('penerima'),
					'perihal'             => $this->input->post('perihal'),
					'disposisi_tujuan_id' => $this->input->post('disposisi_tujuan_id'),
					'catatan_tambahan'    => $this->input->post('catatan_tambahan'),
					'modified_by'         => $this->ion_auth->user()->row_array()['username'],
					'modified_on'         => time()
					);

				$this->load->helper(array('form', 'url'));
				$config['upload_path'] ='./uploads/surat_masuk/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 0;
				$config['encrypt_name'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file')) {
					$file_path = $this->upload->data()['file_name'];
					$container['file'] = $file_path;	
				}


				$res = $this->md_Global->update_data('surat_masuk', $container, array('id_surat_masuk' => $id));
				if ($res) {
					$this->session->set_flashdata('message', 'Berhasil merubah data surat Masuk');
					redirect('surat_masuk','refresh');
				}
				else if ($this->db->error()['code'] == 1062) {
					$this->session->set_flashdata('message', 'Duplikat Nomor Lembar Disposisi terdeteksi');
					redirect('surat_masuk/edit/' . $id,'refresh');
				}
			}
			else {
				$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
				$surat_masuk = $this->md_Global->get_data_single('surat_masuk', array('id_surat_masuk' => $id));
				$data['disposisi_tujuan'] = $this->md_Surat_masuk->select_disposisi_tujuan();
				$data['surat_masuk'] = $surat_masuk;
				$this->template->render('vw_edit_surat_masuk', $data);
			}  
				# code...
		} 
		else 
		{
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$surat_masuk = $this->md_Global->get_data_single('surat_masuk', array('id_surat_masuk' => $id));
			$data['disposisi_tujuan'] = $this->md_Surat_masuk->select_disposisi_tujuan();
			$data['surat_masuk'] = $surat_masuk;
			$this->template->render('vw_edit_surat_masuk', $data);
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
  public function file_check($str){
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