<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_analisis2 extends MY_Controller {

	
  function __construct()
	{
		parent::__construct();
    $this->load->helper('form');
		$this->load->model(['m_analisis2', 'analisis2/m_satuan', 'analisis2/m_fungsi', 'analisis2/m_kontrak', 'analisis2/m_nama', 'analisis2/m_unit']);
	}
  var $title = 'autocomplete';
	public function index()
	{
     //$data['title']= $this->title;
	  $userdata = $this->userdata;
    $analisis2 = $this->m_analisis2->get('tbl_detail')->result();

   /* $sum_jumlah = $this->m_analisis2->get_sum()->jumlah;
    $get_hr = $this->m_analisis2->get_hr((float)$sum_jumlah);
    $id_nilai = (int)($get_hr->id_nilai)+1;
    
    $nilai_min = $get_hr->nilai_min;
    $nilai_max = $get_hr->nilai_max;
    $hr_min = $get_hr->nilai_satuan_OB;
    $hr_max = $this->m_analisis2->get_hr2($id_nilai)->nilai_satuan_OB;  
    $hr = ((((float)$sum_jumlah-(float)$nilai_min)/((float)$nilai_max-(float)$nilai_min))*((float)$hr_max-(float)$hr_min))+(float)$hr_min;*/

    $nama = $this->m_nama->get();
    $unit = $this->m_unit->get();
    $caribulan= $this->input->post("caribulan");;
    $user_nama_lengkap= $this->input->post("user_nama_lengkap");
    $unit_hris= $this->input->post("unit_hris");

     $data = array(
      'page' => 'd_analisis2',
      'userdata' => $userdata,
      'row' => $analisis2,
      'nama' => $nama,
      'unit' => $unit,
      'caribulan' => $caribulan,
      'user_nama_lengkap' => $user_nama_lengkap,
      'unit_hris' => $unit_hris,
      'hr' => null,
      'sum_jumlah' => null,
      'viewpp' => '',
      /*'id_nilai3' => $data['id_nilai3'],
      'sum_jumlah' => $sum_jumlah,
      'id_nilai' => $id_nilai,
      'nilai_min' => $get_hr->nilai_min,
      'nilai_max' => $nilai_max,
      'get_hr' => $get_hr,
      'hr_min' => $hr_min,
      'hr_max' => $hr_max,
      'hr'  => $hr,*/
    );
		$this->template->views('v_analisis2', $data);
	}
    
    public function add()
    {
    	$d['userdata']= $this->userdata;
                $d['page']= 'd_analisis2';
        $analisis2 = new stdClass();
        $analisis2->id_analisis2 = null;
        $analisis2->biaya = null;
        $analisis2->created_at = null;

      
   
        $fungsi = $this->m_fungsi->get();
        $satuan = $this->m_satuan->get();
        $kontrak = $this->m_kontrak->get();
        

        $data = array(
        	'page' => 'add',
        	'row' => $analisis2,
          'fungsi' => $fungsi,
          'satuan' => $satuan,
          'kontrak' => $kontrak,
   
        );
    	$this->template->views('v_analisis2_add', $data);
      $this->template->views('v_analisis2_add', $d);
    }    

   public function edit($id)
   {
   		$d['userdata']= $this->userdata;
                $d['page']= 'd_analisis2';
   		$query = $this->m_analisis2->get($id);
      $satker = $this->m_satker->get();
      $fungsi = $this->m_fungsi->get();
      $unit = $this->m_unit->get();
   		if($query->num_rows() > 0) 
   		{
   			$analisis2 = $query->row();
   			$data = array(
        	'page' => 'edit',
        	'row' => $analisis2,
          'satker' => $satker,
          'fungsi' => $fungsi,
          'unit' => $unit,
        	);
        	$this->template->views('v_analisis2_edit', $data);
          $this->template->views('v_analisis2_edit', $d);
   		} else {
   			echo "<script>alert('Data tidak ditemukan');";
   			echo "window.location='".site_url('analisis2/d_analisis2')."';</script>";
   		}
   }

   public function process()
   {
    $post = $this->input->post(null, TRUE);
   	if(isset($_POST['add'])) 
   	{
      //$analisis2 = $this->m_analisis2->get_bynip($post['nip']);
      //$post['username'] = $analisis2->username;
      //$id_group_menu = '14' ;
   		$this->m_analisis2->add($post);
      //$this->m_ugmfw_user->add($post);
   	} 
    else if(isset($_POST['edit'])) 
    {
      $this->m_analisis2->edit($post);
   	}
   	if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}

		echo "<script>window.location='".site_url('analisis2/d_analisis2')."';</script>";
   }


    function get_autocomplete()
  {

    if (isset($_GET['term'])) {
     // $unit = 'Fakultas Farmasi';
      $result = $this->m_analisis2->filter_autocomplete($_GET['term']);
     
      if (count($result) > 0) {
        foreach ($result as $row) 
        $result_array[] = array(

                    'label'                 => $row->user_nama_lengkap,
                    'user_nama_lengkap'     => $row->user_nama_lengkap,
                    'fungsi'                => $row->fungsi,
                    'unit_hris'             => $row->unit_hris,
                  );
      echo json_encode($result_array);
      }
    }
  }

    public function search()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_daftarpaket';
    $data['nama'] = $this->m_nama->get();
    $data['unit'] = $this->m_unit->get();
    $data['user_nama_lengkap']=$this->input->post("user_nama_lengkap");
    $data['unit_hris']=$this->input->post("unit_hris");
    $data['fungsi']=$this->input->post("fungsi");
    
    $data['caribulan']=$this->input->post("caribulan");
    $data["row"]=$this->m_analisis2->get_keyword($data['user_nama_lengkap'], $data['caribulan'])->result();
    $data["jumlah"]=count($data["row"]);
    
  
    $ids_det = array ();
    foreach ($data["row"] as $id) {
      array_push($ids_det, $id-> id_det);
    }
    
    
     $no = 1;
     $data["viewpp"] = '';
                    foreach($data["row"] as $datar) { 
                      $sum_jumlah = $this->m_analisis2->get_sum($datar->id_det)->nilai_kontrak;
                        /*$sum_jumlah = $datar->nilai_kontrak;*/
                        if ($sum_jumlah < 50000000 ) {$hr = 0; }
                          else if 
                              ($sum_jumlah > 1000000000000) { $hr = 6342000;}
                            else {
                              $get_hr = $this->m_analisis2->get_hr((float)$sum_jumlah);
                        
                        $id_nilai = (int)($get_hr->id_nilai)+1;
                        
                        $nilai_min = $get_hr->nilai_min;
                        $nilai_max = $get_hr->nilai_max;
                        $hr_min = $get_hr->nilai_satuan_OB;
                        $hr_max = $this->m_analisis2->get_hr2($id_nilai)->nilai_satuan_OB;  
                        $hr = ((((float)$sum_jumlah-(float)$nilai_min)/((float)$nilai_max-(float)$nilai_min))*((float)$hr_max-(float)$hr_min))+(float)$hr_min;
                            }

                    
$data["viewpp"] .= ' <tr>
                      <td style="width:3%;">'.$no++.'</td>
                      <td>'.$datar->unit_hris.'</td>
                      <td >'.$datar->paket_pekerjaan.'</td>
                     
                      <td style="width:15%;">Rp.  '. number_format((float)$datar->pagu_anggaran,2,',','.') .'</td>
                      <td style="width:15%;"> Rp. '.  number_format((float)$hr,2,',','.') .'</td>
                      <td style="width:20%;" class="text-center">'.$datar->tgl_akhir_tender.'</td>
                      <td style="width:15%;" class="text-center">Telah dibayar '. $datar->tgl_selesai.' </td>
                    </tr>';
                    
                    }

  $this->template->views('v_analisis2', $data); 
   /*print_r($data);*/ 
  }

  public function search2()
   {
    $data['userdata']= $this->userdata;
                $data['page']= 'd_analisis2';
    $data['cariberdasarkan2']=$this->input->post("cariberdasarkan2");
    $data['yangdicari2']=$this->input->post("yangdicari2");
    $data["row"]=$this->m_analisis2->get_keyword2($data['cariberdasarkan2'], $data['yangdicari2'])->result();
    $data["jumlah"]=count($data["row"]);
    $this->template->views('v_analisis2', $data);    
  }
}