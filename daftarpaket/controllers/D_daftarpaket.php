<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_daftarpaket extends MY_Controller {

	
  function __construct()
	{
		parent::__construct();
    $this->load->helper('form');
		$this->load->model(['m_daftarpaket', 'daftarpaket/m_unit', 'daftarpaket/m_satuan', 'daftarpaket/m_fungsi', 'daftarpaket/m_kontrak']);
	}
  var $title = 'autocomplete';
	public function index()
	{
     //$data['title']= $this->title;
    /*  $data['row'] = $this->m_daftarpaket->get('tbl_detail')->result();*/
		 
    $userdata = $this->userdata;
    $daftarpaket = $this->m_daftarpaket->get('tbl_detail')->result();
    $unit = $this->m_unit->get();
    $fungsi = $this->m_fungsi->get();
    $caribulan = null;
    $carifungsi = null;
    $cariunit = null;


     $data = array(
      'page' => 'd_daftarpaket',
      'userdata' => $userdata,
      'row' => $daftarpaket,
      'unit' => $unit,
      'fungsi' => $fungsi,
      'caribulan' => $caribulan,
      'carifungsi' => $carifungsi,
      'cariunit' => $cariunit,
    );
		$this->template->views('v_daftarpaket', $data);
	}
    
    public function add()
    {
    	$d['userdata']= $this->userdata;
                $d['page']= 'd_daftarpaket';
        $daftarpaket = new stdClass();
        $daftarpaket->id_daftarpaket = null;
        $daftarpaket->biaya = null;
        $daftarpaket->created_at = null;
       
        $fungsi = $this->m_fungsi->get();
        $satuan = $this->m_satuan->get();
        $kontrak = $this->m_kontrak->get();
       

        $data = array(
        	'page' => 'add',
        	'row' => $daftarpaket,
          'fungsi' => $fungsi,
          'satuan' => $satuan,
          'kontrak' => $kontrak,
          
          
        );
    	$this->template->views('v_daftarpaket_add', $data);
      $this->template->views('v_daftarpaket_add', $d);
    }    

   public function edit($id)
   {
   		$d['userdata']= $this->userdata;
                $d['page']= 'd_daftarpaket';
   		$query = $this->m_daftarpaket->get($id);
      $satker = $this->m_satker->get();
      $fungsi = $this->m_fungsi->get();
      $unit = $this->m_unit->get();
   		if($query->num_rows() > 0) 
   		{
   			$daftarpaket = $query->row();
   			$data = array(
        	'page' => 'edit',
        	'row' => $daftarpaket,
          'satker' => $satker,
          'fungsi' => $fungsi,
          'unit' => $unit,
        	);
        	$this->template->views('v_daftarpaket_edit', $data);
          $this->template->views('v_daftarpaket_edit', $d);
   		} else {
   			echo "<script>alert('Data tidak ditemukan');";
   			echo "window.location='".site_url('daftarpaket/d_daftarpaket')."';</script>";
   		}
   }

   public function process()
   {
    $post = $this->input->post(null, TRUE);
   	if(isset($_POST['add'])) 
   	{
      //$daftarpaket = $this->m_daftarpaket->get_bynip($post['nip']);
      //$post['username'] = $daftarpaket->username;
      //$id_group_menu = '14' ;
   		$this->m_daftarpaket->add($post);
      //$this->m_ugmfw_user->add($post);
   	} 
    else if(isset($_POST['edit'])) 
    {
      $this->m_daftarpaket->edit($post);
   	}
   	if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}

		echo "<script>window.location='".site_url('daftarpaket/d_daftarpaket')."';</script>";
   }

   public function search()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_daftarpaket';
    $data['carifungsi']=$this->input->post("carifungsi");
    $data['unit'] = $this->m_unit->get();
    $data['cariunit']=$this->input->post("cariunit");
    $data['caribulan']=$this->input->post("caribulan");
   
   $data["row"]=$this->m_daftarpaket->get_keyword($data['carifungsi'], $data['cariunit'],  $data['caribulan'])->result();
    $data["jumlah"]=count($data["row"]);
  $this->template->views('v_daftarpaket', $data); 
  print_r($data["row"]);   
  }

  public function search2()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_daftarpaket';
    $data['cariberdasarkan2']=$this->input->post("cariberdasarkan2");
    $data['yangdicari2']=$this->input->post("yangdicari2");
    $data["row"]=$this->m_daftarpaket->get_keyword2($data['cariberdasarkan2'], $data['yangdicari2'])->result();
    $data["jumlah"]=count($data["row"]);
    $this->template->views('v_daftarpaket', $data);    
  }
}