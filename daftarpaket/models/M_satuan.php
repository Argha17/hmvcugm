<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_satuan extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('tbl_satuan.*');
		$this->db->from('tbl_satuan');
		if($id != null)
		{
			$this->db->where(['id_satuan'], $id);
			
		}
		$query = $this->db->get();
		return $query;
	} 
}