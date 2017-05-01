<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arsip extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('md_Global');
		$this->load->model('md_arsip');
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
		$this->template->title('Arsip');
	}
	public function index()
	{
		$this->template->render('vw_lihat_arsip');
	}
	public function ajax_lihat()
	{
		$var = $this->md_arsip->json_select();
		echo $var;
	}
	
	public function ajax_detail()
	{
		$id = $this->input->post('id_arsip');
		$data = $this->md_arsip->select_detail($id);
		if($data)
		{
			$table     = '<h4>Data Detail Arsip</h4><br/>';
			$table    .= '<table class="table table-condensed table-striped">';
			$table 	  .= "<tr><td>Nomor Ruang</td><td>".$data['no_ruang']."</td></tr>";	
			$table 	  .= "<tr><td>Nomor Lemari</td><td>".$data['no_lemari']."</td></tr>";	
			$table 	  .= "<tr><td>Nomor Rak</td><td>".$data['no_rak']."</td></tr>";	
			$table 	  .= "<tr><td>Nomor Berkas</td><td>".$data['no_berkas']."</td></tr>";	
			$table 	  .= "<tr><td>Nomor Arsip</td><td>".$data['nomor_arsip']."</td></tr>";	
			$table 	  .= "<tr><td>Perkara Id</td><td>".$data['perkara_id']."</td></tr>";	
			$table 	  .= "<tr><td>Nomor Perkara</td><td>".$data['nomor_perkara']."</td></tr>";	
			$table 	  .= "<tr><td>Tanggal Masuk Arsip</td><td>".$data['tanggal_masuk_arsip']."</td></tr>";	
			$table 	  .= "<tr><td>Nama Penerima</td><td>".$data['nama']."</td></tr>";	
			$table 	  .= "<tr><td>Nama Penyerah</td><td>".$data['nama_penyerah']."</td></tr>";	
			$table 	  .= "<tr><td>Lengkap ? </td><td>".$data['lengkap']."</td></tr>";	
			$table 	  .= "<tr><td>Status</td><td>".$data['status']."</td></tr>";	
			$table 	  .= "<tr><td>Keterangan</td><td>".$data['keterangan']."</td></tr>";	
			
			$table 	  .= '';
			$table    .= '</table>';
			echo $table;
		}
	}
	public function ajax_delete_surat_arsip()
	{
		$id  = $this->input->post('id_arsip');
		if ($id) {
			$result = $this->md_Global->delete_data('surat_arsip', array('id' => $id));
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
			'no_perkara',
			'Nomor Perkara',
			'trim|is_unique[surat_arsip.nomor_perkara]',
			array(
				'is_unique' => 'No. Perkara Telah Ada !' 
				)
			);

		$this->form_validation->set_rules('file', '', 'callback_file_check');
		if ($this->form_validation->run() == TRUE) {
			$container = array(
				'no_ruang' => $this->input->post('no_ruang'),
				'no_lemari' => $this->input->post('no_lemari'),
				'no_rak' => $this->input->post('no_rak'),
				'no_berkas' => $this->input->post('no_berkas'),
				'nomor_arsip' => $this->input->post('no_arsip'),
				'perkara_id' => $this->input->post('perkara_id'),
				'nomor_perkara' => $this->input->post('no_perkara'),
				'tanggal_masuk_arsip' => $this->input->post('tanggal_masuk_arsip'),
				'nama_penerima' => $this->input->post('nama_penerima'),
				'nama_penyerah' => $this->input->post('nama_penyerah'),
				'lengkap' => $this->input->post('lengkap'),
				'status' => $this->input->post('status'),
				'keterangan' => $this->input->post('keterangan'),
				'diinput_oleh' => $this->ion_auth->user()->row_array()['username'],
				'diinput_tanggal' => time(),
				);
			$res = $this->md_Global->insert_data('surat_arsip', $container);
			if ($res) {
				$this->session->set_flashdata('message', 'Berhasil entry Arsip');
				redirect('arsip','refresh');
			}
		} else {
			$data['message']          = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$data['nama_penerima'] = $this->md_Global->get_data_all('sys_users');
			$this->template->render('vw_tambah_arsip', $data);
		}
	}
	public function edit($id = null)
	{
		if ($id == null || !$this->md_Global->get_data_where('surat_arsip', array('id' => $id))) {
			show_404();
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$container = array(
				'no_ruang' => $this->input->post('no_ruang'),
				'no_lemari' => $this->input->post('no_lemari'),
				'no_rak' => $this->input->post('no_rak'),
				'no_berkas' => $this->input->post('no_berkas'),
				'nomor_arsip' => $this->input->post('no_arsip'),
				'perkara_id' => $this->input->post('perkara_id'),
				'nomor_perkara' => $this->input->post('no_perkara'),
				'tanggal_masuk_arsip' => $this->input->post('tanggal_masuk_arsip'),
				'nama_penerima' => $this->input->post('nama_penerima'),
				'nama_penyerah' => $this->input->post('nama_penyerah'),
				'lengkap' => $this->input->post('lengkap'),
				'status' => $this->input->post('status'),
				'keterangan' => $this->input->post('keterangan'),
				'diperbaharui_oleh' => $this->ion_auth->user()->row_array()['username'],
				'diperbaharui_tanggal' => time(),
				);
			$res = $this->md_Global->update_data('surat_arsip', $container, array('id' => $id));
			if ($res) {
				$this->session->set_flashdata('message', 'Berhasil merubah data Arsip');
				redirect('arsip','refresh');
			}
			else if ($this->db->error()['code'] == 1062) {
				$this->session->set_flashdata('message', 'Duplikat Nomor Perkara Terdeteksi');
				redirect('arsip/edit/' . $id,'refresh');
			}
		}
		else {
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$data['arsip'] = $this->md_Global->get_data_single('surat_arsip', array('id' => $id));
			$data['nama_penerima'] = $this->md_Global->get_data_all('sys_users');
			$this->template->render('vw_edit_arsip', $data);
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