<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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

		$this->load->model('order_model', 'order');
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
				'title' => 'Admin -  Data - Order | Dashboard',
				'css' => [
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
					'assets/dashboard/css/daterangepicker.css',
				],
			],
			'sidebar' => 'dashboard/partial/sidebar',
			'top' => 'dashboard/partial/top',
			'content' => 'dashboard/partial/main',
			'modal' => 'dashboard/master/order/partial/modal',
			'setorn_count' => count($this->setoran->getCountSetoran()),
			'setorn' =>  $this->setoran->getCountSetoran(),
			'pages' => [
				'url' => site_url('member/store'),
				'pages' => 'dashboard/master/order/content',
			],
			'footer' => [
				'js' => [
					'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
					'assets/dashboard/js/demo/daterangepicker.js',
					'assets/dashboard/master/order/order.js',
				],
				'footer' => 'dashboard/partial/footer',
			],
		];

		$this->load->view('dashboard/partial/contents/index', $data);
	}


	public function data()
	{
		$this->load->view('dashboard/master/order/partial/table');
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
		$sc['search_tanggal'] = $_POST['columns'][1]['search']['value'];
		$sc['search'] = $_POST['search']['value'];
		return $this->order->json($sc);
	}

	public function form()
	{
		$data['dataGet'] = empty($_POST) ? '' : $this->order->getId($_POST['id']);
		$this->load->view('dashboard/master/order/partial/form', $data);
	}

	public function remove()
	{
		if ($this->input->method() !== 'post') {
			return false;
		}

		$id = $_POST['id'];
		$getId = $this->member->getId($id);

		if ($getId) {
			$this->member->deleteId($id);
			$delete = $this->db->affected_rows();

			if ($delete) {
				$data['code'] = 200;
				$data['msg'] = 'Data berhasil terhapus!';
			} else {
				$data['code'] = 500;
				$data['msg'] = 'Data gagal terhapus!';
			}
		} else {
			$data['code'] = 500;
			$data['msg'] = 'Data tidak sesuai, data tidak terhapus!';
		}
		echo json_encode($data);
	}

	public function update()
	{
		// echo $this->input->post('tanggal_log');
		$tgl = str_replace("T", " ", $this->input->post('tanggal_log'));
		$nominal = $this->input->post('nominal');

		// echo $tgl.' '. $nominal .'ssss'; die();

		if (empty($tgl) or empty($nominal)) {
			$this->session->set_flashdata('success_message', 'success update data diskon produk');
			redirect('admin/order');
		}

		//echo '<pre>'.print_r($data, true) .'</pre>';

		$store = [
			'tanggal_cicilan' => $tgl,
			'nominal' => $nominal
		];

		$simpan = $this->order->update_log($this->input->post('id'), $store);

		if ($simpan) {
			$this->session->set_flashdata('success_message', 'success update data log transaksi');
		} else {
			$this->session->set_flashdata('error_message', 'gagal update data log transaksi');
		}


		redirect('admin/order');
	}

	public function print($id)
	{
		$data = $this->order->detail_trx($id);

		$data['admin'] = $this->session->userdata('username');


		$this->load->view('dashboard/master/order/invoice', $data);
	}
}
