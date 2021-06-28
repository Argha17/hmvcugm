<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_analisis2 extends CI_Model 
{
	
	public function get($id = null)
	{
		

		$this->db->select('tbl_detail.paket_pekerjaan,tbl_detail.pagu_anggaran,tbl_detail.tgl_mulai,tbl_detail.tgl_selesai,ugmfw_user.user_nama_lengkap,ref_unit_hris.unit_hris, tbl_detail.tgl_akhir_tender');
		$this->db->from('tbl_detail');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_det = tbl_detail.id_det', 'left');
		$this->db->join('ugmfw_user', 'ugmfw_user.user_id = tbl_petugas.id_user', 'left');
		$this->db->join('tbl_fungsi', 'tbl_fungsi.id_fungsi = tbl_petugas.id_fungsi', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_satker_sipinter = ugmfw_user.user_unit_id', 'left');
		if($id != null)
		{

			/*$id = array('734704','729994','729720');*/
			$id = array('');
      		$this->db->where_in('tbl_detail.id_det', $id);
		
			
		}
		$query = $this->db->get();
		return $query;
	} 
	public function get_sum($ids_det)
	{
		
		$this->db->select('pagu_anggaran as nilai_kontrak');
		$this->db->from('tbl_detail');
		
		$this->db->where('tbl_detail.id_det', $ids_det);
		$query = $this->db->get()->row();
		return $query;
	}


	public function get_hr($sum_jumlah)
	{	

		$this->db->select('tbl_analisis_nilai.*');
		$this->db->from('tbl_analisis_nilai');
		$this->db->where(''.(float)$sum_jumlah.' >= nilai_min AND '.(float)$sum_jumlah.' < nilai_max');
		$query = $this->db->get()->row();
		return $query;
	}

	public function get_hr2($id_nilai)
	{
		$this->db->select('tbl_analisis_nilai.*');
		$this->db->from('tbl_analisis_nilai');
		$this->db->where('id_nilai',$id_nilai);
		$query = $this->db->get()->row();
		return $query;
	}

	

	public function add($post)
	{
	$sql="
	INSERT INTO  tbl_analisis2  ( id_kontrak, id_fungsi ,  id_satuan ,  biaya ,  created_at ) 

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
		//$this->db->where('id_analisis2', $post['id']);
		return $this->db->update('ugmfw_user', $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('ugmfw_user');
		
	}
	function soft_delete($id)
	{
	//--[SOFTDELETE] coding model SOFTDELETE analisis2 di tabel ugmfw dg UPDATE--//
	/*$params = 
		[
		'updated_time'			=> date('Y-m-d H:i:s')
		];
        $this->db->set('group_menu_id', null);
        $this->db->set('user_is_deleted', 0);
        //$this->db->set('user_is_aktif', 0);
        $this->db->where('user_id', $id);
        return $this->db->update('ugmfw_user', $params);*/

        //--[DELETE] coding model DELETE analisis2 di tabel ugmfw dg DELETE--//
        $this->db->where('user_id', $id);
        return $this->db->delete('ugmfw_user');
    }

     public function get_keyword($user_nama_lengkap, $caribulan)
	{
		$this->db->select('tbl_detail.paket_pekerjaan,tbl_detail.pagu_anggaran,tbl_detail.tgl_mulai,tbl_detail.tgl_selesai,ugmfw_user.user_nama_lengkap,tbl_detail.id_det,tbl_detail.tgl_akhir_tender,ref_unit_hris.unit_hris');
		$this->db->from('tbl_detail');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_det = tbl_detail.id_det', 'left');
		$this->db->join('ugmfw_user', 'ugmfw_user.user_id = tbl_petugas.id_user', 'left');
		$this->db->join('tbl_fungsi', 'tbl_fungsi.id_fungsi = tbl_petugas.id_fungsi', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_satker_sipinter = ugmfw_user.user_unit_id', 'left');
	
		
		$this->db->where('ugmfw_user.user_nama_lengkap', $user_nama_lengkap);
		$this->db->where('date(tbl_detail.tgl_mulai) <=', $caribulan);
		$this->db->where('date(tbl_detail.tgl_selesai) >=', $caribulan);
		return $this->db->get();
	}

	public function get_keyword2($berdasarkan2, $yangdicari2)
	{
		$this->db->select('tbl_analisis2.*, tbl_kontrak.nilai_kontrak, tbl_fungsi2.nama_fungsi, tbl_satuan.satuan');
		$this->db->from('tbl_analisis2');
		$this->db->join('tbl_kontrak', 'tbl_kontrak.id_kontrak = tbl_analisis2.id_kontrak', 'left');
		$this->db->join('tbl_fungsi2', 'tbl_fungsi2.id_fungsi = tbl_analisis2.id_fungsi', 'left');
		$this->db->join('tbl_satuan', 'tbl_satuan.id_satuan = tbl_analisis2.id_satuan', 'left');
		switch($berdasarkan2)
		{
			case"";
				$this->db->or_like('nama_fungsi',$yangdicari2);
				$this->db->or_like('satuan',$yangdicari2);
				$this->db->or_like('created_at',$yangdicari2);
				break;
			case"nama_fungsi";
			$this->db->where('nama_fungsi', $yangdicari2);
			default:
			$this->db->like($berdasarkan2,$yangdicari2);
		}	
		return $this->db->get();
	}

	public function filter_autocomplete($title)
  {

  		$sql="SELECT distinct a.id_user, 
  		
  			c.fungsi,
  			d.user_nama_lengkap,
  			e.unit_hris
  		from 
  			tbl_petugas a 

  		left join 
  			tbl_fungsi c on a.id_fungsi = c.id_fungsi
  		left join 
  			ugmfw_user d on a.id_user = d.user_id
  		left join 
  			ref_unit_hris e ON d.user_unit_id = e.id_satker_sipinter 
  		where 	
  		c.fungsi = 'Pejabat Pengadaan' 
  		AND d.user_nama_lengkap like '%$title%'";

  	$this->db->limit(10);
  	$result = $this->db->query($sql)->result(); 
  	return $result;
  }
}