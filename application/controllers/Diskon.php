<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskon extends CI_Controller
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

        $this->load->model('diskon_model', 'diskon');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin - Master Data - Diskon | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'pages' => [
                'url' => site_url('diskon/store'),
                'pages' => 'dashboard/master/diskon/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/master/diskon/diskon.js',
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
        $data['dataGet'] = empty($_POST) ? '' : $this->diskon->getId($_POST['id']);
        $this->load->view('dashboard/master/diskon/partial/form', $data);

    }

    public function update()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('berlaku_dari', 'Berlaku_dari', 'required|callback_compareDate');
        $this->form_validation->set_rules('berlaku_sampai', 'Berlaku_sampai', 'required|callback_compareDate');

        if ($this->form_validation->run() === true) {

            $store = [
                'nama' => $this->input->post('nama'),
                'nominal' => $this->input->post('nominal'),
                'berlaku_dari' => $this->input->post('berlaku_dari'),
                'berlaku_sampai' => $this->input->post('berlaku_sampai'),
            ];

            $update = $this->diskon->update($_POST['id'], $store);

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

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('berlaku_dari', 'Berlaku_dari', 'required|callback_compareDate');
        $this->form_validation->set_rules('berlaku_sampai', 'Berlaku_sampai', 'required|callback_compareDate');

        if ($this->form_validation->run() === true) {

            $store = [
                'nama' => $this->input->post('nama'),
                'nominal' => $this->input->post('nominal'),
                'berlaku_dari' => $this->input->post('berlaku_dari'),
                'berlaku_sampai' => $this->input->post('berlaku_sampai'),
            ];

            $simpan = $this->diskon->save($store);

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
        return $this->diskon->json($sc);
    }

    public function remove()
    {
        if ($this->input->method() !== 'post') {
            return false;
        }

        $id = $_POST['id'];
        $getId = $this->diskon->getId($id);

        if ($getId) {
            $this->diskon->deleteId($id);
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
