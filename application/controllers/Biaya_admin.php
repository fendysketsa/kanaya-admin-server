<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya_Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('logged_in'))) {
			redirect('auth/login');
		}

		if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 7) {
			redirect('auth/login');
		}

		$this->load->model('order_admin_model', 'order_admin');
		$this->load->model('member_model', 'member');
		$this->load->model('setoran_model', 'setoran');
		// $this->load->library('datatables');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data = [
			'meta' => [
				'meta' => 'dashboard/partial/meta',
				'title' => 'Admin -  Data Biaya Admin | Dashboard',
				'css' => [
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
				],
			],
			'sidebar' => 'dashboard/partial/sidebar',
			'top' => 'dashboard/partial/top',
			'content' => 'dashboard/partial/main',
			'pages' => [
				'pages' => 'dashboard/master/biaya-admin/content',
			],
			'footer' => [
				'js' => [
					'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
					'assets/dashboard/master/biaya-admin/order.js',
				],
				'footer' => 'dashboard/partial/footer',
			],
		];

		$this->load->view('dashboard/partial/contents/index', $data);
	}


	public function data()
	{
		$this->load->view('dashboard/master/biaya-admin/partial/table');
	}

	public function json()
	{
		if ($this->input->method() !== 'post') {
			return show_404();
		}

		$sc = [];
		$sc['draw'] = $_POST['draw'];
		$sc['limit'] = $_POST['length'];
		$sc['offset'] = $_POST['start'];
		$sc['order_index'] = $_POST['order'][0]['column'];
		$sc['order_field'] = $_POST['columns'][$sc['order_index']]['data'];
		$sc['order_ascdesc'] = $_POST['order'][0]['dir'];
		$sc['search'] = $_POST['search']['value'];
		return $this->order_admin->json($sc);
	}
}
