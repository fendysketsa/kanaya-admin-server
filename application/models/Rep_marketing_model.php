<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rep_marketing_model extends CI_Model
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
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        return $this->db->count_all($this->table);
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like('pegawai.nama', $search);
        }
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        return $this->db->get($this->table)->num_rows();
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
            $this->db->like("pegawai.nama", $search['search']);
        }

        $this->db->select('pegawai.nama as marketing, kecamatan.nama as area');
        $this->db->select("(SELECT COUNT(*) from transaksi WHERE $where_sub marketing_id = pegawai.id) as jumlah_member");
        $this->db->select("(SELECT COUNT(*) from transaksi WHERE $where_sub bayar_tempo = 7 AND marketing_id = pegawai.id) as pemb_mingguan");
        $this->db->select("(SELECT COUNT(*) from transaksi WHERE $where_sub bayar_tempo != 7 AND marketing_id = pegawai.id) as pemb_bulanan");

        $this->db->group_by('pegawai.id');
        // $this->db->order_by($this->table . '.' . $search['order_field'], $this->table . '.' . $search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        $this->db->join('kecamatan', 'kecamatan.id = pegawai.kecamatan_id');

        return $this->db->get($this->table)->result_array();
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
