<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_fungsi extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('tbl_fungsi.*');
		$this->db->from('tbl_fungsi');
		if($id != null)
		{
			$this->db->where(['id_fungsi'], $id);
			
		}
		$query = $this->db->get();
		return $query;
	} 
}