<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif_model extends CI_Model
{

    protected $table = 't_push_notif';

    public function save($data)
    {
        $this->db->set($data);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function getId($id)
    {
        $this->db->where($this->table.".id", $id);
        $this->db->select($this->table.'.*, pegawai.nama as pegawai, pegawai.id as marketing_id, member.id as member_id, member.nama as nama');
        $this->db->join('member',$this->table.'.member_id = member.id','left');
        $this->db->join('pegawai', $this->table.'.marketing_id = pegawai.id','left');
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

        $this->db->join('member',$this->table.'.member_id = member.id','left');
        $this->db->join('pegawai', $this->table.'.marketing_id = pegawai.id','left');
        return $this->db->count_all($this->table);
    }

    public function countDataFilter($search = null)
    { 
        if (!empty($search)) {
            $this->db->like($this->table.'.judul', $search);
        }

        $this->db->join('member',$this->table.'.member_id = member.id','left');
        $this->db->join('pegawai', $this->table.'.marketing_id = pegawai.id','left');
        return $this->db->get($this->table)->num_rows();
    }

    public function dataFilter($search = null)
    {

        if (!empty($search['search'])) {
            $this->db->like($this->table.'.judul', $search['search']);
        }

        $this->db->select($this->table.'.*, pegawai.nama as pegawai, pegawai.id as marketing_id, member.id as member_id, member.nama as nama');
        $this->db->order_by($search['order_field'], $search['order_ascdesc']);
        $this->db->join('member',$this->table.'.member_id = member.id','left');
        $this->db->join('pegawai', $this->table.'.marketing_id = pegawai.id','left');
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

    public function member()
    {
        $this->db->select('member.id as member_id, member.nama as nama');
        return $this->db->get('member')->result_array();
    }

     public function marketing()
    {
        $this->db->select('pegawai.id as marketing_id, pegawai.nama');
        $this->db->join('role','pegawai.role_id = role.id');
        $this->db->where('role.nama','marketing');
        return $this->db->get('pegawai')->result_array();
    }
}
