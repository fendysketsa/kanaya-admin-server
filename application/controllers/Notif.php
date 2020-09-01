<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif extends CI_Controller
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

        $this->load->model('marketing_model', 'marketing');
        $this->load->model('notif_model','notif');
         $this->load->model('setoran_model', 'setoran');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }


    public function index()
    {

    	 $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin -  Data - Notifikasi | Dashboard',
                'css' => [
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                    'assets/dashboard/upload/image-uploader.min.css',
                    'assets/dashboard/upload/css/main.css',
                    'assets/dashboard/vendor/fancybox/jquery.fancybox.min.css',
                    'assets/dashboard/css/easy-autocomplete.min.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'modal' => 'dashboard/master/notif/partial/modal',
             'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'pages' => [
                'url' => site_url('marketing/notif'),
                'pages' => 'dashboard/master/notif/content',
            ],
            'footer' => [
                'js' => [
                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/js/jquery.easy-autocomplete.min.js',
                    'assets/dashboard/master/notif/notif.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);
    }


      public function data()
    {
        $this->load->view('dashboard/master/notif/partial/table');

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
        return $this->notif->json($sc);
    }

     public function store()
    {
        
        $this->form_validation->set_rules('marketing_id', 'Marketing_id', 'required');
        $this->form_validation->set_rules('member_id', 'Member_id', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
      
        if ($this->form_validation->run() == true) {


           // $config['upload_path']="./assets/dashboard/img/pegawai";
           // $config['allowed_types']='gif|jpg|png';
           // $config['encrypt_name'] = TRUE;
         
            // $this->load->library('upload',$config);
            
            // if($this->upload->do_upload("foto")){
            //     $data = array('upload_data' => $this->upload->data());
     
            //     $image= base_url() .'assets/dashboard/img/pegawai/'.$data['upload_data']['file_name']; 
            // }else{
            //     $image = '';
            // }

            $store = [
                'member_id' => $this->input->post('member_id'),
                'marketing_id' => $this->input->post('marketing_id'),
                'judul' => $this->input->post('judul'),
                'keterangan' => $this->input->post('pesan'),
                'tanggal'   => date('Y-m-d H:i:s'),
               
            ];

            $simpan = $this->notif->save($store);

            if ($simpan) {
                $this->session->set_flashdata('success_message', 'success insert data marketing');

            } else {
                $this->session->set_flashdata('error_message', 'gagal insert data marketing');
            }

        } else {
            $this->session->set_flashdata('error_message', 'data yang dimasukkan tidak lengkap');
        }

        redirect('admin/notif');

    }

     public function update()
    {
        
        $this->form_validation->set_rules('marketing_id', 'Marketing_id', 'required');
        $this->form_validation->set_rules('member_id', 'Member_id', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required');

        if ($this->form_validation->run() == true) {


           // $config['upload_path']="./assets/dashboard/img/pegawai";
           // $config['allowed_types']='gif|jpg|png';
           // $config['encrypt_name'] = TRUE;
         
           //  $this->load->library('upload',$config);
            
           //  if($this->upload->do_upload("foto")){
           //      $data = array('upload_data' => $this->upload->data());
           //      $image= base_url() .'assets/dashboard/img/pegawai/'.$data['upload_data']['file_name']; 
           //      unlink($this->input->post('gambar'));
           //  }else{
           //      $image = $this->input->post('gambar');
           //  }

            $store = [
                'member_id' => $this->input->post('member_id'),
                'marketing_id' => $this->input->post('marketing_id'),
                'judul' => $this->input->post('judul'),
                'keterangan' => $this->input->post('pesan'),  
                ];

            $simpan = $this->notif->update($this->input->post('id'), $store);

            if ($simpan) {
                $this->session->set_flashdata('success_message', 'success update data notif');

            } else {
                $this->session->set_flashdata('error_message', 'gagal update data notif');
            }

        } else {
            $this->session->set_flashdata('error_message', 'data notif yang dimasukkan tidak lengkap');
        }

        redirect('admin/notif');

    }

    public function remove()
    {
        if ($this->input->method() !== 'post') {
            return false;
        }

        $id = $_POST['id'];
        $getId = $this->notif->getId($id);

        if ($getId) {
            $this->notif->deleteId($id);
            $delete = $this->db->affected_rows();
          //  unlink($getId->foto);
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

    

     public function form()
    {
      
        $data['dataGet'] = empty($_POST) ? '' : $this->notif->getId($_POST['id']);

        $this->load->view('dashboard/master/notif/partial/form', $data);
    }

     public function get_member()
    {
        echo json_encode($this->notif->member());
    }

    public function get_marketing()
    {
        echo json_encode($this->notif->marketing());
    }

    public function get_data_up()
    {
       echo json_encode($this->notif->getId($_POST['id']));   
    }
}
