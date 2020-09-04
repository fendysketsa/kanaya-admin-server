<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{

	function __construct()
	{
		  parent::__construct();
		 $this->load->helper('global');
	}


	protected $table = 'transaksi';

	public function save($data)
	{
		$this->db->set($data);
		$this->db->insert($this->table);
		return $this->db->insert_id();
	}

	public function getId($id)
	{
		$this->db->where($this->table . ".id", $id);
		$this->db->select('pegawai.nama as pegawai, transaksi.*, member.nama as member, produk.nama as produk, log_transaksi_cicilan.nominal, log_transaksi_cicilan.tanggal_cicilan');
		// $this->db->join('transaksi',$this->table.'.transaksi_id = transaksi.id');
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id', 'left');
		$this->db->join('produk', 'transaksi_detail.produk_id = produk.id', 'left');
		$this->db->join('log_transaksi_cicilan', 'log_transaksi_cicilan.transaksi_id = transaksi.id', 'left');
		$this->db->join('member', 'transaksi.member_id = member.id');
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
		$this->db->select('transaksi.*, member.nama as member, pegawai.nama as marketing, transaksi_detail.jumlah');
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('member', 'transaksi.member_id = member.id');
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id ', 'left');
		//  $this->db->join($this->table.'.id = transaksi_detail.transaksi_id');
		// return $this->db->count_all($this->table);
		return $this->db->count_all($this->table);
	}

	public function countDataFilter($search = null)
	{
		if (!empty($search)) {
			$this->db->like($this->table . '.no_transaksi', $search);
		}
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id ', 'left');
		$this->db->join('member', 'transaksi.member_id = member.id');
		return $this->db->get($this->table)->num_rows();
	}

	public function dataFilter($search = null)
	{

		//echo '<pre>'.print_r($search) .'</pre>';
		if (!empty($search['search'])) {

			$this->db->like('member.nama', $search['search']);
		}


		 if (!empty($search['search_tanggal'])) {
            $tanggal = explode(" - ", $search['search_tanggal']);

           // echo '<pre>'.print_r($tanggal, true).'</pre>';
            $this->db->where('DATE(transaksi.tanggal) >=', convertDate($tanggal[0], '/', '-'));
            $this->db->where('DATE(transaksi.tanggal) <=', convertDate($tanggal[1], '/', '-'));
        }


		$this->db->select('pegawai.nama as pegawai, transaksi.*, member.nama as member, produk.nama as produk, transaksi_detail.jumlah, transaksi_detail.harga_produk');
		$this->db->order_by($this->table . '.' . $search['order_field'], $search['order_ascdesc']);
		$this->db->limit($search['limit'], $search['offset']);
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id', 'left');
		$this->db->join('produk', 'transaksi_detail.produk_id = produk.id', 'left');
		$this->db->join('member', 'transaksi.member_id = member.id');
		// $this->db->join('transaksi_detail','transaksi_detail.transaksi_id = transaksi.id ', 'left');
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
	
	public function detail_trx($id)
    {
        $this->db->where('transaksi.id', $id);
        $this->db->select('pegawai.nama as pegawai, pegawai.alamat as alamat_pegawai,pegawai.telepon as pegawai_telepon, transaksi.*, member.nama as member,member.telepon, member_detail.*, kecamatan.nama as kecamatan, kota.nama as kota, provinsi.nama as provinsi, kecamatan.kode_pos');
        $this->db->join('pegawai','transaksi.marketing_id = pegawai.id');
        $this->db->join('member','transaksi.member_id = member.id');
        $this->db->join('member_detail','member_detail.member_id = member.id','left');
        $this->db->join('kecamatan','member_detail.kecamatan_id = kecamatan.id','left');
        $this->db->join('kota','kota.id = kecamatan.kota_id','left');
        $this->db->join('provinsi','kota.provinsi_id = kota.provinsi_id','left');
        $trx = $this->db->get($this->table)->result_array();

        $this->db->select('transaksi_detail.*, produk.*');
        $this->db->where('transaksi_id', $id);
        $this->db->join('produk','transaksi_detail.produk_id = produk.id','left');
        $detail = $this->db->get('transaksi_detail')->result_array();

        $this->db->where('transaksi_id', $id);
        $angsuran = $this->db->get("transaksi_angsuran")->result_array(); 

        return [
                "transaksi" => $trx[0],
                "detail" => $detail,
                "angsuran" => $angsuran,
              ];       
    }


	public function update_log($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('log_transaksi_cicilan', $data);
	}

}
