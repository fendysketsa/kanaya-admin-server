<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
				'title' => 'Admin -  Data - Member | Dashboard',
				'css' => [
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
					'assets/dashboard/upload/image-uploader.min.css',
					'assets/dashboard/master/member/zoom.css'
				],
			],
			'sidebar' => 'dashboard/partial/sidebar',
			'top' => 'dashboard/partial/top',
			'content' => 'dashboard/partial/main',
			'modal' => 'dashboard/master/member/partial/modal',
			'setorn_count' => count($this->setoran->getCountSetoran()),
			'setorn' =>  $this->setoran->getCountSetoran(),
			'pages' => [
				'url' => site_url('member/store'),
				'pages' => 'dashboard/master/member/content',
			],
			'footer' => [
				'js' => [
					'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
					'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
					'assets/dashboard/upload/image-uploader.min.js',
					'assets/dashboard/master/member/member.js',
				],
				'footer' => 'dashboard/partial/footer',
			],
		];

		$this->load->view('dashboard/partial/contents/index', $data);
	}

	public function form()
	{
		$data['dataGet'] = empty($_POST) ? '' : $this->member->getId($_POST['id']);
		$this->load->view('dashboard/master/member/partial/form', $data);
	}

	public function UploadFile()
	{
		$image = '';
		$dir = 'storages/upload/member/images';
		if (!is_dir($dir)) {
			mkdir('./' . $dir, 0777, true);
		}

		$config['upload_path'] = "./" . $dir;
		$config['allowed_types'] = 'gif|jpeg|jpg|png';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload("foto")) {
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];
		}

		return $image;
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

	public function update()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == true) {
			$filesImageUpload = $this->UploadFile();

			if (!empty($filesImageUpload)) {
				$this->deleteFiles('storages/upload/member/images/' . $this->member->getId($_POST['id'])->foto);
				$dFile = [
					'foto' => base_url('storages/upload/member/images/' . $filesImageUpload),
				];
			} else {
				$dFile = [];
			}

			if (!empty($this->input->post('password'))) {
				$store_password = [
					'password' => md5($this->input->post('password')),
				];
			} else {
				$store_password = [];
			}

			$store = [
				'nama' 			=> $this->input->post('nama'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'telepon' 		=> $this->input->post('telepon'),
				'email' 		=> $this->input->post('email'),
			];

			$simpan = $this->member->update($this->input->post('id'), array_merge($dFile, $store_password, $store));

			if ($simpan) {
				$dataMess['code'] = 200;
				$dataMess['msg'] = 'success update data member!';
			} else {
				$dataMess['code'] = 500;
				$dataMess['msg'] = 'gagal update data member!';
			}
		} else {
			$dataMess['code'] = 500;
			$dataMess['msg'] = 'data member yang dimasukkan tidak lengkap!';
		}

		echo json_encode($dataMess);
	}

	public function data()
	{
		$this->load->view('dashboard/master/member/partial/table');
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
		return $this->member->json($sc);
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

	public function deactive()
	{

		if ($this->input->method() !== 'post') {
			return false;
		}

		$id = $_POST['id'];
		$dt = ['status' => $_POST['dt']];

		$getId = $this->member->getId($id);

		if ($getId) {
			$this->member->update($id, $dt);
			$delete = $this->db->affected_rows();

			if ($delete) {
				$data['code'] = 200;
				$data['msg'] = 'operation success!';
			} else {
				$data['code'] = 500;
				$data['msg'] = 'Operasi gagal !';
			}
		} else {
			$data['code'] = 500;
			$data['msg'] = 'Data tidak sesuai!';
		}
		echo json_encode($data);
	}
	
	public function acc_()
	{

		if ($this->input->method() !== 'post') {
			return false;
		}

		$id = $_POST['id'];
		$dt = ['account' => $_POST['dt']];

		$getId = $this->member->getId($id);

		if ($getId) {
			$this->member->update_acc($id, $dt);
			$delete = $this->db->affected_rows();

			if ($delete) {
				$data['code'] = 200;
				$data['msg'] = 'operation success!';
			} else {
				$data['code'] = 500;
				$data['msg'] = 'Operasi gagal !';
			}
		} else {
			$data['code'] = 500;
			$data['msg'] = 'Data tidak sesuai!';
		}
		echo json_encode($data);
	}
}
