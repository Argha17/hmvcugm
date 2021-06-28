<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_pimpinan extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('ugmfw_user.*, ref_jabatan_hris.eselon, ref_jabatan_hris.jabatan_hris, ref_unit_hris.unit_hris');
		$this->db->from('ugmfw_user');
		$this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris','left');
		if($id != null)
		{
			//$this->db->where(['user_id'], $id);
			$this->db->where('group_menu_id', 14);
			//$this->db->where('user_is_deleted', 1);
			//$this->db->where('user_is_aktif', 1);
		}
		$query = $this->db->get();
		return $query;
	} 

	public function get_bynip($nip = null)
	{
		
		$this->db->from('ugmfw_user');
		//$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_pimpinan.id_jabatan');
		//$this->db->join('ugmfw_user', 'ugmfw_user.user_id = tbl_pimpinan.user_id');
		//$this->db->join('tbl_unit', 'tbl_unit.id_unit = tbl_pimpinan.id_unit');
		if($nip != null)
		{
			$this->db->where(['user_nip'], $nip);
			$this->db->where('user_is_deleted', 1);
		}

		$query = $this->db->get()->row();
		return $query;
	}
	

	public function add($post)
	{
	$sql="
	INSERT INTO  ugmfw_user  ( jabatan_non_hris, user_nama_lengkap ,  user_username ,  user_nip ,  user_nohp ,  user_is_deleted ,  group_menu_id , created_by, created_time , id_unit_hris, user_unit_id) 

	SELECT '".$post['jabatan_non_hris']."','".$post['nama_staff']."', '".$post['nama_staff']."', '".$post['nomor']."', '2z', 1, 14, 380, '".date('Y-m-d H:i:s')."', b.id_unit_hris, b.id_satker_sipinter
	FROM v_staffonly_p2l a
	LEFT join ref_unit_hris b ON b.unit_hris = a.unit_kerja_DPK
	WHERE a.nomor = '".$post['nomor']."'

	";

	$result = $this->db->query($sql); 
  	return $result;

	//--[ADD] coding model autocomplete pimpinan menambahkan dari tabel staff masuk ke tabel ugmfw--//
	/*$params = [
      
      'user_nama_lengkap' 	=> $post['nama_staff'],
      'user_username' 		=> $post['nama_staff'],
      'user_nip' 			=> $post['nomor'],
      'user_satker' 		=> $post['unit_kerja'],
      'user_nohp' 			=> '2z',
      'user_is_deleted' 	=> 1,
      //'user_is_aktif'	 	=> 1,
      'group_menu_id' 		=> 14,
      'created_time'		=> date('Y-m-d H:i:s')
      
    ];
    	$this->db->insert('ugmfw_user', $params);*/


    //--[ADD] coding model autocomplete pimpinan menambahkan dari 3 tabel --//
	   /*$this->db->select('ugmfw_user.*, ref_jabatan_hris.eselon, ref_jabatan_hris.jabatan_hris, ref_unit_hris.unit_hris');
	   $this->db->from('ugmfw_user');
	   $this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris');
	   $this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris');
	   $this->db->join('ugmfw_group_menu', 'ugmfw_group_menu.group_menu_id = ugmfw_user.group_menu_id'); 
	   

	   $params = 
	[
		'created_time'			=> date('Y-m-d H:i:s')
	];

	   $this->db->set('group_menu_id', 14);
	   //$this->db->set('user_is_deleted', 1);
	   //$this->db->set('user_is_aktif', 1);
       $this->db->where('user_nip', $post['user_nip']);
       return $this->db->update('ugmfw_user', $params);
*/

	}

	public function edit($post)
	{
		if ($post['user_is_deleted'] == 1) {
			$status = 0;
		} else {
			$status = 1;
		}
		$params = [
			'created_time' => date('Y-m-d H:i:s'),
			'user_is_deleted' => $status,
		];
		$this->db->where('user_id', $post['user_id']);
		//$this->db->where('id_pimpinan', $post['id']);
		return $this->db->update('ugmfw_user', $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('ugmfw_user');
		
	}
	function soft_delete($id)
	{
	//--[SOFTDELETE] coding model SOFTDELETE pimpinan di tabel ugmfw dg UPDATE--//
	/*$params = 
		[
		'updated_time'			=> date('Y-m-d H:i:s')
		];
        $this->db->set('group_menu_id', null);
        $this->db->set('user_is_deleted', 0);
        //$this->db->set('user_is_aktif', 0);
        $this->db->where('user_id', $id);
        return $this->db->update('ugmfw_user', $params);*/

        //--[DELETE] coding model DELETE pimpinan di tabel ugmfw dg DELETE--//
        $this->db->where('user_id', $id);
        return $this->db->delete('ugmfw_user');
    }
	public function detail_data($id = NULL)
	{
		$this->db->select('ugmfw_user.*, ref_jabatan_hris.jabatan_hris, ref_unit_hris.unit_hris');
	    $this->db->from('ugmfw_user');
	    $this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris', 'left');
	    $this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris', 'left');
		$this->db->where(array('user_id' => $id));
		$query = $this->db->get()->row();
		return $query;
	}
	public function get_keyword($yangdicari)
	{
		$this->db->select('ugmfw_user.*, ref_jabatan_hris.eselon, ref_jabatan_hris.jabatan_hris, ref_unit_hris.unit_hris');
		$this->db->from('ugmfw_user');
		$this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris');
		//switch($berdasarkan)
		//{
			//case"";
			$this->db->like('user_nama_lengkap',$yangdicari);
			$this->db->or_like('jabatan_hris',$yangdicari);
			$this->db->or_like('unit_hris',$yangdicari);
			//break;
			//default:
			//$this->db->like($berdasarkan,$yangdicari);
		//}
		
		return $this->db->get();
	}


		//$this->db->select('*');
		//$this->db->from('tb_pimpinan');
		//$this->db->like('nama', $keyword);
		//$this->db->or_like('created', $keyword);
		//$query = $this->db->get()->row();
		//return $this->db->get()->result();
	//}

		//$this->db->from('tb_pimpinan');
		//$this->db->join('tbl_satker', 'tbl_satker.id_satker = tb_pimpinan.id_satker');
		//$this->db->join('tb_fungsi', 'tb_fungsi.id_fungsi = tb_pimpinan.id_fungsi');
		//$this->db->join('tbl_unit', 'tbl_unit.id_unit = tb_pimpinan.id_unit');
		//$query = $this->db->get()->row();
		//return $query;
    	//$this->db->where("nama",$nama);
    	//$this->db->where("nama_fungsi",$fungsi);
   		//return $this->db->get("tb_pimpinan");
   	//}
   	public function getUsers($postData){
     
     $this->db->from('tbl_pimpinan');
     $this->db->join('tbl_satker', 'tbl_satker.id_satker = tb_pimpinan.id_satker');
     $this->db->join('tb_fungsi', 'tb_fungsi.id_fungsi = tb_pimpinan.id_fungsi');
	 $this->db->join('tbl_unit', 'tbl_unit.id_unit = tb_pimpinan.id_unit');
	 $this->db->where(array('id_pimpinan' => $id));
     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("user_username like '%".$postData['search']."%' ");

       $records = $this->db->get()->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->user_id,"label"=>$row->user_username);
       }

     }

     return $response;
  }
  public function search_namapimpinan($title)
  {
  	//$this->db->from('tbl_pimpinan');
  	//$this->db->concat("nama_pimpinan",'',"jabatan",'',"unit") AS nama_pimpinan;
  	//$sql="select a.* from tbl_pimpinan a where a.fungsi='Pimpinan Unit' and (a.nama_pimpinan like '%$title%' or a.jabatan like '%$title%') and  a.unit like '%$unit%' ";

//--[AUTOCOMPLETE] coding model autocomplete pimpinan 1 tabel ugmfw--//
  	/*$sql="select a.* from ugmfw_user a where a.user_gelar IN ('IIA','IIB') and (a.user_nama_lengkap like '%$title%' or a.user_gelar like '%$title%' or  a.user_satker like '%$title%') and a.user_is_deleted = 0";*/

//--[AUTOCOMPLETE] coding model autocomplete pimpinan 3 tabel dr ugmfw,jabatan, dan unit--//
  /*	$sql="select 
  			a.*,
  			b.eselon,
  			b.jabatan_hris,
  			c.unit_hris 
  		from 
  			ugmfw_user a 
  		left join 
  			ref_jabatan_hris b on a.id_jabatan_hris = b.id_jabatan_hris 
  		left join 
  			ref_unit_hris c on a.id_unit_hris = c.id_unit_hris 
  		where 
  			b.eselon IN ('Ia','Ib','IIa','IIb') 
  			and (a.user_nama_lengkap like '%$title%' or b.jabatan_hris like '%$title%' or c.unit_hris like '%$title%')
  			and a.group_menu_id is null";*/

  	//--[AUTOCOMPLETE] coding model autocomplete pimpinan dari data tabel staff--//
  	$sql="
       	select 
      		a.* 
    	from 
      		v_staffonly_p2l a 
    	where 
       		a.nama_staff like '%$title%' or a.unit_kerja_DPK like '%$title%'
       		and a.nomor not in
       		(
       		select
       			user_nip
       		from
       			ugmfw_user b
       		)
      ";


     /* $sql="
       	SELECT a.* FROM v_staffonly_p2l a LEFT JOIN ugmfw_user b ON a.nomor = b.user_nip WHERE a.nama_staff like '%$title%' or a.unit_kerja_DPK like '%$title%' and b.user_nip is null
      ";*/


  	/*$this->db->where('fungsi',"Pimpinan Unit");
  	$this->db->like('nama_pimpinan', $title, 'both');
  	//$this->db->order_by('nama_pimpinan', 'ASC');
  	$this->db->or_like('jabatan', $title, 'both');
  	$this->db->or_like('unit', $title, 'both');
  	$this->db->order_by('nama_pimpinan ASC', 'jabatan ASC', 'unit ASC');*/

  	$this->db->limit(10);
  	$result = $this->db->query($sql)->result(); 
  	return $result;
  }
  public function search_jabatan($jabatan)
  {
  	
  	$this->db->like('jabatan', $jabatan, 'both');
  	$this->db->order_by('jabatan', 'ASC');
  	$this->db->limit(10);
  	$result = $this->db->get('tbl_pimpinan')->result(); 
  	return $result;
  }
  public function search_unit($unit)
  {
  	
  	$this->db->like('unit', $unit, 'both');
  	$this->db->order_by('unit', 'ASC');
  	$this->db->limit(10);
  	$result = $this->db->get('tbl_pimpinan')->result(); 
  	return $result;
  }
  function cari($id) //-->berfungsi untuk mengambil data yang dicari untuk digunakan sebagai auto fill isian form
    {
        $query= $this->db->get_where('tbl_pimpinan',array('id_pimpinan'=>$id));
        return $query;
    }
    
}

