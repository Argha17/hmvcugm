<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class M_analisis3 extends CI_Model 
{
	
	public function get($id = null)
	{
		$this->db->select('tbl_analisis3.*, tbl_detail.paket_pekerjaan,tbl_detail.pagu_anggaran,ref_unit_hris.unit_hris,tbl_detail.tgl_mulai,tbl_detail.tgl_selesai, tbl_jenis.jenis, tbl_detail.kehadiran' );
		$this->db->from('tbl_analisis3');
		$this->db->join('tbl_detail', 'tbl_detail.id_det = tbl_analisis3.id_det', 'left');
		$this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_detail.id_jenis', 'left');
		$this->db->join('ref_unit_hris', 'ref_unit_hris.id_satker_sipinter = tbl_detail.id_subunit', 'left');
	
		if($id != null)
		{
			$this->db->where(['id_det'], $id);
			
		}
		$query = $this->db->get();
		return $query;
	} 


	

	public function add($post)
	{
	$sql="
	INSERT INTO  tbl_analisis3  ( id_kontrak, id_fungsi ,  id_satuan ,  biaya ,  created_at ) 

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
		//$this->db->where('id_analisis3', $post['id']);
		return $this->db->update('ugmfw_user', $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('ugmfw_user');
		
	}
	function soft_delete($id)
	{
	//--[SOFTDELETE] coding model SOFTDELETE analisis3 di tabel ugmfw dg UPDATE--//
	/*$params = 
		[
		'updated_time'			=> date('Y-m-d H:i:s')
		];
        $this->db->set('group_menu_id', null);
        $this->db->set('user_is_deleted', 0);
        //$this->db->set('user_is_aktif', 0);
        $this->db->where('user_id', $id);
        return $this->db->update('ugmfw_user', $params);*/

        //--[DELETE] coding model DELETE analisis3 di tabel ugmfw dg DELETE--//
        $this->db->where('user_id', $id);
        return $this->db->delete('ugmfw_user');
    }

    public function get_keyword($berdasarkan, $yangdicari)
	{
		$this->db->select('tbl_analisis3.*, tbl_kontrak.nilai_kontrak, tbl_fungsi2.nama_fungsi, tbl_satuan.satuan');
		$this->db->from('tbl_analisis3');
		$this->db->join('tbl_kontrak', 'tbl_kontrak.id_kontrak = tbl_analisis3.id_kontrak', 'left');
		$this->db->join('tbl_fungsi2', 'tbl_fungsi2.id_fungsi = tbl_analisis3.id_fungsi', 'left');
		$this->db->join('tbl_satuan', 'tbl_satuan.id_satuan = tbl_analisis3.id_satuan', 'left');
	
		$this->db->where('tbl_fungsi2.id_fungsi', $berdasarkan);
		$this->db->where('year(created_at)', $yangdicari);
		return $this->db->get();
	}

	public function get_keyword2($berdasarkan2, $yangdicari2)
	{
		$this->db->select('tbl_analisis3.*, tbl_kontrak.nilai_kontrak, tbl_fungsi2.nama_fungsi, tbl_satuan.satuan');
		$this->db->from('tbl_analisis3');
		$this->db->join('tbl_kontrak', 'tbl_kontrak.id_kontrak = tbl_analisis3.id_kontrak', 'left');
		$this->db->join('tbl_fungsi2', 'tbl_fungsi2.id_fungsi = tbl_analisis3.id_fungsi', 'left');
		$this->db->join('tbl_satuan', 'tbl_satuan.id_satuan = tbl_analisis3.id_satuan', 'left');
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
}