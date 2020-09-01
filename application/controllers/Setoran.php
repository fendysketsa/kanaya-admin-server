<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setoran extends CI_Controller
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

        $this->load->model('setoran_model', 'setoran');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }

 
    public function index()
    {
    	 $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin -  Data - Setoran Marketing | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                    'assets/dashboard/upload/image-uploader.min.css',
                ],
            ],
            "mode"    => "setoran",
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'modal' => 'dashboard/master/setoran/partial/modal',
            'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'pages' => [
                'url' => site_url('setoran/store'),
                'pages' => 'dashboard/master/setoran/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/upload/image-uploader.min.js',
                    'assets/dashboard/master/setoran/setoran.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }


      public function data()
    {
        $this->load->view('dashboard/master/setoran/partial/table');

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
        return $this->setoran->json($sc);
    }

    public function aprove()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');

        $setoran = $this->setoran->getId($id);

    //    echo $type; die();

     //   echo $setoran->status; die();

        if($setoran->status == 0) {

            if($type == 'aprove') {
                $status = 1;
            }elseif($type == 'reject') {
                $status = 2;
            }else{
                $status = 0;
            }

            $up = ['status' => $status, 'handle_by' => $this->session->userdata('name')];

            $update =$this->setoran->update($id, $up);

            if ($update) {
                    $data['code'] = 200;
                    $data['msg'] = 'setoran sucess diterima!';
            } else {
                    $data['code'] = 500;
                    $data['msg'] = 'setoran gagal diterima, cobalah beberapa saat lagi';
            }

        } else {
            $data['code'] = 200;
            $data['msg'] = 'sucess';
        }

        echo json_encode($data);
    }

    public function setoranCount()
    {
        //echo 
    }


    public function print()
    {
         $start_date     = $this->input->post('start_date');
         $end_date = $this->input->post('end_date');
         $type      = $this->input->post('type');


     //   echo $start_date. ' '. $end_date; die();
        if (!empty($start_date) and !empty($end_date)) {
            $type = "tgl";
            // $start_date = $this->convertYMD($start_date);
            // $end_date   = $this->convertYMD($date[1]);
            $title = "Laporan Laba/Rugi dari periode ". $start_date .'/'.$end_date;
        } else {
           $type = "all";
           $title = "Dari semua periode";
        }
       // echo $title .' '. $type .'  '.$start_date .' '.$end_date; die();

         $query = [
                    "start_date" => $start_date,
                    "end_date"   => $end_date,
                    "type"       => $type,
                  ];
        
        $view = "dashboard/master/setoran/print_laba_rugi"; 
        $data = $this->setoran->report($query);
          //echo '<pre>'.print_r($data, true) .'</pre>';
        $data = [
            "title" =>  $title,
            "data" => $data,
            "type" => $type
        ];

        $this->load->view($view, $data);

    }

       public function convertYMD($date)
    {
        $parts = explode("/", $date);

        return trim($parts[2]) . '-' . trim($parts[1]) . '-' . trim($parts[0]);
    }

    public function laba()
    {
         $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin -  Data - Setoran Marketing | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                    'assets/dashboard/upload/image-uploader.min.css',
                ],
            ],
            "mode"    => "laba",
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'modal' => 'dashboard/master/setoran/partial/modal',
            'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'pages' => [
                'url' => site_url('setoran/store'),
                'pages' => 'dashboard/master/setoran/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/upload/image-uploader.min.js',
                    'assets/dashboard/master/setoran/setoran.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }


}
