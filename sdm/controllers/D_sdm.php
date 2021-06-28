<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_sdm extends MY_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->model(['m_sdm', 'm_groupmenu']);
  }
  var $title = 'autocomplete';
  public function index()
  {
     //$data['title']= $this->title;
     $data['userdata']= $this->userdata;
                $data['page']= 'd_sdm';
    $data['row'] = $this->m_sdm->get('ugmfw_user')->result();
    
    $this->template->views('v_sdm', $data);
  }
    
    public function add()
    {
      $d['userdata']= $this->userdata;
                $d['page']= 'd_sdm';
        $sdm= new stdClass();
        $sdm->fungsi_nama = null;
        $sdm->user_username = null;
        $sdm->user_email = null;
        $sdm->user_nama_lengkap = null;
        $sdm->jabatan_hris = null;
        $sdm->user_nip = null;
        $sdm->unit_hris = null;
        $groupmenu = $this->m_groupmenu->get();
        
        $data = array(
          'page'       => 'add',
          'row'        => $sdm,
          'groupmenu'  => $groupmenu,
          

        );
      $this->template->views('v_sdm_add', $data);
      $this->template->views('v_sdm_add', $d);
    }    

   public function edit($id)
   {
   		$d['userdata']= $this->userdata;
                $d['page']= 'd_sdm';
   		$query = $this->m_sdm->get($id);
      
   		if($query->num_rows() > 0) 
   		{
   			$sdm = $query->row();
   			$data = array(
        	'page' => 'edit',
        	'row' => $sdm,
          
        	);
        	$this->template->views('v_sdm_edit', $data);
          $this->template->views('v_sdm_edit', $d);
   		} else {
   			echo "<script>alert('Data tidak ditemukan');";
   			echo "window.location='".site_url('sdm/d_sdm')."';</script>";
   		}
   }

   public function process()
   {
    $post = $this->input->post(null, TRUE);
    if(isset($_POST['add'])) 
    {
      //$pimpinan = $this->m_sdm->get_bynip($post['nip']);
      //$post['username'] = $pimpinan->username;
      //$id_group_menu = '14' ;
      $this->m_sdm->add($post);
      //$this->m_ugmfw_user->add($post);
    } else if(isset($_POST['edit'])) {
      $this->m_sdm->edit($post);
    }
    if($this->db->affected_rows() > 0)
    {
      echo "<script>alert('Data berhasil disimpan');</script>";
    }

    echo "<script>window.location='".site_url('sdm/d_sdm')."';</script>";
    }

  public function del($id)
  {
    $this->m_sdm->del($id);
    if($this->db->affected_rows() > 0)
    {
      echo "<script>alert('Data berhasil dihapus');</script>";
    }

    echo "<script>window.location='".site_url('sdm/d_sdm')."';</script>";
  }

  public function soft_delete($id)
  {
        //$del = $this->m_ugmfw_user->del($id);
        $softdelete = $this->m_sdm->soft_delete($id);
        if($this->db->affected_rows() > 0)
    {
      echo "<script>alert('Data berhasil dihapus');</script>";
    }

    echo "<script>window.location='".site_url('sdm/d_sdm')."';</script>";
      }

  public function detail($id)
  {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_sdm';
    $detail = $this->m_sdm->detail_data($id);
    $data['detail'] = $detail;
    $this->template->views('v_sdm_detail', $data);
  }

  public function search()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_daftarpaket';
    $data['carifungsi']=$this->input->post("carifungsi");
    $data['carinama']=$this->input->post("carinama");
    $data['caritahun']=$this->input->post("caritahun");
   
   $data["row"]=$this->m_sdm->get_keyword($data['carifungsi'], $data['carinama'],  $data['caritahun'])->result();
    $data["jumlah"]=count($data["row"]);
  $this->template->views('v_sdm', $data); 
  /*print_r($data["row"]);*/   
  

    //$keyword = $this->input->post('keyword');
    //$sdm = $this->m_sdm->get_keyword($keyword);
    //$data['sdm'] = $sdm;
    //$this->template->views('v_sdm', $data);

    //$nama=$this->input->get('nama');
    //$fungsi=$this->input->get('fungsi');
    //$data['hasil'] = $this->m_sdm->get_keyword($nama,$fungsi)->result_array();
    //$this->template->views('v_sdm', $data);// ini view menampilkan hasil pencarian
    
  }
  function get_autocomplete()
  {
    if (isset($_GET['term'])) {
     /* $satker = 'Fakultas Teknik';*/
     /* $unit = 35;*/
      //$user_is_aktif = '0';
      if ($_GET['fungsi_tugas'] == 9) {$kelas_jabatan = 'b.kelas_jabatan IN(10,11,12,13)' ; $kelas_jabatan_null = ''; } 
        else if 
          ($_GET['fungsi_tugas'] == 10) {$kelas_jabatan = 'b.kelas_jabatan IN(10,11)' ; $kelas_jabatan_null = 'or b.kelas_jabatan is null';}    
        else if 
          ($_GET['fungsi_tugas'] == 16) {$kelas_jabatan = 'b.kelas_jabatan is null' ; $kelas_jabatan_null = 'or b.kelas_jabatan is null';}
        
      $result = $this->m_sdm->search_namapimpinan($_GET['term'], $_GET['fungsi_tugas'], $kelas_jabatan, $kelas_jabatan_null);
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(

      //--[AUTOCOMPLETE] coding control autocomplete pimpinan 1 tabel ugmfw--//
                 /*   'label'                 => $row->user_nama_lengkap  ." | ".$row->user_gelar ." | ".$row->user_unit,
                    'user_nama_lengkap'     => $row->user_nama_lengkap,
                    'user_nip'              => $row->user_nip,
                    'user_gelar'            => $row->user_gelar,
                    'user_username'         => $row->user_username,
                    'user_email'            => $row->user_email, 
                    'user_unit'             => $row->user_unit,
                    'user_satker'           => $row->user_satker,*/

      //--[AUTOCOMPLETE] coding control autocomplete pimpinan 3 tabel dr ugmfw,jabatan, dan unit--//
                    'label'                 => $row->user_nama_lengkap  ." | ".$row->jabatan_hris ." | ".$row->unit_hris,
                    'user_nama_lengkap'     => $row->user_nama_lengkap,
                    'user_nip'              => $row->user_nip,
                    'kelas_jabatan'         => $row->kelas_jabatan,
                    'user_username'         => $row->user_username,
                    'user_email'            => $row->user_email, 
                    'jabatan_hris'          => $row->jabatan_hris,
                    'unit_hris'             => $row->unit_hris,
                  );
      echo json_encode($result_array);
      }
    }
  }
  function get_autocomplete_satuankerja()
  {
    if (isset($_GET['term'])) {
      $result = $this->m_sdm->get_satuankerja($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(
                    'label'         => $row->satuankerja,
                    'nip_'          => $row->nip_,
                    'nama_petugas'   => $row->nama_petugas,
                    'unit'          => $row->unit,
                    'jabatan'       => $row->jabatan,
                  );
      echo json_encode($result_array);
      }
    }
  }
  function get_autocomplete_jabatan()
  {
    if (isset($_GET['term'])) {
      $result = $this->m_sdm->get_jabatan($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(
                    'label'         => $row->jabatan,
                    'nip_'          => $row->nip_,
                    'nama_petugas'   => $row->nama_petugas,
                    'unit'          => $row->unit,
                    'satuankerja'       => $row->satuankerja,
                  );
      echo json_encode($result_array);
      }
    }
  }
  
  public function search_autocomplete()
  {
        $title=$this->input->get('title');
        $data['data']=$this->m_sdm->search_penugasan($title);
 
        $this->load->view('v_sdm_search',$data);
    }
}


