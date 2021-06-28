<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_daftarpaket extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('tbl_detail.*, tbl_petugas.id_fungsi,tbl_petugas.id_user,tbl_fungsi.fungsi,ref_unit_hris.unit_hris,ugmfw_user.user_nama_lengkap, ref_unit_hris.id_satker_sipinter' );
		$this->db->from('tbl_detail');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_det = tbl_detail.id_det', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_satker_sipinter = tbl_detail.id_subunit', 'left');
		$this->db->join('tbl_fungsi', 'tbl_fungsi.id_fungsi = tbl_petugas.id_fungsi', 'left');
		$this->db->join('ugmfw_user', 'ugmfw_user.user_id = tbl_petugas.id_user', 'left');
		$tgl = date ('Y-m-d');


		if($id != null)
		{
			$this->db->where(['id_det'], $id);
			/*$this->db->where('tgl_mulai', $tgl);*/
			
		}
		$query = $this->db->get();
		return $query;
	} 


	

	public function add($post)
	{
	$sql="
	INSERT INTO  tbl_daftarpaket  ( id_kontrak, id_fungsi ,  id_satuan ,  biaya ,  created_at ) 

	SELECT '".$post['kontrak']."','".$post['fungsi']."', '".$post['satuan']."', '".$post['biaya']."', '".date('Y-m-d H:i:s')."'

	";

	$result = $this->db->query($sql); 
  	return $result;



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
		//$this->db->where('id_daftarpaket', $post['id']);
		return $this->db->update('ugmfw_user', $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('ugmfw_user');
		
	}
	function soft_delete($id)
	{
	//--[SOFTDELETE] coding model SOFTDELETE daftarpaket di tabel ugmfw dg UPDATE--//
	/*$params = 
		[
		'updated_time'			=> date('Y-m-d H:i:s')
		];
        $this->db->set('group_menu_id', null);
        $this->db->set('user_is_deleted', 0);
        //$this->db->set('user_is_aktif', 0);
        $this->db->where('user_id', $id);
        return $this->db->update('ugmfw_user', $params);*/

        //--[DELETE] coding model DELETE daftarpaket di tabel ugmfw dg DELETE--//
        $this->db->where('user_id', $id);
        return $this->db->delete('ugmfw_user');
    }

    public function get_keyword($carifungsi, $cariunit, $caribulan)
	{
		$this->db->select('tbl_detail.*, tbl_petugas.id_fungsi,tbl_petugas.id_user,tbl_fungsi.fungsi,ref_unit_hris.unit_hris,ugmfw_user.user_nama_lengkap, ref_unit_hris.id_satker_sipinter' );
		$this->db->from('tbl_detail');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_det = tbl_detail.id_det', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_satker_sipinter = tbl_detail.id_subunit', 'left');
		$this->db->join('tbl_fungsi', 'tbl_fungsi.id_fungsi = tbl_petugas.id_fungsi', 'left');
		$this->db->join('ugmfw_user', 'ugmfw_user.user_id = tbl_petugas.id_user', 'left');
	
		if($carifungsi != NULL && $cariunit != NULL){
 			$this->db->where('tbl_fungsi.id_fungsi', $carifungsi);
		} else {
 			if($carifungsi != NULL) {
 				 $this->db->where('tbl_fungsi.id_fungsi', $carifungsi);
 				} 
 				else {
  				$this->db->where('ref_unit_hris.id_satker_sipinter', $cariunit);
 				}
 			   }


		/*$this->db->where('tbl_fungsi.id_fungsi', $carifungsi);
		$this->db->where('ref_unit_hris.id_satker_sipinter', $cariunit);*/
		/*if ($caribulan != NULL && $carifungsi == NULL && $cariunit == NULL ) {
			$this->db->where('date(tgl_mulai)', $caribulan);
		} else {
			$this->db->where('date(tgl_mulai)', $caribulan);
	  		   }*/
		$this->db->where('date(tgl_mulai)', $caribulan);
		//$this->db->where('year(tgl_mulai)', $caritahun);
		return $this->db->get();
	}
}