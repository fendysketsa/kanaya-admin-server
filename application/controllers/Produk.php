<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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

        $this->load->model('produk_model', 'produk');
         $this->load->model('setoran_model', 'setoran');
        // $this->load->library('datatables');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'meta' => [
                'meta' => 'dashboard/partial/meta',
                'title' => 'Admin - Master Data - Produk | Dashboard',
                'css' => [

                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css',
                    'assets/dashboard/upload/css/main.css',
                    'assets/dashboard/vendor/fancybox/jquery.fancybox.min.css',
                ],
            ],
            'sidebar' => 'dashboard/partial/sidebar',
            'top' => 'dashboard/partial/top',
            'content' => 'dashboard/partial/main',
            'modal' => 'dashboard/master/produk/partial/modal',
             'setorn_count' => count($this->setoran->getCountSetoran()),
            'setorn' =>  $this->setoran->getCountSetoran(),
            'pages' => [
                'url' => site_url('produk/store'),
                'pages' => 'dashboard/master/produk/content',
            ],
            'footer' => [
                'js' => [

                    'assets/dashboard/vendor/datatables/jquery.dataTables.min.js',
                    'assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js',
                    'assets/dashboard/vendor/fancybox/jquery.fancybox.min.js',
                    'assets/dashboard/master/produk/produk.js',
                    'assets/dashboard/upload/js/main.js',
                ],
                'footer' => 'dashboard/partial/footer',
            ],
        ];

        $this->load->view('dashboard/partial/contents/index', $data);

    }

    public function detail()
    {
        $data['dataGet'] = $this->produk->getIdDetail($_POST['id']);
        echo json_encode($data['dataGet']);
    }

    public function form()
    {
        $data['dataGet'] = empty($_POST) ? '' : $this->produk->getId($_POST['id']);
        $dataImages = empty($_POST) ? '' : $this->produk->getProdukImagesId($_POST['id']);

        $count_images_ = 0;
        $images_ = '[';
        if (!empty($_POST)) {
            foreach ($dataImages as $c => $r) {
                $koma = $c < count($dataImages) - 1 ? ', ' : '';
                $images_ .= '"' . base_url($r->gambar) . '"' . $koma;
                $count_images_ += 1;
            }
        }
        $images_ .= ']';

        $data['dataGetImages'] = $images_;
        $data['dataGetCountImages'] = $count_images_;

        $this->load->view('dashboard/master/produk/partial/form', $data);

    }

    public function opt()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }
        $getPages = $this->input->post('table') ?
        ($this->input->post('table') == 'kategori' ? 'kategori_produk' : $this->input->post('table')) : $this->input->post('table');
        echo json_encode($this->produk->dataOpt($getPages));
    }

    public function validate_image()
    {
        $check = true;
        if ((!isset($_FILES['file'])) || $_FILES['file']['size'] == 0) {
            $this->form_validation->set_message('validate_image', 'The {field} field is required');
            // $check = false;
        }

        return $check;
    }

    public function UploadFile()
    {
        $image['images'] = array();

        $dir = 'storages/upload/produk/images/';
        if (!is_dir($dir)) {
            mkdir('./' . $dir, 0777, true);
        }

        for ($count = 0; $count < count($this->input->post("imagebase")); $count++) {
            $image_parts = explode(";base64,", $_POST['imagebase'][$count]);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $dir . uniqid() . '.png';

            $image['images'][] = $file;

            file_put_contents($file, $image_base64);

        }
        return $image;
    }

    public function update()
    {
        if ($this->input->method() !== 'post') {
            return show_404();
        }

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga_hpp', 'Harga HPP', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === true) {

            $lastStok = $this->produk->getId($_POST['id']);

            if ($lastStok->stok > 0 && !empty($this->input->post('stok'))) {
                $data['code'] = 500;
                $data['msg'] = 'Anda tidak diperbolehkan mengubah data stok!';

                echo json_encode($data);
                exit();
            }

            $store = [
                'kategori_id' => $this->input->post('kategori'),
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'harga_hpp' => $this->input->post('harga_hpp'),
                'harga_jual' => $this->input->post('harga_jual'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];

            if (!empty($this->input->post('stok'))) {
                $store_stok = [
                    'stok' => $this->input->post('stok'),
                ];
            } else {
                $store_stok = [];
            }

            $update = $this->produk->update($_POST['id'], array_merge($store, $store_stok));
            $ubahData = $this->db->affected_rows();

            if ($update) {

                if (!empty($this->input->post('stok'))) {
                    $store_log_stok = [
                        'produk_id' => $_POST['id'],
                        'tanggal' => date('Y-m-d H:i:s'),
                        'masuk' => $this->input->post('stok'),
                        'keluar' => 0,
                        'sisa' => $this->input->post('stok'),
                        'keterangan' => 'STOK OPNAME',
                    ];

                    $update = $this->produk->insert_log_stok($store_log_stok);

                }

                if ($this->input->post("images_selected") == 0) {

                    foreach ($this->produk->getProdukImagesId($_POST['id']) as $r) {
                        $this->deleteFiles($r->gambar);
                    }
                    $this->produk->deleteImagesId($_POST['id']);

                } else if (!empty($this->input->post("imagebase"))) {

                    foreach ($this->produk->getProdukImagesId($_POST['id']) as $r) {
                        $this->deleteFiles($r->gambar);
                    }
                    $this->produk->deleteImagesId($_POST['id']);

                    if (!empty($this->input->post("imagebase"))) {
                        $filesImageUpload = $this->UploadFile();

                        $dataImages = $filesImageUpload;
                        $storeImg = array();
                        for ($img = 0; $img < count($dataImages['images']); $img++) {
                            array_push($storeImg, array(
                                'produk_id' => $_POST['id'],
                                'gambar' => $dataImages['images'][$img],
                                'keterangan' => 'Images ' . $img,
                            ));
                        }

                        $simpanImg = $this->produk->saveProdImg($storeImg);
                    }

                }

                if ($update) {
                    $data['code'] = 200;
                    $data['msg'] = 'Anda berhasil mengubah data' . ($ubahData == 0 ? ', namun tidak ada perubahan' : '');
                } else {
                    if ($simpanImg) {
                        $data['code'] = 200;
                        $data['msg'] = 'Anda berhasil mengubah data image';
                    } else {
                        $data['code'] = 500;
                        $data['msg'] = 'Anda tidak berhasil mengubah data image';
                    }
                }

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

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga_hpp', 'Harga HPP', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === true) {

            $store = [
                'kategori_id' => $this->input->post('kategori'),
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'harga_hpp' => $this->input->post('harga_hpp'),
                'harga_jual' => $this->input->post('harga_jual'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok' => $this->input->post('stok'),
            ];

            $simpan = $this->produk->save($store);

            if ($simpan) {

                if (!empty($this->input->post("imagebase"))) {
                    $dataImages = $this->UploadFile();
                    $storeImg = array();
                    for ($img = 0; $img < count($dataImages['images']); $img++) {
                        array_push($storeImg, array(
                            'produk_id' => $simpan,
                            'gambar' => $dataImages['images'][$img],
                            'keterangan' => 'Images ' . $img,
                        ));
                    }

                    $simpanImg = $this->produk->saveProdImg($storeImg);
                }

                if ($simpan) {
                    $data['code'] = 200;
                    $data['msg'] = 'Anda berhasil menyimpan data';
                } else {
                    if ($simpanImg) {
                        $data['code'] = 200;
                        $data['msg'] = 'Anda berhasil menyimpan data image';
                    } else {
                        $data['code'] = 500;
                        $data['msg'] = 'Anda tidak berhasil menyimpan data image';
                    }
                }
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
        $this->load->view('dashboard/master/produk/partial/table');

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
        return $this->produk->json($sc);
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
        $getId = $this->produk->getId($id);

        if ($getId) {
            foreach ($this->produk->getProdukImagesId($_POST['id']) as $r) {
                $this->deleteFiles($r->gambar);
            }

            $this->produk->deleteImagesId($_POST['id']);

            $this->produk->deleteId($id);
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
