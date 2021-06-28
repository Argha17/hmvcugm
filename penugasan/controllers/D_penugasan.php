<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_penugasan extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['m_penugasan', 'satker/m_satker', 'fungsi/m_fungsi', 'unit2/m_unit']);
	}

	public function index()
	{
		 $data['userdata']= $this->userdata;
                $data['page']= 'd_penugasan';
		$data['row'] = $this->m_penugasan->get();
		$this->template->views('v_penugasan', $data);
	}
    
    public function add()
    {
    	$d['userdata']= $this->userdata;
                $d['page']= 'd_penugasan';
        $penugasan = new stdClass();
        $penugasan->user_username = null;
        $penugasan->group_menu_nama = null;
        //$penugasan->email = null;
        //$penugasan->alamat = null;

        //$satker = $this->m_satker->get();
        //$fungsi = $this->m_fungsi->get();
       // $unit = $this->m_unit->get();

        $data = array(
        	'page' => 'add',
        	'row' => $penugasan,
          //'satker' => $satker,
          //'fungsi' => $fungsi,
          //'unit' => $unit,
        );
    	$this->template->views('v_penugasan_add', $data);
      $this->template->views('v_penugasan_add', $d);
    }    

   public function edit($id)
   {
   		$d['userdata']= $this->userdata;
                $d['page']= 'd_penugasan';
   		$query = $this->m_penugasan->get($id);
      $satker = $this->m_satker->get();
      $fungsi = $this->m_fungsi->get();
      $unit = $this->m_unit->get();
   		if($query->num_rows() > 0) 
   		{
   			$penugasan = $query->row();
   			$data = array(
        	'page' => 'edit',
        	'row' => $penugasan,
          'satker' => $satker,
          'fungsi' => $fungsi,
          'unit' => $unit,
        	);
        	$this->template->views('v_penugasan_edit', $data);
          $this->template->views('v_penugasan_edit', $d);
   		} else {
   			echo "<script>alert('Data tidak ditemukan');";
   			echo "window.location='".site_url('penugasan/d_penugasan')."';</script>";
   		}
   }

   public function process()
   {
   	$post = $this->input->post(null, TRUE);
   	if(isset($_POST['add'])) 
   	{
   		$this->m_penugasan->add($post);
   	} else if(isset($_POST['edit'])) {
   		$this->m_penugasan->edit($post);
   	}
   	if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}

		echo "<script>window.location='".site_url('penugasan/d_penugasan')."';</script>";
   }

	public function del($id)
	{
		$this->m_penugasan->del($id);
		if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil dihapus');</script>";
		}

		echo "<script>window.location='".site_url('penugasan/d_penugasan')."';</script>";
	}

  public function detail($id)
  {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_penugasan';
    $detail = $this->m_penugasan->detail_data($id);
    $data['detail'] = $detail;
    $this->template->views('v_penugasan_detail', $data);
  }
}