<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('logged_in'))) {
            redirect('auth/login');
        }

         $this->load->model('setoran_model', 'setoran');

    }

    public function index()
    {
        $this->load->view('dashboard/index');
    }

    public function pages()
    {
       // die();
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin | Dashboard',
                'css' => [],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top'     => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'pages'   => 'dashboard/partial/contents/content',
            'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/chart.js/Chart.min.js',
                    'assets/dashboard/js/demo/chart-area-demo.js',
                    'assets/dashboard/js/demo/chart-pie-demo.js',
                    'assets/dashboard/js/dashboard.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }

}
