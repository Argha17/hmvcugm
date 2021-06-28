<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_pimpinan extends MY_Controller {

	
  function __construct()
	{
		parent::__construct();
    $this->load->helper('form');
		$this->load->model(['m_pimpinan']);
	}
  var $title = 'autocomplete';
	public function index()
	{
     //$data['title']= $this->title;
		 $data['userdata']= $this->userdata;
                $data['page']= 'd_pimpinan';
		$data['row'] = $this->m_pimpinan->get('ugmfw_user')->result();
    
		$this->template->views('v_pimpinan', $data);
	}
    
    public function add()
    {
    	$data['userdata']= $this->userdata;
                $data['page']= 'add';
        

      $data['pimpinan'] = $this->nama_staff = null;
      $data['pimpinan'] = $this->nomor = null;
      $data['pimpinan'] = $this->unit_kerja_DPK = null;
        
    	$this->template->views('v_pimpinan_add2', $data);
      
    }    

   public function edit($id)
   {
   		$data['userdata']= $this->userdata;
                $data['page']= 'edit';
   		$query = $this->m_pimpinan->get($id);
      
      
   		if($query->num_rows() > 0) 
   		{
   			$data['pimpinan'] = $query->row();
   			
        	$this->template->views('v_pimpinan_edit', $data);
        
   		} else {
   			echo "<script>alert('Data tidak ditemukan');";
   			echo "window.location='".site_url('pimpinan/d_pimpinan')."';</script>";
   		}
   }

   public function process()
   {
    $post = $this->input->post(null, TRUE);
   	if(isset($_POST['add'])) 
   	{
      //$pimpinan = $this->m_pimpinan->get_bynip($post['nip']);
      //$post['username'] = $pimpinan->username;
      //$id_group_menu = '14' ;
   		$this->m_pimpinan->add($post);
      //$this->m_ugmfw_user->add($post);
   	} else if(isset($_POST['edit'])) {
      $this->m_pimpinan->edit($post);
   	}
   	if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}

		echo "<script>window.location='".site_url('pimpinan/d_pimpinan')."';</script>";
   }

	public function del($id)
	{
		$this->m_pimpinan->del($id);
		if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil dihapus');</script>";
		}

		echo "<script>window.location='".site_url('pimpinan/d_pimpinan')."';</script>";
	}

  public function soft_delete($id)
  {
        //$del = $this->m_ugmfw_user->del($id);
        $softdelete = $this->m_pimpinan->soft_delete($id);
        if($this->db->affected_rows() > 0)
    {
      echo "<script>alert('Data berhasil dihapus');</script>";
    }

    echo "<script>window.location='".site_url('pimpinan/d_pimpinan')."';</script>";
      }

  public function detail($id)
  {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_pimpinan';
    $detail = $this->m_pimpinan->detail_data($id);
    $data['detail'] = $detail;
    $this->template->views('v_pimpinan_detail', $data);
  }

  public function search(){
    $data['userdata']= $this->userdata;
                $data['page']= 'd_pimpinan';
    //$data['cariberdasarkan']=$this->input->post("cariberdasarkan");
    $data['yangdicari']=$this->input->post("yangdicari");

    $data["row"]=$this->m_pimpinan->get_keyword($data['yangdicari'])->result();
    $data["jumlah"]=count($data["row"]);
    $this->template->views('v_pimpinan', $data);

    //$keyword = $this->input->post('keyword'); //--> PERCOBAAN 1
    //$pimpinan = $this->m_pimpinan->get_keyword($keyword);
    //$data['pimpinan'] = $pimpinan;
    //$this->template->views('v_pimpinan', $data);

    //$nama=$this->input->get('nama'); /--> PERCOBAAN 2
    //$fungsi=$this->input->get('fungsi');
    //$data['hasil'] = $this->m_pimpinan->get_keyword($nama,$fungsi)->result_array();
    //$this->template->views('v_pimpinan', $data);// ini view menampilkan hasil pencarian
    
  }
   
  function get_autocomplete()
  {
    if (isset($_GET['term'])) {
     // $unit = 'Fakultas Farmasi';
      $result = $this->m_pimpinan->search_namapimpinan($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(
//--[AUTOCOMPLETE] coding control autocomplete Pimpinan dari 3 table ugmfw,unit,jabatan--//
                    /*'label'                 => $row->user_nama_lengkap  ." | ".$row->jabatan_hris ." | ".$row->unit_hris,
                    'user_nama_lengkap'     => $row->user_nama_lengkap,
                    'user_nip'              => $row->user_nip,
                    'eselon'                => $row->eselon,
                    'user_username'         => $row->user_username,
                    'user_email'            => $row->user_email, 
                    'jabatan_hris'          => $row->jabatan_hris,
                    'unit_hris'             => $row->unit_hris,*/

 //--[AUTOCOMPLETE] coding control autocomplete pelaksana dari tabel staff masuk ke tabel ugmfw--//
                    'label'                 => $row->nama_staff  ."  |  ".$row->unit_kerja_DPK,
                    'nama_staff'            => $row->nama_staff,
                    'unit_kerja_DPK'        => $row->unit_kerja_DPK,
                    'nomor'                 => $row->nomor,
                  );
      echo json_encode($result_array);
      }
    }
  }
  function get_autocomplete_jabatan()
  {
    if (isset($_GET['term'])) {
      $result = $this->m_pimpinan->search_jabatan($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(
                    'label'               => $row->jabatan,
                    'nip'                 => $row->nip, 
                    'nama_pimpinan'       => $row->nama_pimpinan,
                    'unit'                => $row->unit,
                  );
      echo json_encode($result_array);
      }
    }
  }
  function get_autocomplete_unit()
  {
    if (isset($_GET['term'])) {
      $result = $this->m_pimpinan->search_unit($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(
                    'label'                => $row->unit,
                    'nip'                  => $row->nip, 
                    'nama_pimpinan'        => $row->nama_pimpinan,
                    'jabatan'              => $row->jabatan,
                  );
      echo json_encode($result_array);
      }
    }
  }
  public function search_autocomplete(){

        
        $title=$this->input->get('title');
        $data['data']=$this->m_pimpinan->searchall($title);
 
        $this->load->view('v_pimpinan_add3',$data);
    }
  public function cari()//--> berfungsi untuk mendapatkan data mahasiswa yang akan dicari dari model_mahasiswa yang nantinya akan dikirim untuk mengisi form otomatis
    {
      $data['userdata']= $this->userdata;
                $data['page']= 'd_pimpinan';
        //$id_pimpinan=$_GET['id_pimpinan'];
        $cari =$this->m_pimpinan->cari();
        echo json_encode($cari);
        $this->load->view('v_pimpinan_add4',$data);
       // $this->load->view('v_pimpinan_add4',$id_pimpinan);
    } 
}