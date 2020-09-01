<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskon_model extends CI_Model
{

    protected $table = 'diskon';

    public function save($data)
    {
        $this->db->set($data);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function getId($id)
    {
        $this->db->where("id", $id);
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
            $this->db->like('nama', $search);
        }
        return $this->db->get($this->table)->num_rows();
    }

    public function dataFilter($search = null)
    {
        if (!empty($search['search'])) {
            $this->db->like('nama', $search['search']);
        }

        $this->db->order_by($search['order_field'], $search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
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