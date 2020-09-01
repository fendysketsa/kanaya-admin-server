<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_stock_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global');
    }

    public function getLog($id)
    {
        $this->db->join('produk', 'produk.id = log_stok.produk_id');
        $this->db->select('produk.nama, log_stok.*');
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('log_stok', array('produk_id' => $id))->result_array();
    }

    public function allData()
    {

        $this->db->join('kategori_produk', 'kategori_produk.id = produk.kategori_id');

        return $this->db->count_all('produk');
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like('produk.nama', $search);
        }

        $this->db->join('kategori_produk', 'kategori_produk.id = produk.kategori_id');

        return $this->db->get('produk')->num_rows();
    }

    public function dataFilter($search = null)
    {

        if (!empty($search['search'])) {
            $this->db->like("produk.nama", $search['search']);
        }

        $this->db->select('produk.id, produk.nama as nama_barang, produk.kode as sku, IF((SELECT sisa from log_stok where produk_id = produk.id AND keterangan = "STOK OPNAME" order by id DESC limit 1) > 0, (SELECT sisa from log_stok where produk_id = produk.id AND keterangan = "STOK OPNAME" order by id DESC limit 1), produk.stok) as stok_awal, produk.stok as stok_akhir, kategori_produk.nama as kategori');
        $this->db->join('kategori_produk', 'kategori_produk.id = produk.kategori_id');

        $this->db->order_by('kategori_produk.nama', 'ASC');
        $this->db->order_by('produk.nama', 'ASC');

        return $this->db->get('produk')->result_array();
    }

    public function json($search = null)
    {
        $sql_total = $this->allData();
        $sql_data = $this->dataFilter($search);
        $sql_filter = $this->countDataFilter($search['search']);

        $callback = array(
            'draw' => $search['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $sql_filter,
            'data' => $sql_data,
        );

        header('Content-Type: application/json');
        echo json_encode($callback);

    }

    public function kategori()
    {
           return $this->db->get('kategori_produk')->result_array();
    }

     public function kategoriById($id)
    {
           $this->db->where('id', $id);
           return $this->db->get('kategori_produk')->result_array();
    }

    public function report($kategori)
    {
        if($kategori == 'all' or $kategori == 'ready') {
            $this->db->select('produk.id, produk.nama as nama_barang, produk.kode as sku, IF((SELECT sisa from log_stok where produk_id = produk.id AND keterangan = "STOK OPNAME" order by id DESC limit 1) > 0, (SELECT sisa from log_stok where produk_id = produk.id AND keterangan = "STOK OPNAME" order by id DESC limit 1), produk.stok) as stok_awal, produk.stok as stok_akhir, kategori_produk.nama as kategori');
            $this->db->join('kategori_produk', 'kategori_produk.id = produk.kategori_id');

            $this->db->order_by('kategori_produk.nama', 'ASC');
            $this->db->order_by('produk.nama', 'ASC');

            return $this->db->get('produk')->result_array();
        }else {
              $this->db->select('produk.id, produk.nama as nama_barang, produk.kode as sku, IF((SELECT sisa from log_stok where produk_id = produk.id AND keterangan = "STOK OPNAME" order by id DESC limit 1) > 0, (SELECT sisa from log_stok where produk_id = produk.id AND keterangan = "STOK OPNAME" order by id DESC limit 1), produk.stok) as stok_awal, produk.stok as stok_akhir, kategori_produk.nama as kategori');
            $this->db->join('kategori_produk', 'kategori_produk.id = produk.kategori_id');

            $this->db->order_by('kategori_produk.nama', 'ASC');
            $this->db->order_by('produk.nama', 'ASC');
            $this->db->where('kategori_produk.id',$kategori);

            return $this->db->get('produk')->result_array();
        }
       
    }
}