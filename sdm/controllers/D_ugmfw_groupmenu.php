<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_ugmfw_groupmenu extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_groupmenu');
	}

	public function index()
	{
		 $data['userdata']= $this->userdata;
                $data['page']= 'D_ugmfw_groupmenu';
		$data['row'] = $this->m_satker->get();
		$this->template->views('v_groupmenu', $data);
	}
}