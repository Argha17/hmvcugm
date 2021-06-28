<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_subunit extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->from('tbl_unit');
		if($id != null)
		{
			$this->db->where('id_unit', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}