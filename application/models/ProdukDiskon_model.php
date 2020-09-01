<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukDiskon_model extends CI_Model
{

    protected $table = 'produk_diskon';

    public function save($data)
    {
        $this->db->set($data);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function getId($id)
    {
        $this->db->where($this->table.".id", $id);
        $this->db->select('produk.*, diskon.nama as nama_diskon, diskon.id as diskon_id, diskon.berlaku_dari, diskon.berlaku_sampai, diskon.nominal as nominal_diskon, produk_diskon.produk_id, ');
        $this->db->join('produk','produk_diskon.produk_id = produk.id');
        $this->db->join('diskon','produk_diskon.diskon_id = diskon.id');
        return $this->db->get($this->table)->row();
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update($this->table, $data);
    }

    public function deleteId($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }


    public function allData()
    {
        return $this->db->count_all($this->table);
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like('produk.nama', $search);
        }
        $this->db->join('produk','produk_diskon.produk_id = produk.id');
        $this->db->join('diskon','produk_diskon.diskon_id = diskon.id');
        return $this->db->get($this->table)->num_rows();
    }

    public function dataFilter($search = null)
    {
         if (!empty($search['search'])) {
            $this->db->like('produk.nama', $search['search']);
        }

        $this->db->order_by($this->table.'.'.$search['order_field'], $this->table.'.'.$search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
        $this->db->select('produk.*, diskon.nama as nama_diskon, diskon.id as diskon_id, diskon.berlaku_dari, diskon.berlaku_sampai, diskon.nominal as nominal_diskon, produk_diskon.produk_id, produk_diskon.id as produk_diskon_id ');
        $this->db->join('produk','produk_diskon.produk_id = produk.id');
        $this->db->join('diskon','produk_diskon.diskon_id = diskon.id');
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

    public function diskon()
    {
        return $this->db->get('diskon')->result_array();
    }

    public function produk()
    {
        $this->db->select('produk.id as produk_id, produk.nama as nama,produk.kode');
        return $this->db->get('produk')->result_array();
    }
}
