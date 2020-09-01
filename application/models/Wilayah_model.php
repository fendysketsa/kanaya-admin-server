<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah_model extends CI_Model
{

    public function save($data, $table)
    {
        $this->db->set($data);
        $this->db->insert($table);
        return $this->db->insert_id();
    }

    public function dataOpt($table)
    {
        return $this->db->get($table)->result();
    }

    public function getId($id, $table)
    {
        $this->db->where($table . ".id", $id);
        if ($table == 'kota') {
            $this->db->join('provinsi', 'provinsi.id = kota.provinsi_id', 'left');
            $this->db->select('provinsi.id as selected, ' . $table . '.*');
        }
        if ($table == 'kecamatan') {
            $this->db->join('kota', 'kota.id = kecamatan.kota_id', 'left');
            $this->db->select('kota.id as selected, ' . $table . '.*');
        }

        return $this->db->get($table)->row();
    }

    public function update($id, $data, $table)
    {
        $this->db->where("id", $id);
        return $this->db->update($table, $data);
    }

    public function deleteId($id, $table)
    {
        $this->db->where("id", $id);
        return $this->db->delete($table);
    }

    public function allData($table)
    {
        return $this->db->count_all($table);
    }

    public function countDataFilter($search = null, $table)
    {
        if (!empty($search)) {
            $this->db->like('nama', $search);
        }
        return $this->db->get($table)->num_rows();
    }

    public function dataFilter($search = null, $table)
    {
        if (!empty($search['search'])) {
            $this->db->like('nama', $search['search']);
        }

        $this->db->order_by($table . '.' . $search['order_field'], $search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
        if ($table == 'kota') {
            $this->db->join('provinsi', 'provinsi.id = kota.provinsi_id', 'left');
            $this->db->select('provinsi.nama as provinsi, ' . $table . '.*');
        }
        if ($table == 'kecamatan') {
            $this->db->join('kota', 'kota.id = kecamatan.kota_id', 'left');
            $this->db->join('provinsi', 'provinsi.id = kota.provinsi_id', 'left');
            $this->db->select('provinsi.nama as provinsi, kota.nama as kota, ' . $table . '.*');
        }

        return $this->db->get($table)->result_array();
    }

    public function json($search = null, $table)
    {
        $sql_total = $this->allData($table);
        $sql_data = $this->dataFilter($search, $table);
        $sql_filter = $this->countDataFilter($search['search'], $table);

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