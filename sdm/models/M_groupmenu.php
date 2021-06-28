<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_groupmenu extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->from('ugmfw_group_menu');
		if($id != null)
		{
			$this->db->where('group_menu_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}