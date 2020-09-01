<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
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

		$this->load->model('marketing_model', 'marketing');
		$this->load->model('setoran_model', 'setoran');
		// $this->load->library('datatables');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data = [
			'meta' => [
				'meta' => 'dashboard/partial/meta',
				'title' => 'Admin -  Data - Marketing | Dashboard',
				'css' => [
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
					'assets/dashboard/upload/image-uploader.min.css',
					'assets/dashboard/upload/css/main.css',
					'assets/dashboard/vendor/fancybox/jquery.fancybox.min.css',
				],
			],
			'sidebar' => 'dashboard/partial/sidebar',
			'top' => 'dashboard/partial/top',
			'content' => 'dashboard/partial/main',
			'modal' => 'dashboard/master/marketing/partial/modal',
			'setorn_count' => count($this->setoran->getCountSetoran()),
			'setorn' =>  $this->setoran->getCountSetoran(),
			'pages' => [
				'url' => site_url('marketing/store'),
				'pages' => 'dashboard/master/marketing/content',
			],
			'footer' => [
				'js' => [
					'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
					'assets/dashboard/upload/image-uploader.min.js',
					'assets/dashboard/master/marketing/marketing.js',
				],
				'footer' => 'dashboard/partial/footer',
			],
		];

		$this->load->view('dashboard/partial/contents/index', $data);
	}


	public function data()
	{
		$this->load->view('dashboard/master/marketing/partial/table');
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
		return $this->marketing->json($sc);
	}

	public function store()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		$id = $this->marketing->get_role_marketing();

		if (empty($id)) {
			$this->session->set_flashdata('error_message', 'Anda belum memilih role marketing');

			redirect('admin/marketing');
		}

		if ($this->form_validation->run() == true) {


			$config['upload_path'] = "./assets/dashboard/img/pegawai";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload("foto")) {
				$data = array('upload_data' => $this->upload->data());

				$image = base_url() . 'assets/dashboard/img/pegawai/' . $data['upload_data']['file_name'];
			} else {
				$image = '';
			}

			$store = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'email' => $this->input->post('email'),
				'trip_fee' => $this->input->post('trip_fee'),
				'point' => $this->input->post('point'),
				'kecamatan_id' => $this->input->post('kecamatan_id'),
				'manager_id' => $this->input->post('manager_id') ? $this->input->post('manager_id') : null,
				'foto'       => $image,
				"role_id"    => $id[0]['id'],
			];

			$simpan = $this->marketing->save($store);

			if ($simpan) {
				$this->session->set_flashdata('success_message', 'success insert data marketing');
			} else {
				$this->session->set_flashdata('error_message', 'gagal insert data marketing');
			}
		} else {
			$this->session->set_flashdata('error_message', 'data yang dimasukkan tidak lengkap');
		}

		redirect('admin/marketing');
	}

	public function update()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		$id = $this->marketing->get_role_marketing();

		if (empty($id)) {
			$this->session->set_flashdata('error_message', 'data belum memsaukkan role marketing');

			redirect('admin/marketing');
		}

		if ($this->form_validation->run() == true) {


			$config['upload_path'] = "./assets/dashboard/img/pegawai";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload("foto")) {
				$data = array('upload_data' => $this->upload->data());
				$image = base_url() . 'assets/dashboard/img/pegawai/' . $data['upload_data']['file_name'];
				unlink($this->input->post('gambar'));
			} else {
				$image = $this->input->post('gambar');
			}

			$store = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'email' => $this->input->post('email'),
				'trip_fee' => $this->input->post('trip_fee'),
				'point' => $this->input->post('point'),
				'kecamatan_id' => $this->input->post('kecamatan_id'),
				'manager_id' => $this->input->post('manager_id') ? $this->input->post('manager_id') : null,
				'foto'       => $image,
				"role_id"    => $id[0]['id'],
			];

			$simpan = $this->marketing->update($this->input->post('id'), $store);

			if ($simpan) {
				$this->session->set_flashdata('success_message', 'success update data marketing');
			} else {
				$this->session->set_flashdata('error_message', 'gagal update data marketing');
			}
		} else {
			$this->session->set_flashdata('error_message', 'data marketing yang dimasukkan tidak lengkap');
		}

		redirect('admin/marketing');
	}

	public function remove()
	{
		if ($this->input->method() !== 'post') {
			return false;
		}

		$id = $_POST['id'];
		$getId = $this->marketing->getId($id);

		if ($getId) {
			$this->marketing->deleteId($id);
			$delete = $this->db->affected_rows();
			//  unlink($getId->foto);
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

	public function kabupaten($id = '')
	{
		$kabupaten = $this->marketing->kabupaten($id);

		$option = '<option>Pilih kabupaten</option>';
		foreach ($kabupaten as $data) {
			$option .= '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
		}

		echo $option;
	}

	public function kecamatan($id = '')
	{
		$kecamatan = $this->marketing->kecamatan($id);

		$option = '<option>Pilih kecamatan</option>';
		foreach ($kecamatan as $data) {
			$option .= '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
		}

		echo $option;
	}

	public function form()
	{
		$data['provinsi'] = $this->marketing->provinsi();
		$data['manager']   = $this->marketing->manager();
		$data['dataGet'] = empty($_POST) ? '' : $this->marketing->getId($_POST['id']);

		if (!empty($_POST)) {
			$manager = $this->marketing->mymanager($_POST['id']);
			if (count($manager) > 0) {
				$data['mymanager'] = $manager[0]['nama'];
				$data['manager_id'] = $manager[0]['id'];
			} else {
				$data['mymanager'] = "";
				$data['manager_id'] = null;
			}
		}
		$this->load->view('dashboard/master/marketing/partial/form', $data);
	}
}
