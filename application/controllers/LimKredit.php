<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LimKredit extends CI_Controller
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

        $this->load->model('lim_kredit_model', 'limit_kredit');
         $this->load->model('setoran_model', 'setoran');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->helper('global');
    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin - Master Data - Limit Kredit | Dashboard',
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
                'url' => site_url('limKredit/store'),
                'pages' => 'dashboard/master/limitKredit/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/master/limitKredit/limit_kredit.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

    public function form()
    {
        $data['dataGet'] = empty($_POST) ? '' : $this->limit_kredit->getId($_POST['id']);
        $this->load->view('dashboard/master/limitKredit/partial/form', $data);

    }

    public function valid_rupiah($rupiah)
    {
        if (unRupiah($rupiah)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_rupiah', 'Invalid Format!.');
            return false;
        }
    }

    public function v_numbering($str)
    {
        if (is_numeric(unRupiah($str))) {
            return true;
        } else {
            $this->form_validation->set_message('v_numbering', 'Invalid Number!.');
            return false;
        }
    }

    public function update()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('limit', 'Limit', 'required|callback_valid_rupiah|callback_v_numbering');
        $this->form_validation->set_rules('nama', 'Kategori', 'required');
        $this->form_validation->set_rules('dp', 'DP', 'required|callback_valid_rupiah|callback_v_numbering');
        $this->form_validation->set_rules('angsuran', 'Angsuran', 'required|callback_valid_rupiah|callback_v_numbering');
        $this->form_validation->set_rules('x_week', 'Berapa Kali', 'required|callback_valid_rupiah|callback_v_numbering');

        if ($this->form_validation->run() === true) {

            $store = [
                'limit' => unRupiah($this->input->post('limit')),
                'nama' => $this->input->post('nama'),
                'dp' => unRupiah($this->input->post('dp')),
                'angsuran' => unRupiah($this->input->post('angsuran')),
                'angsuran_ext' => unRupiah($this->input->post('angsuran_ext')),
                'x_week' => unRupiah($this->input->post('x_week')),
            ];

            $update = $this->limit_kredit->update($_POST['id'], $store);

            if ($update) {
                $data['code'] = 200;
                $data['msg'] = 'Anda berhasil mengubah data';
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Anda tidak berhasil mengubah';
                $data['msgContent'] = '';

            }

        } else {
            $data['code'] = 500;
            $data['msg'] = 'Mohon lengkapi isian Anda';
            $data['msgContent'] = 'Silakan inputkan data dengan benar!' . validation_errors();

        }

        echo json_encode($data);

    }

    public function store()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('limit', 'Limit', 'required|callback_valid_rupiah|callback_v_numbering');
        $this->form_validation->set_rules('nama', 'Kategori', 'required');
        $this->form_validation->set_rules('dp', 'DP', 'required|callback_valid_rupiah|callback_v_numbering');
        $this->form_validation->set_rules('angsuran', 'Angsuran', 'required|callback_valid_rupiah|callback_v_numbering');
        $this->form_validation->set_rules('x_week', 'Berapa Kali', 'required|callback_valid_rupiah|callback_v_numbering');

        if ($this->form_validation->run() === true) {

            $store = [
                'limit' => unRupiah($this->input->post('limit')),
                'nama' => $this->input->post('nama'),
                'dp' => unRupiah($this->input->post('dp')),
                'angsuran' => unRupiah($this->input->post('angsuran')),
                'angsuran_ext' => unRupiah($this->input->post('angsuran_ext')),
                'x_week' => unRupiah($this->input->post('x_week')),
            ];

            $simpan = $this->limit_kredit->save($store);

            if ($simpan) {
                $data['code'] = 200;
                $data['msg'] = 'Anda berhasil menyimpan data';
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Anda tidak berhasil menyimpan';
                $data['msgContent'] = '';
            }

        } else {
            $data['code'] = 500;
            $data['msg'] = 'Mohon lengkapi isian Anda';
            $data['msgContent'] = 'Silakan inputkan data dengan benar!';

        }

        echo json_encode($data);

    }

    public function data()
    {
        $this->load->view('dashboard/master/limitKredit/partial/table');

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
        return $this->limit_kredit->json($sc);
    }

    public function remove()
    {
        if ($this->input->method() !== 'post') {
            return false;
        }

        $id = $_POST['id'];
        $getId = $this->limit_kredit->getId($id);

        if ($getId) {
            $this->limit_kredit->deleteId($id);
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
