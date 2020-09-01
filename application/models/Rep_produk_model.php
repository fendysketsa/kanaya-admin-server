<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rep_produk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global');
    }

    protected $table = 'transaksi';
    protected $table_detail = 'transaksi_detail';

    public function allData()
    {

        $this->db->join('transaksi_detail', 'transaksi_detail.produk_id = produk.id', 'LEFT');
        $this->db->join($this->table, 'transaksi.id = transaksi_detail.transaksi_id', 'LEFT');

        return $this->db->count_all('produk');
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like('produk.nama', $search);
        }

        $this->db->join('transaksi_detail', 'transaksi_detail.produk_id = produk.id', 'LEFT');
        $this->db->join($this->table, 'transaksi.id = transaksi_detail.transaksi_id', 'LEFT');

        return $this->db->get('produk')->num_rows();
    }

    public function dataFilter($search = null)
    {
        $where_sub = null;
        if (!empty($search['search_tanggal'])) {
            $tanggal = explode(" - ", $search['search_tanggal']);
            $this->db->where('DATE(transaksi.tanggal) >=', convertDate($tanggal[0], '/', '-'));
            $this->db->where('DATE(transaksi.tanggal) <=', convertDate($tanggal[1], '/', '-'));

            $where_sub .= 'DATE(transaksi.tanggal) >= "' . convertDate($tanggal[0], '/', '-') . '" ';
            $where_sub .= ' AND DATE(transaksi.tanggal) <= "' . convertDate($tanggal[1], '/', '-') . '" ';
            $where_sub .= ' AND ';

        }

        if (!empty($search['search'])) {
            $this->db->like("produk.nama", $search['search']);
        }

        $this->db->select('produk.nama as produk, produk.kode as sku');
        $this->db->select("(SELECT COUNT(*) from transaksi_detail WHERE $where_sub produk_id = produk.id) as terjual");

        $this->db->group_by('produk.id');
        // $this->db->order_by($this->table . '.' . $search['order_field'], $this->table . '.' . $search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);

        $this->db->join('transaksi_detail', 'transaksi_detail.produk_id = produk.id', 'LEFT');
        $this->db->join($this->table, 'transaksi.id = transaksi_detail.transaksi_id', 'LEFT');

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
}
