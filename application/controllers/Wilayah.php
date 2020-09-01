<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
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

        $this->load->model('wilayah_model', 'wilayah');
         $this->load->model('setoran_model', 'setoran');

        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $getArea = $_GET;
        $attribute = [];

        if (!empty($getArea)) {
            if ($getArea['area'] == 'provinsi') {
                $attribute = [
                    'title' => ' Provinsi',
                    'get' => '?area=provinsi',
                ];
            } else if ($getArea['area'] == 'kota') {
                $attribute = [
                    'title' => ' Kota',
                    'get' => '?area=kota',
                ];
            } else if ($getArea['area'] == 'kecamatan') {
                $attribute = [
                    'title' => ' Kecamatan',
                    'get' => '?area=kecamatan',
                ];
            } else {
                return show_404();
            }
        } else {
            return show_404();
        }

        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin - Master Data - Wilayah | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'content' => 'dashboard/partial/main',
            'attribute' => $attribute,
            'pages' => [
                'url' => site_url('wilayah/store'),
                'pages' => 'dashboard/master/wilayah/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/master/wilayah/wilayah.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

    public function form()
    {
        $getPages = $_GET['area'];
        $data['dataGet'] = empty($_POST) ? '' : $this->wilayah->getId($_POST['id'], $getPages);
        $this->load->view('dashboard/master/wilayah/partial/form/form_' . ucfirst($getPages), $data);
    }

    public function update()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $getPages = $_GET['area'];

        if ($getPages == 'kota') {
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        }

        if ($getPages == 'kecamatan') {
            $this->form_validation->set_rules('kota', 'Kota', 'required');
            $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
        }

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === true) {

            $store_ = [];

            if ($getPages == 'kota') {
                $store_ = [
                    'provinsi_id' => $this->input->post('provinsi'),
                ];
            }

            if ($getPages == 'kecamatan') {
                $store_ = [
                    'kota_id' => $this->input->post('kota'),
                    'kode_pos' => $this->input->post('kode_pos'),
                ];
            }

            $store = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
            ];

            $newStore = array_merge($store_, $store);

            $update = $this->wilayah->update($_POST['id'], $newStore, $getPages);

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

        $getPages = $_GET['area'];

        if ($getPages == 'kota') {
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        }

        if ($getPages == 'kecamatan') {
            $this->form_validation->set_rules('kota', 'Kota', 'required');
            $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
        }

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === true) {
            $store_ = [];

            if ($getPages == 'kota') {
                $store_ = [
                    'provinsi_id' => $this->input->post('provinsi'),
                ];
            }

            if ($getPages == 'kecamatan') {
                $store_ = [
                    'kota_id' => $this->input->post('kota'),
                    'kode_pos' => $this->input->post('kode_pos'),
                ];
            }

            $store = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
            ];

            $newStore = array_merge($store_, $store);

            $simpan = $this->wilayah->save($newStore, $getPages);

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

    public function opt()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }
        $getPages = $this->input->post('table');
        echo json_encode($this->wilayah->dataOpt($getPages));
    }

    public function data()
    {
        $getPages = $_GET['area'];
        $this->load->view('dashboard/master/wilayah/partial/table/table_' . ucfirst($getPages));
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

        $getPages = $_GET['area'];

        return $this->wilayah->json($sc, $getPages);
    }

    public function remove()
    {
        if ($this->input->method() !== 'post') {
            return false;
        }

        $getPages = $_GET['area'];

        $id = $_POST['id'];
        $getId = $this->wilayah->getId($id, $getPages);

        if ($getId) {
            $this->wilayah->deleteId($id, $getPages);
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
