<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_register extends CI_Model {
	public $tbl_user;

	public function __construct() {
		parent::__construct();
		$this->tbl_user='tbl_user';		
	}

	public function cek_user($data){
		$query = $this->db->get_where($this->tbl_user,$data);
		return $query;
	}
	public function getUser(){
		$query = $this->db->get($this->tbl_user);
		return $query->result();
	}


}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */