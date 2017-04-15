<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//
		$this->load->model('md_users');
	}
	public function index()
	{
		redirect('access/lihat_users','refresh');
	}

	public function lihat_users()
	{

		$data['users'] = $this->md_users->get_users();
		

		$this->template->content->view('vw_lihat_user', $data);
		$this->template->publish();
	}

	public function lihat_groups()
	{
		$this->template->publish();
	}
	public function tambah_user()
	{

		$data['groups'] = $this->ion_auth->groups()->result();

		$this->template->stylesheet->add(base_url('template/gentelella/').'vendors/iCheck/skins/flat/green.css');
		$this->template->stylesheet->add(base_url('template/gentelella/').'vendors/switchery/dist/switchery.min.css');
		$this->template->javascript->add(base_url('template/gentelella/').'vendors/iCheck/icheck.min.js');
		$this->template->javascript->add(base_url('template/gentelella/').'vendors/switchery/dist/switchery.min.js');
		$this->template->javascript->add(base_url('template/gentelella/').'vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js');
		$this->template->javascript->add(base_url('template/gentelella/').'vendors/validator/validator.js');

		$this->template->content->view('vw_tambah_user', $data);
		$this->template->publish();
	}

	public function edit_user($id)
	{

	}


	public function hapus_user($id)
	{

	}


	public function tambah_group()
	{

	}

	public function edit_group($id)
	{

	}

}

/* End of file Users.php */
/* Location: ./application/modules/users/controllers/Users.php */