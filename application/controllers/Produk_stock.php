<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('logged_in'))) {
            redirect('auth/login');
		}

		if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 2) {
			redirect('auth/login');
		}

        $this->load->model('produk_stock_model', 'produk_stock');
        $this->load->model('produk_model', 'produk');

    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'kategori' => $this->produk_stock->kategori(),
                'title' => 'Admin -  Warehouse - List Stok Produk | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'modal' => 'dashboard/warehouse/produk/partial/modal',
            'pages' => [
                'pages' => 'dashboard/warehouse/produk/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/warehouse/produk/produk.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

    public function data()
    {
        $this->load->view('dashboard/warehouse/produk/partial/table');

    }

    public function opname()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $lastStok = $this->produk->getId($_POST['id']);

        if ($_POST['stok'] > $lastStok->stok) {
            $store_log_stok = [
                'produk_id' => $_POST['id'],
                'tanggal' => date('Y-m-d H:i:s'),
                'masuk' => $this->input->post('stok') - $lastStok->stok,
                'keluar' => 0,
                'sisa' => $this->input->post('stok'),
                'keterangan' => 'STOK OPNAME',
            ];

            $this->produk->insert_log_stok($store_log_stok);

            $store = [
                'stok' => $this->input->post('stok'),
            ];

            $this->produk->update($_POST['id'], $store);

        }

        if ($_POST['stok'] < $lastStok->stok) {
            $store_log_stok = [
                'produk_id' => $_POST['id'],
                'tanggal' => date('Y-m-d H:i:s'),
                'masuk' => 0,
                'keluar' => $lastStok->stok - $this->input->post('stok'),
                'sisa' => $this->input->post('stok'),
                'keterangan' => 'STOK OPNAME - ' . $this->input->post('keterangan'),
            ];

            $this->produk->insert_log_stok($store_log_stok);

            $store = [
                'stok' => $this->input->post('stok'),
            ];

            $this->produk->update($_POST['id'], $store);

        }

    }

    public function log()
    {
        $data['dataGet'] = $this->produk_stock->getLog($_POST['id']);
        echo json_encode($data['dataGet']);

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
        $sc['search_tanggal'] = $_POST['columns'][1]['search']['value'];

        return $this->produk_stock->json($sc);
    }

    public function print()
    {
        $kategori = $this->input->post('kategori');

       // echo $kategori; die();

        if ($kategori == 'all') {
            $title = "Semua Stok Produk";
            $title = "";
        } elseif ($kategori == 'ready') {
            $title = "Stok Produk Yang Tersedia";
        } else {
            $title = "Stok Produk ". $this->produk_stock->kategoriById($kategori)[0]['nama'];
        }

        $data = [
            "kategori" => $kategori,
            "data"     => $this->produk_stock->report($kategori),
            "title"    => $title,
        ];

        $this->load->view('dashboard/warehouse/produk/print_stock', $data);
    }

}
