<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	public function __construct()	
	{
		parent::__construct();
		$this->load->model('md_Global');
		$this->load->model('md_Surat_masuk');

		$this->template->css_add('template/gentelella/vendors/pnotify/dist/pnotify.css');
		$this->template->css_add('template/gentelella/vendors/pnotify/dist/pnotify.buttons.css');
		$this->template->css_add('template/gentelella/vendors/pnotify/dist/pnotify.nonblock.css');

		$this->template->js_add('template/gentelella/vendors/pnotify/dist/pnotify.js');
		$this->template->js_add('template/gentelella/vendors/pnotify/dist/pnotify.buttons.js');
		$this->template->js_add('template/gentelella/vendors/pnotify/dist/pnotify.nonblock.js');
	}

	public function index()
	{
		
	}

	public function lihat()
	{
		$data['surat_masuk'] = $this->md_Surat_masuk->select_surat_masuk();
		$this->template->render('vw_data_surat_masuk', $data);

	}

	/**
	 * [tambah description]
	 * @return [type] [description]
	 */
	public function tambah()
	{
		$this->form_validation->set_rules(
			'no_lembar_disposisi', 
			'Nomor Lembar Disposisi', 
			'trim|is_unique[surat_masuk.no_lembar_disposisi]', 
			array('is_unique' => 'No. Lembar Disposisi Yang Diinput telah terdaftar !' )
			);
		$this->form_validation->set_rules('file', '', 'callback_file_check');
		if ($this->form_validation->run() == TRUE) {
			
			$file_path = '';
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] ='./uploads/surat_masuk/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$config['encrypt_name'] = true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file'))
				$file_path = $this->upload->data()['file_name'];

			$container = array(
				'no_lembar_disposisi' => $this->input->post('no_lembar_disposisi'),
				'tgl_masuk'           => date_converter($this->input->post('tanggal_masuk')),
				'tujuan_id'           => $this->input->post('tujuan_id'),
				'pengirim'            => $this->input->post('pengirim'),
				'tujuan_text'         => $this->input->post('penerima'),
				'perihal'             => $this->input->post('perihal'),
				'disposisi_tujuan_id' => $this->input->post('disposisi_tujuan_id'),
				'file'                => $file_path,
				'catatan_tambahan'    => $this->input->post('catatan_tambahan'),
				'created_by'          => $this->input->post('no_lembar_disposisi'),
				'created_on'          => time()
				);


			$res = $this->md_Global->insert_data('surat_masuk', $container);
			if ($res) {
				$this->session->set_flashdata('message', 'Berhasil entry surat Masuk');
				redirect('surat_masuk/data_surat_masuk','refresh');
			}

			
		} else {

			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$data['disposisi_tujuan'] = $this->md_Surat_masuk->select_disposisi_tujuan();
			$this->template->render('vw_tambah_surat_masuk', $data);
			
		}
		
	}

	public function ubah($id = null)
	{
		if ($id == null) {
			show_404();
		}
	}

	public function hapus($id = null)
	{
		if ($id == null) {
			# code...
		}show_404();
	}
  /*
     * file value and type check during validation
     */
  public function file_check($str){
  	$allowed_mime_type_arr = array('application/pdf');
  	$mime = get_mime_by_extension($_FILES['file']['name']);
  	if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
  		if(in_array($mime, $allowed_mime_type_arr)){
  			return true;
  		}else{
  			$this->form_validation->set_message('file_check', 'Extension File Hanya Boleh PDF');
  			return false;
  		}
  	}else{
  		$this->form_validation->set_message('file_check', 'Silahkan Pilih File PDF nya.');
  		return false;
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

}

/* End of file Surat_masuk.php */
/* Location: ./application/modules/surat_masuk/controllers/Surat_masuk.php */