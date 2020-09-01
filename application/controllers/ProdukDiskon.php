<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukDiskon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('logged_in'))) {
			redirect('auth/login');
		}


		if ($this->session->userdata('level') != 1) {
			redirect('auth/login');
		}

		$this->load->model('ProdukDiskon_model', 'produkDiskon');
		$this->load->model('setoran_model', 'setoran');
		// $this->load->library('datatables');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data = [
			'meta' => [
				'meta' => 'dashboard/partial/meta',
				'title' => 'Admin -  Produk - Diskon | Dashboard',
				'css' => [
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
					// 'assets/dashboard/upload/image-uploader.min.css',
					'assets/dashboard/css/easy-autocomplete.min.css',
				],
			],
			'sidebar' => 'dashboard/partial/sidebar',
			'top' => 'dashboard/partial/top',
			'content' => 'dashboard/partial/main',
			'modal' => 'dashboard/master/produk_diskon/partial/modal',
			'modal2' => 'dashboard/master/produk_diskon/partial/modal_update',
			'setorn_count' => count($this->setoran->getCountSetoran()),
			'setorn' =>  $this->setoran->getCountSetoran(),
			'pages' => [
				'url' => site_url('ProdukDiskon/store'),
				'pages' => 'dashboard/master/produk_diskon/content',
			],
			'footer' => [
				'js' => [
					'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
					'assets/dashboard/js/jquery.easy-autocomplete.min.js',
					'assets/dashboard/master/produk_diskon/produk_diskon.js',
				],
				'footer' => 'dashboard/partial/footer',
			],
		];

		$this->load->view('dashboard/partial/contents/index', $data);
	}


	public function data()
	{
		$this->load->view('dashboard/master/produk_diskon/partial/table');
	}

	public function store()
	{
		$this->form_validation->set_rules('produk_id', 'Produk_id', 'required');
		$this->form_validation->set_rules('diskon_id', 'Diskon_id', 'required');

		if ($this->form_validation->run() == true) {

			$store = [
				'produk_id' => $this->input->post('produk_id'),
				'diskon_id' => $this->input->post('diskon_id'),
			];

			$simpan = $this->produkDiskon->save($store);

			if ($simpan) {
				$this->session->set_flashdata('success_message', 'success insert  data diskon produk');
			} else {
				$this->session->set_flashdata('error_message', 'gagal insert data diskon produk');
			}
		} else {
			$this->session->set_flashdata('error_message', 'data yang dimasukkan tidak lengkap');
		}

		redirect('admin/produk_diskon');
	}

	public function update()
	{
		// echo $this->input->post('produk_id'); 
		// echo $this->input->post('diskon_id');  
		// echo $this->input->post('produk_id');
		// die();


		$store = [
			'produk_id' => $this->input->post('produk_id'),
			'diskon_id' => $this->input->post('diskon_id'),
		];

		$simpan = $this->produkDiskon->update($this->input->post('id'), $store);

		if ($simpan) {
			$this->session->set_flashdata('success_message', 'success update data diskon produk');
		} else {
			$this->session->set_flashdata('error_message', 'gagal update data diskon produk');
		}


		redirect('admin/produk_diskon');
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
		return $this->produkDiskon->json($sc);
	}

	public function remove()
	{
		if ($this->input->method() !== 'post') {
			return false;
		}

		$id = $_POST['id'];
		$getId = $this->produkDiskon->getId($id);


		if ($getId) {
			$this->produkDiskon->deleteId($id);
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

	public function form()
	{
		$data['dataGet'] = empty($_POST) ? '' : $this->produkDiskon->getId($_POST['id']);
		// $data['produk']  = $this->produkDiskon->produk();
		$data['diskon']  = $this->produkDiskon->diskon();
		$data['css'] = 'assets/dashboard/css/easy-autocomplete.min.css';
		$data['js'] = 'assets/dashboard/js/jquery.easy-autocomplete.min.js';

		$this->load->view('dashboard/master/produk_diskon/partial/form', $data);
	}


	public function get_produk()
	{
		echo json_encode($this->produkDiskon->produk());
	}

	public function form2()
	{
		$data = empty($_POST) ? '' : $this->produkDiskon->getId($_POST['id']);

		//echo '<pre>'.print_r($data, true) .'<pre>';
		$diskon  = $this->produkDiskon->diskon();

		$option = '<option value="' . $data->diskon_id . '">' . $data->nama_diskon . '</option>';
		foreach ($diskon as $dt) {
			$option .= '<option value="' . $dt['id'] . '">' . $dt['nama'] . '</option>';
		}

		// echo $option;

		echo json_encode(array("data" => array("produk_nama" => $data->nama, "produk_id" => $data->produk_id, 'id' => $_POST['id']), "option" => $option));
		// echo "dasdas";
	}
}
