<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function login($username, $password, $table)
	{
		if ($table == 'superuser') {
			$periksa = $this->db->get_where('superuser', array('nama' => $username, 'kata_sandi' => md5($password)));
		} else {
			$periksa = $this->db->get_where('pegawai', array('username' => $username, 'password' => md5($password)));
		}

		if ($periksa->num_rows() > 0) {
			$data['count'] = 1;
			$data['row'] = $periksa->row();
			return $data;
		} else {
			$data['count'] = 0;
			$data['row'] = null;
			return $data;
		}
	}
}
