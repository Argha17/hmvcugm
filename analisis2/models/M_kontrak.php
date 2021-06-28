<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_kontrak extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('tbl_kontrak.*');
		$this->db->from('tbl_kontrak');
		if($id != null)
		{
			$this->db->where(['id_kontrak'], $id);
			
		}
		$query = $this->db->get();
		return $query;
	} 
}