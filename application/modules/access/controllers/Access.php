<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//
		$this->load->model('md_users');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}
	public function index()
	{
		redirect('access/lihat_users','refresh');
	}

	public function lihat_users()
	{

		$data['message'] = $this->session->flashdata('message');

		$data['users'] = $this->md_users->get_users();
			$this->template->js_add(base_url('assets/js/lihat_users.js'));

		$this->template->render('vw_lihat_user', $data);
		
	}

	public function lihat_groups()
	{
		
	}

	public function tambah_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[sys_users.username]',
			array('is_unique' => 'Username telah digunakan, coba yang lain')
			);
		$this->form_validation->set_rules('groups[]', 'Groups', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$phone = $this->input->post('phone');
			$expired = $this->input->post('expired');

			$user_expired = DateTime::createFromFormat('d/m/Y', $expired);
			$status = $this->input->post('status') == 'on' ? 1 : 0;
			$en_concurrent_login = $this->input->post('en_concurrent_login') == 'on' ? 1 : -1;;
			$en_change_pass = $this->input->post('en_change_pass') == 'on' ? 1 : 0;;
			$en_expired_remainder = $this->input->post('en_expired_remainder') == 'on' ? -1 : 0;
			$groups = $this->input->post('groups');

			$additional_data = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'phone' => $phone,
				'user_expired' => $user_expired->format('Y-m-d'),
				'active' => $status,
				'allow_concurrent_login' => $en_concurrent_login,
				'enable_change_password' => $en_change_pass,
				'password_expired_remainder' => $en_expired_remainder,
				);

			$res = $this->ion_auth->register($username, $password, $email, $additional_data, $groups);
			$this->session->set_flashdata('message', 'Berhasil Menambah User');
			redirect('access/lihat_users', 'refresh');
			
		} 
		else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$data['groups'] = $this->ion_auth->groups()->result();
			$this->template->css_add(base_url('template/gentelella/').'vendors/iCheck/skins/flat/green.css');
			$this->template->css_add(base_url('template/gentelella/').'vendors/switchery/dist/switchery.min.css');
			$this->template->js_add(base_url('template/gentelella/').'vendors/iCheck/icheck.min.js');
			$this->template->js_add(base_url('template/gentelella/').'vendors/switchery/dist/switchery.min.js');
			$this->template->js_add(base_url('template/gentelella/').'vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js');
			$this->template->js_add(base_url('template/gentelella/').'vendors/validator/validator.js');

			$this->template->render('vw_tambah_user', $data);
			
		}
	}

	public function edit_user($id = null)
	{
		if ($id == null) {
			show_404();
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		$this->form_validation->set_rules('groups[]', 'Groups', 'required');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->input->post('password') || $this->input->post('password2') )
			{
				$this->form_validation->set_rules('password', 'Password', 'required|matches[password2]');
				$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');


			}


			if ($this->form_validation->run() == TRUE) {

				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$phone = $this->input->post('phone');
				$expired = $this->input->post('expired');

				$user_expired = DateTime::createFromFormat('d/m/Y', $expired);
				$status = $this->input->post('status') == 'on' ? 1 : 1;
				$en_concurrent_login = $this->input->post('en_concurrent_login') == 'on' ? 1 : -1;;
				$en_change_pass = $this->input->post('en_change_pass') == 'on' ? 1 : 0;;
				$en_expired_remainder = $this->input->post('en_expired_remainder') == 'on' ? -1 : 0;
				$groups_data = $this->input->post('groups');

				$data = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'phone' => $phone,
					'user_expired' => $user_expired->format('Y-m-d'),
					'active' => $status,
					'allow_concurrent_login' => $en_concurrent_login,
					'enable_change_password' => $en_change_pass,
					'password_expired_remainder' => $en_expired_remainder,
					);
				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $password;
				}

			//Update the groups user belongs to
				$groupData = $groups_data;

				if (isset($groupData) && !empty($groupData)) {

					$this->ion_auth->remove_from_group('', $id);

					foreach ($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}

				}

				// check to see if we are updating the user
				if($this->ion_auth->update($user->id, $data))
				{
			    	// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages() );
					if ($this->ion_auth->is_admin())
					{
						redirect('access', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

				}
				else
				{
			    	// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors() );
					if ($this->ion_auth->is_admin())
					{
						redirect('access', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

				}

			}
		}
		// set the flash data error message if there is one
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$data['user'] = $user;
		$data['groups'] = $groups;
		$data['currentGroups'] = $currentGroups;

		// $this->template->css_add(base_url('template/gentelella/').'vendors/iCheck/skins/flat/green.css');
		// $this->template->css_add(base_url('template/gentelella/').'vendors/switchery/dist/switchery.min.css');
		// $this->template->js_add(base_url('template/gentelella/').'vendors/iCheck/icheck.min.js');
		// $this->template->js_add(base_url('template/gentelella/').'vendors/switchery/dist/switchery.min.js');
		// $this->template->js_add(base_url('template/gentelella/').'vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js');
		// $this->template->js_add(base_url('template/gentelella/').'vendors/validator/validator.js');
		$this->template->render('vw_edit_user', $data);
		

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

	public function dummy()
	{
		$id = $this->input->post('id');
		$user = $this->ion_auth->user($id)->row()->username;
		$groups = $this->ion_auth->get_users_groups($id)->result();

		array_push($groups, $user);
		echo json_encode($groups);
		exit;

	}

}

/* End of file Users.php */
/* Location: ./application/modules/users/controllers/Users.php */