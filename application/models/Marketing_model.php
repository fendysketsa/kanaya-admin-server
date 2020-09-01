<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing_model extends CI_Model
{

    protected $table = 'pegawai';

    public function save($data)
    {
        $this->db->set($data);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function getId($id)
    {
        $this->db->select('role.nama as role, pegawai.*, kecamatan.nama as kecamatan, kecamatan.id as kecamatan_id, kota.nama as kota, kota.id as kabupaten_id, provinsi.nama as provinsi, provinsi.id as provinsi_id');
        $this->db->where($this->table.".id", $id);
        $this->db->join('role',$this->table.'.role_id = role.id');
        $this->db->join('kecamatan',$this->table.'.kecamatan_id = kecamatan.id');
        $this->db->join('kota','kecamatan.kota_id = kota.id');
        $this->db->join('provinsi','kota.provinsi_id = provinsi.id');
        $this->db->where('role.nama','marketing');
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
        $this->db->join('role',$this->table.'.role_id = role.id');
        $this->db->where('role.nama','marketing');
        return $this->db->count_all($this->table);
    }

    public function provinsi()
    {
        return $this->db->get('provinsi')->result_array();
    }

      public function kabupaten($id)
    {
        $this->db->where('provinsi_id', $id);
        return $this->db->get('kota')->result_array();
    }

    public function kecamatan($id)
    {
        $this->db->where('kota_id', $id);
        return $this->db->get('kecamatan')->result_array();
    }

    public function manager()
    {
        $this->db->select('role.nama as role, pegawai.nama, pegawai.id, kecamatan.nama as kecamatan');
        $this->db->join('role',$this->table.'.role_id = role.id');
        $this->db->join('kecamatan',$this->table.'.kecamatan_id = kecamatan.id');
        $this->db->where('role.nama','marketing');
        return $this->db->get($this->table)->result_array();
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like($this->table.'.nama', $search);
        }
         $this->db->join('role',$this->table.'.role_id = role.id');
        $this->db->where('role.nama','marketing');
        return $this->db->get($this->table)->num_rows();
    }

    public function dataFilter($search = null)
    {
        if (!empty($search['search'])) {
            $this->db->like($this->table.'.nama', $search['search']);
        }
        $this->db->select('role.nama as role, pegawai.*, kecamatan.nama as kecamatan');
        $this->db->order_by($this->table.'.'.$search['order_field'], $this->table.'.'.$search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
        $this->db->join('role',$this->table.'.role_id = role.id');
        $this->db->join('kecamatan',$this->table.'.kecamatan_id = kecamatan.id');
        $this->db->where('role.nama','marketing');
        return $this->db->get($this->table)->result_array();
    }

    public function json($search = null)
    {
        $sql_total = $this->allData();
        $sql_data = $this->dataFilter($search);
        $sql_filter = $this->countDataFilter($search['search']);
        $datum = array();
         foreach ($sql_data as $dt) {
         
            $row = array();
            $row['id'] = $dt['id'];
            $row['nama'] = $dt['nama'];
            $row['role'] = $dt['role'];
            $row['tanggal_lahir'] = $dt['tanggal_lahir'];
            $row['tempat_lahir'] = $dt['tempat_lahir'];
            $row['alamat'] = $dt['alamat'];
            $row['telepon'] = $dt['telepon'];
            $row['email'] = $dt['email'];
            $row['foto'] = $dt['foto'];
            $row['trip_fee'] = $dt['trip_fee'];
            $row['point'] = $dt['point'];
            $row['kecamatan'] = $dt['kecamatan'];
            $row['manager_id'] = $dt['manager_id'];
            $row['saldo'] = $this->get_mysaldo($dt['id']);
            $row['manager'] = $this->getManager($dt['manager_id']);


            $datum[] = $row;
        }

        $callback = array(
            'draw' => $search['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $sql_filter,
            'data' => $datum,
        );

        header('Content-Type: application/json');
        echo json_encode($callback);

    }

    public function getManager($id){

        if(empty($id)){
            return null;
        }else{
            $this->db->where('id', $id);
            return $this->db->get($this->table)->result_array()[0]['nama'];
        }
    }

    public function mymanager($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table)->result_array();
    }

    public function get_role_marketing()
    {
        $this->db->where('nama', 'marketing');
        return $this->db->get('role')->result_array();
    }

    public function get_mysaldo($marketing_id)
    {
        $cicilan = $this->cicilanSaldo($marketing_id);
        $tunai   = $this->tunaiSaldo($marketing_id);
        $setoran = $this->setoranSaldo($marketing_id);

        return $cicilan + $tunai - $setoran;

    }

    private function cicilanSaldo($marketing_id)
    {
        $this->db->select('transaksi_angsuran.jumlah_angsuran');
        $this->db->join('transaksi', 'transaksi.id = transaksi_angsuran.transaksi_id');
        $this->db->where('transaksi.marketing_id', $marketing_id);
        $this->db->where('transaksi_angsuran.status', 1);
        $data = $this->db->get('transaksi_angsuran')->result_array();

        $nominal = 0;

        foreach($data as $dt) {
            $nominal = $nominal + (float)$dt['jumlah_angsuran'];
        }

        return $nominal;
    }

    private function tunaiSaldo($marketing_id)
    {
        $this->db->select('transaksi.total_biaya');
        $this->db->where('transaksi.marketing_id', $marketing_id);
        $this->db->where('transaksi.cara_bayar', 'lunas');
        $this->db->where('transaksi.status', 'success');
        $data = $this->db->get('transaksi')->result_array();

        $nominal = 0;

        foreach($data as $dt) {
            $nominal = $nominal + (float)$dt['total_biaya'];
        }

        return $nominal;
    }

    private function setoranSaldo($marketing_id)
    {
        $this->db->select('log_setoran.nominal');
         $this->db->where('log_setoran.marketing_id', $marketing_id);
       // $this->db->where('log_setoran.marketing_id', 'lunas');
        $this->db->where('log_setoran.status', 1);
        $data = $this->db->get('log_setoran')->result_array();

        $nominal = 0;

        foreach ($data as $dt) {
            $nominal = $nominal + (float)$dt['nominal'];
        }

        return $nominal;
    }
}
