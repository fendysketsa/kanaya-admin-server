<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
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

		$this->load->model('promo_model', 'promo');
		// $this->load->library('datatables');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [
			'meta' => [
				'meta' => 'dashboard/partial/meta',
				'title' => 'Admin - Master Data - Promo | Dashboard',
				'css' => [
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
					'assets/dashboard/upload/css/main.css',
				],
			],
			'sidebar' => 'dashboard/partial/sidebar',
			'top' => 'dashboard/partial/top',
			'content' => 'dashboard/partial/main',
			'pages' => [
				'url' => site_url('promo/store'),
				'pages' => 'dashboard/master/promo/content',
			],
			'footer' => [
				'js' => [
					'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
					'assets/dashboard/master/promo/promo.js',
					'assets/dashboard/upload/js/main.js',
				],
				'footer' => 'dashboard/partial/footer',
			],
		];

		$this->load->view('dashboard/partial/contents/index', $data);
	}

	public function compareDate()
	{
		$startDate = strtotime($_POST['berlaku_dari']);
		$endDate = strtotime($_POST['berlaku_sampai']);

		if ($endDate >= $startDate) {
			return true;
		} else {
			$this->form_validation->set_message('compareDate', '%s harus lebih besar dari tanggal berlaku dari');
			return false;
		}
	}

	public function form()
	{
		$data['dataGet'] = empty($_POST) ? '' : $this->promo->getId($_POST['id']);
		$this->load->view('dashboard/master/promo/partial/form', $data);
	}

	public function update()
	{
		if ($this->input->method() !== 'post') {
			return show_404();
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('berlaku_dari', 'Berlaku_dari', 'required|callback_compareDate');
		$this->form_validation->set_rules('berlaku_sampai', 'Berlaku_sampai', 'required|callback_compareDate');

		if ($this->form_validation->run() === true) {

			$filesImageUpload = $this->UploadFile();

			if (!empty($filesImageUpload)) {
				$this->deleteFiles('storages/upload/promo/images/icon/' . $this->promo->getId($_POST['id'])->gambar);
				$dFile = [
					'gambar' => $filesImageUpload,
				];
			} else {
				$dFile = [];
			}

			$dStore = [
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'berlaku_dari' => $this->input->post('berlaku_dari'),
				'berlaku_sampai' => $this->input->post('berlaku_sampai'),
				'tanggal_posting' => date("Y-m-d H:i:s")
			];

			$store = array_merge($dFile, $dStore);

			$update = $this->promo->update($_POST['id'], $store);

			if ($update) {
				$data['code'] = 200;
				$data['msg'] = 'Anda berhasil mengubah data';
			} else {
				$data['code'] = 500;
				$data['msg'] = 'Anda tidak berhasil mengubah';
			}
		} else {
			$data['code'] = 500;
			$data['msg'] = 'Mohon lengkapi isian Anda';
		}

		echo json_encode($data);
	}

	public function UploadFile()
	{
		$image = '';
		$dir = 'storages/upload/promo/images/icon';
		if (!is_dir($dir)) {
			mkdir('./' . $dir, 0777, true);
		}

		$config['upload_path'] = "./" . $dir;
		$config['allowed_types'] = 'gif|jpeg|jpg|png';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload("file")) {
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];
		}

		return $image;
	}

	public function store()
	{
		if ($this->input->method() !== 'post') {
			return show_404();
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('berlaku_dari', 'Berlaku_dari', 'required|callback_compareDate');
		$this->form_validation->set_rules('berlaku_sampai', 'Berlaku_sampai', 'required|callback_compareDate');

		if ($this->form_validation->run() === true) {


			$dStore = [
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'berlaku_dari' => $this->input->post('berlaku_dari'),
				'berlaku_sampai' => $this->input->post('berlaku_sampai'),
				'tanggal_posting' => date("Y-m-d H:i:s")
			];

			$simpan = $this->promo->save($store);

			if ($simpan) {
				$data['code'] = 200;
				$data['msg'] = 'Anda berhasil menyimpan data';
			} else {
				$data['code'] = 500;
				$data['msg'] = 'Anda tidak berhasil menyimpan';
			}
		} else {
			$data['code'] = 500;
			$data['msg'] = 'Mohon lengkapi isian Anda';
		}

		echo json_encode($data);
	}

	public function data()
	{
		$this->load->view('dashboard/master/diskon/partial/table');
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
		return $this->promo->json($sc);
	}

	public function deleteFiles($path)
	{
		$files = glob($path);
		foreach ($files as $file) {
			if (is_file($file)) {
				unlink($file);
			}
		}
	}

	public function remove()
	{
		if ($this->input->method() !== 'post') {
			return false;
		}

		$id = $_POST['id'];
		$getId = $this->promo->getId($id);

		if ($getId) {
			$this->deleteFiles('storages/upload/kategori/images/icon/' . $getId->gambar);

			$this->promo->deleteId($id);
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
}
