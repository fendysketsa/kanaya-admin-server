<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rep_member_model extends CI_Model
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
        $this->db->join('member', 'transaksi.member_id = member.id');
        return $this->db->count_all($this->table);
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like('member.nama', $search);
        }
        $this->db->join('member', 'transaksi.member_id = member.id');
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
            $this->db->like("member.nama", $search['search']);
        }

        $this->db->select('member.nama as member, member.tanggal_lahir as tanggal_ultah');
        $this->db->select("(SELECT SUM(total_biaya) from transaksi WHERE $where_sub member_id = member.id) as total_pembelian");
        $this->db->select("IF(transaksi.cara_bayar = 'cicilan', (SELECT SUM(nominal) from log_transaksi_cicilan WHERE transaksi_id = transaksi.id), transaksi.total_biaya) as nominal");

        // $this->db->group_by('member.id');
        // $this->db->order_by($this->table . '.' . $search['order_field'], $this->table . '.' . $search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
        $this->db->join('member', 'transaksi.member_id = member.id');

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
