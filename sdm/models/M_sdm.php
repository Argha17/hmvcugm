<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_sdm extends CI_Model 
{
	
	public function get($id = null)
	{
		
		$this->db->select('ugmfw_user.*, ugmfw_group_menu.group_menu_nama as fungsi_nama,  ref_jabatan_hris.eselon, ref_jabatan_hris.jabatan_hris,ref_jabatan_hris.subunit_kerja_jabatan, ref_unit_hris.unit_hris');
		$this->db->from('ugmfw_user');
		$this->db->join('ugmfw_group_menu', 'ugmfw_group_menu.group_menu_id = ugmfw_user.group_menu_id');
		$this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris', 'left');		
		if($id != null)
		{
			//$this->db->where(['user_id'], $id);
			$this->db->where('user_is_aktif', 1);
     
			//$this->db->where('user_is_deleted', 1);
		}
		$query = $this->db->get();
		return $query;
	}
	

	
	public function add($post)
	{
		$params = [
			'group_menu_id' => $post['fungsi_nama'],
			'updated_time'   => date('Y-m-d H:i:s')
		];
		//$this->db->insert('tbl_pimpinan', $params);*/
		//$this->db->set('is_deleted', 1);
		//$this->db->where('id_pimpinan', $id);
        //$this->db->where('id_pimpinan', $post['id']);
		//$this->db->update('tbl_pimpinan', $params);

	   $this->db->set('user_is_aktif', 1);
	   $this->db->set('user_is_deleted', 1);
       $this->db->where('user_nip', $post['user_nip']);
       return $this->db->update('ugmfw_user', $params);


	}

	public function edit($post)
	{
		$params = [
			'nama' => $post['fullname'],
			'id_satker' => $post['satker'],
			'id_fungsi' => $post['fungsi'],
			'id_unit' => $post['unit'],
			'nip' => $post['nip'],
			'e_mail' => $post['email'],
			'alamat_' => $post['address'],
			'updated' => date('Y-m-d H:i:s'),
		];
		$this->db->where('id_sdm', $post['id']);
		$this->db->update('tb_sdm', $params);
	}
	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('ugmfw_user');
		
	}
	function soft_delete($id)
	{	
		$this->db->set('group_menu_id', null);
		$this->db->set('user_subunit_id', null);
        $this->db->set('user_is_deleted', 0);
        $this->db->set('user_is_aktif', 0);
        $this->db->where('user_id', $id);
        return $this->db->update('ugmfw_user');
    }
    public function detail_data($id = NULL)
	{
		$this->db->select('ugmfw_user.*, ugmfw_group_menu.group_menu_nama as fungsi_nama,  ref_jabatan_hris.eselon, ref_jabatan_hris.jabatan_hris,ref_jabatan_hris.subunit_kerja_jabatan, ref_unit_hris.unit_hris');
		$this->db->from('ugmfw_user');
		$this->db->join('ugmfw_group_menu', 'ugmfw_group_menu.group_menu_id = ugmfw_user.group_menu_id');
		$this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris', 'left');
		$this->db->where(array('user_id' => $id));
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function get_keyword($carinama,$carifungsi,$caritahun)
	{
    $this->db->select('ugmfw_user.*, ugmfw_group_menu.group_menu_nama as fungsi_nama,  ref_jabatan_hris.eselon, ref_jabatan_hris.jabatan_hris,ref_jabatan_hris.subunit_kerja_jabatan, ref_unit_hris.unit_hris');
    $this->db->from('ugmfw_user');
    $this->db->join('ugmfw_group_menu', 'ugmfw_group_menu.group_menu_id = ugmfw_user.group_menu_id');
    $this->db->join('ref_jabatan_hris', 'ref_jabatan_hris.id_jabatan_hris = ugmfw_user.id_jabatan_hris', 'left');
    $this->db->join('ref_unit_hris', 'ref_unit_hris.id_unit_hris = ugmfw_user.id_unit_hris', 'left');
		  if($carinama != NULL && $carifungsi != NULL){
      $this->db->where('ugmfw_user.user_nama_lengkap', $carinama);
    } else {
      if($carifungsi != NULL) {
         $this->db->where('ugmfw_user.user_nama_lengkap', $carinama);
        } 
        else {
          $this->db->where('ugmfw_group_menu.group_menu_id', $carifungsi);
        }
         }
    $this->db->where('date(ugmfw_user.updated_time)', $caritahun);
    return $this->db->get();
  }

   	public function search_namapimpinan($title, $fungsi_tugas, $kelas_jabatan, $kelas_jabatan_null)
    
  {
 

//--[AUTOCOMPLETE] coding model autocomplete pimpinan 1 tabel ugmfw--//	
  	/*$sql="select 
  		a.* 
  	from 
  		ugmfw_user a 
  	where 
  		group_menu_id=$fungsi_tugas 
  		and (a.user_gelar is null or a.user_gelar='3A' or a.user_gelar='3B' or a.user_gelar='4A' or a.user_gelar='4B') 
  		and (a.user_nama_lengkap like '%$title%' or a.user_gelar like '%$title%' or  a.user_unit like '%$title%') 
  		and a.user_satker like '%$satker' 
  		and a.user_is_aktif = 0 ";*/

//--[AUTOCOMPLETE] coding model autocomplete pimpinan 3 tabel dr ugmfw,jabatan, dan unit--//
  	/*$sql="select 
  			a.*,
  			b.kelas_jabatan,
  			b.jabatan_hris,
  			c.unit_hris	 
  		from 
  			ugmfw_user a 
  		left join 
  			ref_jabatan_hris b on a.id_jabatan_hris = b.id_jabatan_hris 
  		left join 
  			ref_unit_hris c on a.id_unit_hris = c.id_unit_hris  
  		where 
  			a.group_menu_id=$fungsi_tugas 
  			and (a.user_nama_lengkap like '%$title%' or b.jabatan_hris like '%$title%' or c.unit_hris like '%$title%')";*/

 //NYOBAIN CEK mas agung
  		$sql="
  
  			select 
        a.created_by,
  			a.user_nama_lengkap,
				a.user_nip,
				a.user_username,
				a.user_email,
				a.user_nohp,
				a.user_is_aktif,
  				b.kelas_jabatan,
  				b.jabatan_hris,
  				b.id_jabatan_hris,
  				c.unit_hris	 
  			from 
  				ugmfw_user a 
  			left join 
  				ref_jabatan_hris b on a.id_jabatan_hris = b.id_jabatan_hris 
  			left join 
  				ref_unit_hris c on a.id_unit_hris = c.id_unit_hris  
  			where 
  				
  				$kelas_jabatan $kelas_jabatan_null
  				and (a.user_nama_lengkap like '%$title%' or b.jabatan_hris like '%$title%' or c.unit_hris like '%$title%')
  				and a.user_nohp = '2z' and a.user_is_aktif = 0 and a.created_by is null
  			";

 //==============================================================================================//
 
  	/*$sql="

  			select 
  				a.user_nama_lengkap,
				a.user_nip,
				a.user_username,
				a.user_email,
				a.user_nohp,
				a.user_is_aktif,
				a.group_menu_id,
  				case
  					when a.group_menu_id = 9
  						then (select b.kelas_jabatan from ref_jabatan_hris where kelas_jabatan in (10,11,12,13)
  					when a.group_menu_id = 10
  						then (select b.kelas_jabatan from ref_jabatan_hris where kelas_jabatan in (10,11,null)
  					when a.group_menu_id = 16
  						then (select b.kelas_jabatan from ref_jabatan_hris where kelas_jabatan is null)
  					else null
  				end as kelas_jabatan,
  				b.jabatan_hris,
  				b.id_jabatan_hris,
  				c.unit_hris	 
  			from 
  				ugmfw_user a 
  			left join 
  				ref_jabatan_hris b on a.id_jabatan_hris = b.id_jabatan_hris 
  			left join 
  				ref_unit_hris c on a.id_unit_hris = c.id_unit_hris  
  			where 
  				a.group_menu_id=$fungsi_tugas
  				and (a.user_nama_lengkap like '%$title%' or b.jabatan_hris like '%$title%' or c.unit_hris like '%$title%')
  				and a.user_nohp = '2z' and a.user_is_aktif = 0
  			";
*/
  	
  	$this->db->limit(1000);
  	$result = $this->db->query($sql)->result(); 
  	return $result;
  }
   	 public function get_penugasan($title)
  {
  	$this->db->like('nama_petugas', $title, 'both');
  	$this->db->or_like('jabatan', $title, 'both');
  	$this->db->or_like('satuankerja', $title, 'both');
  	$this->db->order_by('nama_petugas ASC', 'jabatan ASC', 'satuankerja ASC');
  	$this->db->limit(10);
  	return $this->db->get('tbl_penugasan')->result();
  }
  	 public function get_satuankerja($satuankerja)
  {
  	$this->db->like('satuankerja', $satuankerja, 'both');
  	$this->db->order_by('satuankerja', 'ASC');
  	$this->db->limit(10);
  	return $this->db->get('tbl_penugasan')->result();
  }
  	 public function get_jabatan($jabatan)
  {
  	$this->db->like('jabatan', $jabatan, 'both');
  	$this->db->order_by('jabatan', 'ASC');
  	$this->db->limit(10);
  	return $this->db->get('tbl_penugasan')->result();
  }

  	 public function search_penugasan($title)
  {
  	$this->db->like('nama_petugas', $title, 'both');
  	$this->db->order_by('nama_petugas', 'ASC');
  	$this->db->limit(10);
  	return $this->db->get('tbl_penugasan')->result();
  }


}

