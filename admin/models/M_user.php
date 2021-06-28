<?php

class M_user extends CI_Model {

    private $db2;

    public function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('default', TRUE);
    }

    function get_data_barang_bykode($kode) {
        $hsl = $this->db2->query("SELECT * FROM barang WHERE kode='$kode'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'kode' => $data->kode,
                    'nama_barang' => $data->nama_barang,
                    'harga' => $data->harga,
                    'satuan' => $data->satuan,
                );
            }
        }
        return $hasil;
    }

    public function select_user() {
        $this->db2->select('U.iduser,U.email,U.fname,U.lname,GROUP_CONCAT(G.group_name) as group_name');
        $this->db2->from('tbl_user U');
        $this->db2->join('tbl_group G', 'U.idgroup=G.group_id', 'left');
        //$this->db->join('ugmfw_group_menu G', 'G.group_menu_id=GU.group_menu_id', 'left');


        $this->db2->group_by('U.iduser');
        //$this->db->limit($limit, $offset);
        $this->db2->order_by('U.iduser', 'ASC');
        $query = $this->db2->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

}
