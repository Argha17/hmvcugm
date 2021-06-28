<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_unit extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('ref_unit_hris.*');
		$this->db->from('ref_unit_hris');
		if($id != null)
		{
			$this->db->where(['id_unit_hris'], $id);
			
		}
		$query = $this->db->get();
		return $query;
	} 
}