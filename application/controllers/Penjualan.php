<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('logged_in'))) {
            redirect('auth/login');
		}

		if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 7) {
			redirect('auth/login');
		}

        $this->load->model('penjualan_model', 'penjualan');
    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin -  Data - Penjualan | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                    'assets/dashboard/css/daterangepicker.css',
                ],
            ],
            'marketing' => $this->penjualan->marketing(),
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'modal' => 'dashboard/laporan/penjualan/partial/modal',
            'pages' => [
                'pages' => 'dashboard/laporan/penjualan/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/js/demo/daterangepicker.js',
                    'assets/dashboard/laporan/penjualan/penjualan.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

    public function data()
    {
        $this->load->view('dashboard/laporan/penjualan/partial/table');

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

        return $this->penjualan->json($sc);
    }

    public function print()
    {
        $range     = $this->input->post('range_date');
        $marketing = $this->input->post('marketing');
        $type      = $this->input->post('type');

//        echo $marketing; die();

        if($marketing == "all") {
            $marketingKet = "Seluruh Marketing";
        } else {
            $marketingKet = "Marketing ". $this->penjualan->marketingById($marketing)[0]['nama'];
        }
        
        if (!empty($range)) {
            $date = explode("-", $range);
            // echo $date[0];
            $start_date = $this->convertYMD($date[0]);
            $end_date   = $this->convertYMD($date[1]);
            $title = "Laporan  dari tanggal : ".$start_date ." / ".$end_date .' ' . $marketingKet;
        } else {
            echo "Anda belum memasukan range tanggal";
        }
       // echo $range.' '. $marketing .' '. $type .'  '.$start_date .' '.$end_date;


        if($type == 'global') {
           $view = "dashboard/laporan/penjualan/print_penjualan_global"; 
           $query = [
                "start_date" => $start_date,
                "end_date"   => $end_date,
                "type"       => $type,
                "marketing"  => $marketing,
           ];

           $data = $this->penjualan->report($query);

        } elseif($type == 'rincian') {
           $view = "dashboard/laporan/penjualan/print_penjualan_rincian"; 
           $query = [
                "start_date" => $start_date,
                "end_date"   => $end_date,
                "type"       => $type,
                "marketing"  => $marketing,
           ];

           $data = $this->penjualan->report($query);

           // echo $type;
           // echo "<pre>".print_r($data, true).'</pre>'; die();

        } else {
           $view = "dashboard/laporan/penjualan/print_penjualan_kasir"; 
           $query = [
                "start_date" => $start_date,
                "end_date"   => $end_date,
                "type"       => $type,
                "marketing"  => $marketing,
           ];

           $data = $this->penjualan->report($query);

         //  echo '<pre>'.print_r($data, true).'</pre>';

        }

        $data = [
            "title" =>  $title,
            "data" => $data,
            "type" => $marketing
        ];

        $this->load->view($view, $data);
    }

    public function convertYMD($date)
    {
        $parts = explode("/", $date);

        return trim($parts[2]) . '-' . trim($parts[0]) . '-' . trim($parts[1]);
    }

}
