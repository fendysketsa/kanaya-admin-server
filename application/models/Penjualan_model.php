<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
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

		$this->db->select('IF(transaksi.cara_bayar = "lunas", transaksi.total_biaya, (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id ORDER BY id DESC LIMIT 1)) as nominal, pegawai.nama as marketing, transaksi.cara_bayar, transaksi.tanggal as tanggal_bayar, member.nama as member');
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
		if ($data['type'] == 'global') {


			$this->db->select('IF(transaksi.cara_bayar = "lunas", transaksi.total_biaya, (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id ORDER BY id DESC LIMIT 1)) as nominal, pegawai.nama as marketing, transaksi.cara_bayar, transaksi.tanggal as tanggal_bayar, member.nama as member');
			$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
			$this->db->join('member', 'transaksi.member_id = member.id');
			$this->db->where('transaksi.tanggal >=', $data['start_date']);
			$this->db->where('transaksi.tanggal <=', $data['end_date']);
			$this->db->where('member.account', 'real');
			// $this->db->where('role.nama','marketing');
			if ($data['marketing'] != 'all') {
				$this->db->where('pegawai.id', $data['marketing']);
			}
			return $this->db->get($this->table)->result_array();
		} elseif ($data['type'] == 'rincian') {
			$datum = [];
			$this->db->select('IF(transaksi.cara_bayar = "lunas", transaksi.total_biaya, (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id ORDER BY id DESC LIMIT 1)) as nominal, pegawai.nama as marketing, transaksi.cara_bayar, transaksi.tanggal as tanggal_bayar, member.nama as member,transaksi.status,transaksi.id');
			$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
			$this->db->join('member', 'transaksi.member_id = member.id');
			$this->db->where('transaksi.tanggal >=', $data['start_date']);
			$this->db->where('transaksi.tanggal <=', $data['end_date']);
			$this->db->where('member.account', 'real');
			// $this->db->where('role.nama','marketing');
			if ($data['marketing'] != 'all') {
				$this->db->where('pegawai.id', $data['marketing']);
			}
			$result = $this->db->get($this->table)->result_array();

			$i = 0;
			foreach ($result as $sales) {
				if ($sales['cara_bayar'] == 'lunas') {
					$result[$i]['dp'] = $sales['nominal'];
					$result[$i]['piutang'] = 0;

					array_push($datum, $result[$i]);
				} else {
					$cicilan = $this->cicilan($sales['id']);

					if (count($cicilan) > 0) {
						$result[$i]['dp'] = $cicilan[0]['jumlah_angsuran'];
					} else {
						$result[$i]['dp'] = 0;
					}

					if ($sales['status'] == 'success') {
						$result[$i]['piutang'] = 0;
					} else {
						$result[$i]['piutang'] = $this->piutang($cicilan);
					}

					array_push($datum, $result[$i]);
				}
				$i++;
			}

			return $datum;
		} else {
			$datum = [];
			$this->db->select('IF(transaksi.cara_bayar = "lunas", transaksi.total_biaya, (SELECT SUM(nominal) from log_transaksi_cicilan where transaksi_id = transaksi.id ORDER BY id DESC LIMIT 1)) as nominal, pegawai.nama as marketing, transaksi.cara_bayar, transaksi.tanggal as tanggal_bayar, member.nama as member,transaksi.status,transaksi.id,diskon.id as diskon_id, diskon.nominal as nominal_diskon');
			$this->db->join('pegawai', 'transaksi.marketing_id = pegawai.id');
			$this->db->join('member', 'transaksi.member_id = member.id');
			$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id', 'left');
			$this->db->join('diskon', 'transaksi_detail.diskon_id = diskon.id', 'left');
			$this->db->where('transaksi.tanggal >=', $data['start_date']);
			$this->db->where('transaksi.tanggal <=', $data['end_date']);
			$this->db->where('member.account', 'real');
			// $this->db->where('role.nama','marketing');
			if ($data['marketing'] != 'all') {
				$this->db->where('pegawai.id', $data['marketing']);
			}
			$result = $this->db->get($this->table)->result_array();


			$i = 0;
			foreach ($result as $dt) {
				if (empty($dt['diskon_id'])) {
					$result[$i]['nominal_diskon'] = 0;
				}

				$result[$i]['total_biaya'] = $dt['nominal'] - $dt['nominal_diskon'];

				array_push($datum, $result[$i]);
				$i++;
			}

			return $datum;
		}
	}

	private function cicilan($id)
	{
		$this->db->where('transaksi_id', $id);
		$this->db->order_by('tanggal');
		return $this->db->get('transaksi_angsuran')->result_array();
	}

	public function piutang($piutang)
	{
		$nominal = 0;
		foreach ($piutang as $dt) {
			if ($dt['status'] != 1) {
				$nominal = $nominal + $dt['jumlah_angsuran'];
			}
		}

		return $nominal;
	}
}
