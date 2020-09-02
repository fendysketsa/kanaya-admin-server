<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang_model extends CI_Model
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
        $this->db->join('member', 'transaksi.member_id = member.id');
        return $this->db->count_all($this->table);
    }

    public function countDataFilter($search = null)
    {
        if (!empty($search)) {
            $this->db->like('pegawai.nama', $search);
        }
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        $this->db->join('member', 'transaksi.member_id = member.id');
        return $this->db->get($this->table)->num_rows();
    }

    public function dataFilter($search = null)
    {
        if (!empty($search['search_tanggal'])) {
            $tanggal = explode(" - ", $search['search_tanggal']);
            $this->db->where('DATE(transaksi.tanggal) >=', convertDate($tanggal[0], '/', '-'));
            $this->db->where('DATE(transaksi.tanggal) <=', convertDate($tanggal[1], '/', '-'));
        }

        if (!empty($search['search'])) {
            $this->db->like("pegawai.nama", $search['search']);
            $this->db->or_like("member.nama", $search['search']);
        }

        $this->db->where('transaksi.cara_bayar', 'cicilan');
        $this->db->select('(transaksi.total_biaya - (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id)) as piutang,(SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id) as terbayar, pegawai.nama as marketing, transaksi.total_biaya as total_tagihan, transaksi.tanggal as tanggal_bayar, member.nama as member');
        $this->db->order_by($this->table . '.' . $search['order_field'], $this->table . '.' . $search['order_ascdesc']);
        $this->db->limit($search['limit'], $search['offset']);
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        $this->db->join('member', 'transaksi.member_id = member.id');
        // $this->db->where('role.nama','marketing');
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

    public function marketing()
    {
        $this->db->where('pegawai.role_id', '4');
        return $this->db->get('pegawai')->result_array();
    }

    public function marketingById($id)
    {
        $this->db->where('pegawai.id', $id);
        return $this->db->get('pegawai')->result_array(); 
    }

    public function report($data)
    {
        if($data['type'] == 'tagihan') {
        

        $datum = [];

      //  echo $data['start_date'].' '.$data['end_date'];
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->where('transaksi.cara_bayar', 'cicilan');
        $this->db->select('(transaksi.total_biaya - (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id)) as piutang,(SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id) as terbayar, pegawai.nama as marketing, transaksi.total_biaya as total_tagihan, transaksi.tanggal as tanggal_bayar, member.nama as member,member.telepon,member_detail.alamat_tinggal,transaksi.id as transaksi_id,transaksi_angsuran.tanggal as tanggal_angsurann,transaksi_angsuran.jumlah_angsuran');
        $this->db->where('transaksi.status','proses');
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        $this->db->join('member', 'transaksi.member_id = member.id');
         $this->db->join('member_detail', 'member_detail.member_id = member.id','left');
         $this->db->join('transaksi_angsuran', 'transaksi_angsuran.transaksi_id = transaksi.id', 'left');
            if(!empty($data['end_date'])) {
                 $this->db->where('transaksi_angsuran.tanggal >=', $data['start_date']);
                $this->db->where('transaksi_angsuran.tanggal <=', $data['end_date']);  
            }else{
                $this->db->where('transaksi_angsuran.tanggal', $data['start_date']);
            }

            if($data['marketing'] != 'all') {
                $this->db->where('pegawai.id', $data['marketing']);
            }
           
           $this->db->order_by('transaksi_angsuran.tanggal');
           $this->db->where('transaksi_angsuran.status',0);
           $this->db->where('member.account','real');
           $this->db->group_by('transaksi.id');
            $result = $this->db->get($this->table)->result_array();

          // echo '<pre>'.print_r($result, true) .'</pre>';

            $i = 0;
            foreach ($result as $dt) {
                $cicilan = $this->cicilan($dt['transaksi_id']);
                $result[$i]['cicilan'] = $cicilan;

                array_push($datum, $result[$i]);
                $i++;
            }
           //   echo '<pre>'.print_r($datum, true) .'</pre>';

            return $datum;

        } elseif($data['type'] == 'dp') {
            $datum = [];

      //  echo $data['start_date'].' '.$data['end_date'];
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->where('transaksi.cara_bayar', 'cicilan');
        $this->db->select('(transaksi.total_biaya - (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id)) as piutang,(SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id) as terbayar, pegawai.nama as marketing, transaksi.total_biaya as total_tagihan, transaksi.tanggal as tanggal_bayar, member.nama as member,member.telepon,member_detail.alamat_tinggal,transaksi.id as transaksi_id,transaksi_angsuran.tanggal as tanggal_angsurann,transaksi_angsuran.jumlah_angsuran,transaksi.status,transaksi.no_transaksi');
        $this->db->where('transaksi.status','proses');
        $this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
        $this->db->join('member', 'transaksi.member_id = member.id');
         $this->db->join('member_detail', 'member_detail.member_id = member.id','left');
         $this->db->join('transaksi_angsuran', 'transaksi_angsuran.transaksi_id = transaksi.id', 'left');
            // if(!empty($data['end_date'])) {
            //      $this->db->where('transaksi_angsuran.tanggal >=', $data['start_date']);
            //     $this->db->where('transaksi_angsuran.tanggal <=', $data['end_date']);  
            // }else{
            //     $this->db->where('transaksi_angsuran.tanggal', $data['start_date']);
            // }

            if($data['marketing'] != 'all') {
                $this->db->where('pegawai.id', $data['marketing']);
            }
           
           $this->db->order_by('transaksi_angsuran.tanggal');
         //  $this->db->where('transaksi_angsuran.status',0);
           $this->db->group_by('transaksi.id');
           $this->db->where('member.account','real');
            $result = $this->db->get($this->table)->result_array();

          // echo '<pre>'.print_r($result, true) .'</pre>';

            $i = 0;
            foreach ($result as $dt) {
                //$cicilan = $this->cicilan($dt['transaksi_id']);
               // $result[$i]['cicilan'] = $cicilan;
                if($dt['total_tagihan'] == $dt['piutang'] or empty($dt['piutang'])) {
                    array_push($datum, $result[$i]);
                }
                // array_push($datum, $result[$i]);
                $i++;
            }
        //  echo '<pre>'.print_r($datum, true) .'</pre>';

            return $datum;

        } 
    }

    private function cicilan($id)
    {
        $i = 1;
        $this->db->where('transaksi_id', $id);
        $this->db->order_by('tanggal');
        $cicilan = $this->db->get('transaksi_angsuran')->result_array();

        foreach ($cicilan as $dt) {
            if($dt['status'] == 0) {
               return $i;
               break;
            }
            $i++;
        }
    }

    public function piutang($piutang) 
    {
        $nominal = 0;
        foreach ($piutang as $dt) {
            if($dt['status'] != 1) {
                $nominal = $nominal + $dt['jumlah_angsuran'];
            }
        }

        return $nominal;
    }

}