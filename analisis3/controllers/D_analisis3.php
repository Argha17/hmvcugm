<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_analisis3 extends MY_Controller {

	
  function __construct()
	{
		parent::__construct();
    $this->load->helper('form');
		$this->load->model(['m_analisis3', 'analisis3/m_satuan', 'analisis3/m_fungsi', 'analisis3/m_kontrak', 'analisis3/m_nama', 'analisis3/m_unit']);
	}
  var $title = 'autocomplete';
	public function index()
	{
     //$data['title']= $this->title;
	  $userdata = $this->userdata;
    $analisis3 = $this->m_analisis3->get('tbl_analisis3')->result();
    $nama = $this->m_nama->get();
    $unit = $this->m_unit->get();
     $data = array(
      'page' => 'd_analisis3',
      'userdata' => $userdata,
      'row' => $analisis3,
      'nama' => $nama,
      'unit' => $unit,
    );
		$this->template->views('v_analisis3', $data);
	}
    
    public function add()
    {
    	$d['userdata']= $this->userdata;
                $d['page']= 'd_analisis3';
        $analisis3 = new stdClass();
        $analisis3->id_analisis3 = null;
        $analisis3->biaya = null;
        $analisis3->created_at = null;

      
   
        $fungsi = $this->m_fungsi->get();
        $satuan = $this->m_satuan->get();
        $kontrak = $this->m_kontrak->get();
        

        $data = array(
        	'page' => 'add',
        	'row' => $analisis3,
          'fungsi' => $fungsi,
          'satuan' => $satuan,
          'kontrak' => $kontrak,
   
        );
    	$this->template->views('v_analisis3_add', $data);
      $this->template->views('v_analisis3_add', $d);
    }    

   public function edit($id)
   {
   		$d['userdata']= $this->userdata;
                $d['page']= 'd_analisis3';
   		$query = $this->m_analisis3->get($id);
      $satker = $this->m_satker->get();
      $fungsi = $this->m_fungsi->get();
      $unit = $this->m_unit->get();
   		if($query->num_rows() > 0) 
   		{
   			$analisis3 = $query->row();
   			$data = array(
        	'page' => 'edit',
        	'row' => $analisis3,
          'satker' => $satker,
          'fungsi' => $fungsi,
          'unit' => $unit,
        	);
        	$this->template->views('v_analisis3_edit', $data);
          $this->template->views('v_analisis3_edit', $d);
   		} else {
   			echo "<script>alert('Data tidak ditemukan');";
   			echo "window.location='".site_url('analisis3/d_analisis3')."';</script>";
   		}
   }

   public function process()
   {
    $post = $this->input->post(null, TRUE);
   	if(isset($_POST['add'])) 
   	{
      //$analisis3 = $this->m_analisis3->get_bynip($post['nip']);
      //$post['username'] = $analisis3->username;
      //$id_group_menu = '14' ;
   		$this->m_analisis3->add($post);
      //$this->m_ugmfw_user->add($post);
   	} 
    else if(isset($_POST['edit'])) 
    {
      $this->m_analisis3->edit($post);
   	}
   	if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}

		echo "<script>window.location='".site_url('analisis3/d_analisis3')."';</script>";
   }

   public function search()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_analisis3';
    $data['cariberdasarkan']=$this->input->post("cariberdasarkan");
    $data['yangdicari']=$this->input->post("yangdicari");
    $data["row"]=$this->m_analisis3->get_keyword($data['cariberdasarkan'], $data['yangdicari'])->result();
    $data["jumlah"]=count($data["row"]);
    $this->template->views('v_analisis3', $data);    
  }

  public function search2()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_analisis3';
    $data['cariberdasarkan2']=$this->input->post("cariberdasarkan2");
    $data['yangdicari2']=$this->input->post("yangdicari2");
    $data["row"]=$this->m_analisis3->get_keyword2($data['cariberdasarkan2'], $data['yangdicari2'])->result();
    $data["jumlah"]=count($data["row"]);
    $this->template->views('v_analisis3', $data);    
  }
}