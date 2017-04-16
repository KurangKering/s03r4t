<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		
	}

	public function tambah()
	{
		$this->form_validation->set_rules('no_lembar_disposisi', 'Nomor Lembar Disposisi', 'trim|required|is_unique[surat_masuk.no_lembar_disposisi]');
		if ($this->form_validation->run() == TRUE) {
			
			var_dump($_POST);
			$container = array(
				'no_lembar_disposisi' => $this->input->post('no_lembar_disposisi'),
				'tgl_masuk' => $this->input->post('no_lembar_disposisi'),
				'tujuan_text' => $this->input->post('no_lembar_disposisi'),
				'pengirim' => $this->input->post('no_lembar_disposisi'),
				'perihal' => $this->input->post('no_lembar_disposisi'),
				'file' => $this->input->post('no_lembar_disposisi'),
				'disposisi_tujuan_id' => $this->input->post('no_lembar_disposisi'),
				'catatan_tambahan' => $this->input->post('no_lembar_disposisi'),
				);

			
		} else {
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

			$this->template->content->view('vw_tambah_surat_masuk', $data);
			$this->template->publish();
		}
		
	}

	public function data_surat_masuk()
	{
		$this->template->content->view('vw_data_surat_masuk');
		$this->template->publish();
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