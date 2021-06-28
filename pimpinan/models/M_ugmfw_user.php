<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_ugmfw_user extends CI_Model 
{
	
	public function get($id = null)
	{
		
		$this->db->from('ugmfw_user');
		if($id != null)
		{
			$this->db->where(['user_id'], $id);
			//$this->db->where('is_deleted', 1);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'user_username' => $post['username'],
			'user_nama_lengkap' => $post['nama_pimpinan'],
			'user_nip' => $post['nip'],
			'user_gelar' => $post['jabatan'],
			//'nip' => $post['nip'],
			//'e_mail' => $post['email'],
			//'alamat_' => $post['address'],
		];
		$this->db->insert('ugmfw_user', $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('ugmfw_user');
		
	}

}