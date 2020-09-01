<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_admin_model extends CI_Model
{

	protected $table = 'transaksi';

	public function allData()
	{
		$this->db->select('transaksi.*, member.nama as member, pegawai.nama as marketing, transaksi_detail.jumlah');
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('member', 'transaksi.member_id = member.id');
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id ', 'left');
		//  $this->db->join($this->table.'.id = transaksi_detail.transaksi_id');
		// return $this->db->count_all($this->table);
		$this->db->where('transaksi_detail.firts_trx', 1);
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
		$this->db->where('transaksi_detail.firts_trx', 1);
		return $this->db->get($this->table)->num_rows();
	}

	public function dataFilter($search = null)
	{
		if (!empty($search['search'])) {
			$this->db->like('nama', $search['search']);
		}

		$this->db->select('DISTINCT(transaksi.id), pegawai.nama as pegawai, transaksi.*, member.nama as member, IF(transaksi_detail.firts_trx =1, "25000", "0") as nominal_admin');
		$this->db->order_by($this->table . '.' . $search['order_field'], $search['order_ascdesc']);
		$this->db->limit($search['limit'], $search['offset']);
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id', 'left');
		$this->db->join('member', 'transaksi.member_id = member.id');
		$this->db->where('transaksi_detail.firts_trx', 1);
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
}
