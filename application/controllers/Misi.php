<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Misi extends CI_Controller
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

        $this->load->model('misi_model', 'misi');
         $this->load->model('setoran_model', 'setoran');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin - Master Data - Misi | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'pages' => [
                'url' => site_url('misi/store'),
                'pages' => 'dashboard/master/misi/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/master/misi/misi.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

    public function form()
    {
        $data['dataGet'] = empty($_POST) ? '' : $this->misi->getId($_POST['id']);
        $this->load->view('dashboard/master/misi/partial/form', $data);

    }

    public function update()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === true) {

            $store = [
                'deskripsi' => $this->input->post('deskripsi'),
            ];

            $update = $this->misi->update($_POST['id'], $store);

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

    public function store()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === true) {

            $store = [
                'deskripsi' => $this->input->post('deskripsi'),
            ];

            $simpan = $this->misi->save($store);

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
        $this->load->view('dashboard/master/misi/partial/table');

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
        return $this->misi->json($sc);
    }

    public function remove()
    {
        if ($this->input->method() !== 'post') {
            return false;
        }

        $id = $_POST['id'];
        $getId = $this->misi->getId($id);

        if ($getId) {
            $this->misi->deleteId($id);
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
