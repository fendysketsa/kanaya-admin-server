<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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

        $this->load->model('kategori_model', 'kategori');
         $this->load->model('setoran_model', 'setoran');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin - Master Data - Kategori | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                    'assets/dashboard/upload/css/main.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'pages' => [
                'url' => site_url('kategori/store'),
                'pages' => 'dashboard/master/kategori/content',
            ],
            'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/master/kategori/kategori.js',
                    'assets/dashboard/upload/js/main.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

    public function form()
    {
        $data['dataGet'] = empty($_POST) ? '' : $this->kategori->getId($_POST['id']);
        $this->load->view('dashboard/master/kategori/partial/form', $data);

    }

    public function update()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === true) {

            $filesImageUpload = $this->UploadFile();

            if (!empty($filesImageUpload)) {
                $this->deleteFiles('storages/upload/kategori/images/icon/' . $this->kategori->getId($_POST['id'])->icon);
                $dFile = [
                    'icon' => $filesImageUpload,
                ];
            } else {
                $dFile = [];
            }

            $dStore = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $store = array_merge($dFile, $dStore);

            $update = $this->kategori->update($_POST['id'], $store);

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
        $dir = 'storages/upload/kategori/images/icon';
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

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === true) {

            $store = [
                'icon' => $this->UploadFile(),
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $simpan = $this->kategori->save($store);

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
        $this->load->view('dashboard/master/kategori/partial/table');

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
        return $this->kategori->json($sc);
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
        $getId = $this->kategori->getId($id);

        if ($getId) {
            $this->deleteFiles('storages/upload/kategori/images/icon/' . $getId->icon);

            $this->kategori->deleteId($id);
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
