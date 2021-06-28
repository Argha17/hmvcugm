<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_nama extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('ugmfw_user.*');
		$this->db->from('ugmfw_user');
		if($id != null)
		{
			$this->db->where(['user_id'], $id);
			
		}
		$query = $this->db->get();
		return $query;
	} 
}