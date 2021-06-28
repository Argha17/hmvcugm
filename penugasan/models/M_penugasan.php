<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_penugasan extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->from('tbl_penugasan');
		$this->db->join('ugmfw_group_menu', 'ugmfw_group_menu.group_menu_id = tbl_penugasan.group_menu_id');
		$this->db->join('ugmfw_user', 'ugmfw_user.user_id = tbl_penugasan.user_id');
		if($id != null)
		{
			$this->db->where('id_penugasan', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	

	public function add($post)
	{
		$params = [
			'nama_penugasan' => $post['fullname'],
			'id_satker' => $post['satker'],
			'id_fungsi' => $post['fungsi'],
			'id_unit' => $post['unit'],
			'nip' => $post['nip'],
			'email' => $post['email'],
			'alamat' => $post['address'],
		];
		$this->db->insert('tb_penugasan', $params);
	}

	public function edit($post)
	{
		$params = [
			'nama_penugasan' => $post['fullname'],
			'id_satker' => $post['satker'],
			'id_fungsi' => $post['fungsi'],
			'id_unit' => $post['unit'],
			'nip' => $post['nip'],
			'email' => $post['email'],
			'alamat' => $post['address'],
			'updated' => date('Y-m-d H:i:s'),
		];
		$this->db->where('id_penugasan', $post['id']);
		$this->db->update('tb_penugasan', $params);
	}
	public function del($id)
	{
		$this->db->where('id_penugasan', $id);
		$this->db->delete('tb_penugasan');
	}
	public function detail_data($id = NULL)
	{
		$query = $this->db->get_where('tb_penugasan', array('id_penugasan' => $id))->row();
		return $query;
	}

}

