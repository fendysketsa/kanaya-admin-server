<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');

		if ($this->form_validation->run() != false) {

			$username = $this->input->post('nama');
			$password = $this->input->post('kata_sandi');
			$berhasil = $this->Auth_model->login($username, $password, 'superuser');

			if ($berhasil['count'] == 1) {
				$this->session->set_userdata([
					'status_login' => 'sukses',
					'logged_in' => true,
					'name' => $berhasil['row']->nama,
					'level' => 1,
				]);

				$data['code'] = 200;
				$data['msg'] = 'Anda berhasil login';
				$data['redirect'] = '/dashboard';

				echo json_encode($data);
			} else {

				$berhasil_pegawai = $this->Auth_model->login($username, $password, 'pegawai');

				if ($berhasil_pegawai['count'] == 1) {

					$this->session->set_userdata([
						'status_login' => 'sukses',
						'logged_in' => true,
						'name' => $berhasil_pegawai['row']->nama,
						'level' => $berhasil_pegawai['row']->role_id,
					]);

					$data['code'] = 200;
					$data['msg'] = 'Anda berhasil login';
					$data['redirect'] = '/dashboard';
				} else {
					$data['code'] = 500;
					$data['msg'] = 'Anda tidak berhasil login';
				}

				echo json_encode($data);
			}
		} else {

			if (!empty($this->session->userdata('logged_in'))) {
				redirect('dashboard');
			}

			$data = [
				'meta' => [
					'meta' => 'login/partial/meta',
					'title' => 'Kanaya | Form Login',
				],
				'content' => 'login/partial/content',
				'footer' => 'login/partial/footer',
			];
			$this->load->view('login/index', $data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
