<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setoran_model extends CI_Model
{

	protected $table = 'log_setoran';

	public function save($data)
	{
		$this->db->set($data);
		$this->db->insert($this->table);
		return $this->db->insert_id();
	}

	public function getId($id)
	{
		$this->db->where($this->table . ".id", $id);
		//  $this->db->join('transaksi',$this->table.'.transaksi_id = transaksi.id');
		$this->db->join('pegawai', $this->table . '.marketing_id = pegawai.id');
		// $this->db->join('member','transaksi.member_id = member.id');
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
		// $this->db->join('transaksi',$this->table.'.transaksi_id = transaksi.id');
		// $this->db->join('pegawai','transaksi.marketing_id = pegawai.id');
		// $this->db->join('member','transaksi.member_id = member.id');
		$this->db->join('pegawai', $this->table . '.marketing_id = pegawai.id');
		return $this->db->count_all($this->table);
	}

	public function countDataFilter($search = null)
	{
		if (!empty($search)) {
			$this->db->like('pegawai.nama', $search);
		}
		// $this->db->join('transaksi',$this->table.'.transaksi_id = transaksi.id');
		// $this->db->join('pegawai','transaksi.marketing_id = pegawai.id');
		// $this->db->join('member','transaksi.member_id = member.id');
		$this->db->join('pegawai', $this->table . '.marketing_id = pegawai.id');
		return $this->db->get($this->table)->num_rows();
	}

	public function dataFilter($search = null)
	{
		if (!empty($search['search'])) {
			$this->db->like('transaksi.no_transaksi', $search['search']);
		}
		$this->db->select('pegawai.nama as pegawai, log_setoran.*');
		$this->db->order_by($this->table . '.' . $search['order_field'], $search['order_ascdesc']);
		$this->db->limit($search['limit'], $search['offset']);
		// $this->db->join('transaksi',$this->table.'.transaksi_id = transaksi.id');
		// $this->db->join('pegawai','transaksi.marketing_id = pegawai.id');
		// $this->db->join('member','transaksi.member_id = member.id');
		$this->db->join('pegawai', $this->table . '.marketing_id = pegawai.id');
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

	public function getCountSetoran()
	{
		$this->db->select($this->table . '.*, pegawai.nama as pegawai');
		$this->db->join('pegawai', $this->table . '.marketing_id = pegawai.id');
		$this->db->where($this->table . '.status', 0);
		return $this->db->get($this->table)->result_array();
	}

	public function report($data)
	{



		$datum = [];

		$lunas = $this->get_penjualan_cash($data);

		// echo '<pre>'.print_r($lunas, true) .'</pre>'; die();
		$cicilan = $this->get_penjualan_cicilan($data);

		return [
			"lunas"   => $lunas,
			"cicilan" => $cicilan,
		];
		// echo '<pre>'.print_r($cicilan, true) .'</pre>'; die();





		//     echo '<pre>'.print_r($result, true).'<pre>';  

	}

	public function get_penjualan_cash($data)
	{
		//echo $data['start_date']; die();
		$this->db->select('transaksi.id as transaksi_id, transaksi.total_biaya,transaksi.status,transaksi.cara_bayar,produk.harga_hpp,produk.harga_jual,transaksi.tanggal,transaksi_detail.jumlah');
		if ($data['type'] != 'all') {
			$this->db->where('transaksi.tanggal >=', $data['start_date']);
			$this->db->where('transaksi.tanggal <=', $data['end_date']);
		}
		$this->db->join('transaksi_detail', 'transaksi.id = transaksi_detail.transaksi_id');
		$this->db->join('produk', 'produk.id = transaksi_detail.produk_id');
		$this->db->join('member', 'transaksi.member_id = member.id');
		$this->db->where('transaksi.status', 'success');
		$this->db->where('transaksi.cara_bayar', 'lunas');
		$this->db->where('member.account', 'real');

		$data = $this->db->get('transaksi')->result_array();

		// echo '<pre>'.print_r($data, true).'</pre>';

		$i = 0;
		$trx_id = 0;
		$total_penjualan = 0;
		$hpp = 0;
		$harga_produk = 0;
		foreach ($data as $trx) {
			if ($trx_id != $trx['transaksi_id']) {
				$total_penjualan = $total_penjualan + $trx['total_biaya'];
			}
			$hpp = $hpp + ($trx['jumlah'] * $trx['harga_hpp']);
			$harga_produk = $harga_produk + ($trx['jumlah'] * $trx['harga_jual']);
			$trx_id = $trx['transaksi_id'];
			$i++;
		}

		$adm = $total_penjualan - $harga_produk;
		$laba_kotor = $harga_produk - $hpp;

		return [
			"total_penjualan" => $total_penjualan,
			"penjualan_cash"  => $total_penjualan - $adm,
			"adm"             => $adm,
			"hpp"             => $hpp,
			"laba_kotor"      => $laba_kotor,
		];
	}

	public function get_penjualan_cicilan($data)
	{
		// $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->where('transaksi.cara_bayar', 'cicilan');
		$this->db->select('(transaksi.total_biaya - (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id)) as piutang,(SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id) as terbayar, pegawai.nama as marketing, transaksi.total_biaya as total_tagihan, transaksi.tanggal as tanggal_bayar,transaksi.id as transaksi_id,transaksi.cara_bayar,produk.harga_hpp,produk.harga_jual,transaksi.tanggal,transaksi_detail.jumlah,transaksi.total_biaya');
		$this->db->where('transaksi.status', 'proses');
		$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
		$this->db->join('member', 'transaksi.member_id = member.id');
		$this->db->join('member_detail', 'member_detail.member_id = member.id', 'left');
		$this->db->join('transaksi_detail', 'transaksi.id = transaksi_detail.transaksi_id');
		$this->db->join('produk', 'produk.id = transaksi_detail.produk_id');
		//  $this->db->join('transaksi_angsuran', 'transaksi_angsuran.transaksi_id = transaksi.id', 'left');
		$this->db->where('member.account', 'real');
		if ($data['type'] != 'all') {
			$this->db->where('transaksi.tanggal >=', $data['start_date']);
			$this->db->where('transaksi.tanggal <=', $data['end_date']);
		}

		// $this->db->order_by('transaksi_angsuran.tanggal');
		//  $this->db->where('transaksi_angsuran.status',0);
		//  $this->db->group_by('transaksi.id');
		$data = $this->db->get('transaksi')->result_array();

		//echo '<pre>'.print_r($data, true).'</pre>'; 
		//die();
		$i = 0;
		$trx_id = 0;
		$total_penjualan = 0;
		$hpp = 0;
		$harga_produk = 0;
		$piutang = 0;
		$bayar   = 0;
		$hutang  = 0;
		foreach ($data as $trx) {
			if ($trx_id != $trx['transaksi_id']) {
				$total_penjualan = $total_penjualan + $trx['total_biaya'];
				$bayar = $bayar + $trx['terbayar'];
			}
			$hpp = $hpp + ($trx['jumlah'] * $trx['harga_hpp']);
			$harga_produk = $harga_produk + ($trx['jumlah'] * $trx['harga_jual']);
			$trx_id = $trx['transaksi_id'];
			$i++;
		}
		$hutang = $total_penjualan - $bayar;
		$adm = $total_penjualan - $harga_produk;
		$laba_kotor = $harga_produk - $hpp;

		return [
			"total_penjualan" => $total_penjualan,
			"penjualan_cicil" => $total_penjualan - $adm,
			"bayar"           => $bayar,
			"hutang"          => $hutang,
			"adm"             => $adm,
			"hpp"             => $hpp,
			"laba_kotor"      => $laba_kotor,
		];
	}
}
