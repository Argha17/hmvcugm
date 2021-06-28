<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }

    function index() {
        $data['userdata'] = $this->userdata;
        $data['page'] = 'dashboard';
        //$this->load->view('v_pos');
        $data['content'] = $this->m_user->select_user();
        //var_dump($data);
        //die();
        $this->template->views('v_user', $data);
    }

    function add_user() {
        $data['userdata'] = $this->userdata;
        $data['page'] = 'dashboard';
        //$this->load->view('v_pos');
        //$this->template->views('add_user', $data);
        $this->template->views('add_user', $data);
    }

    function get_barang() {
        $kode = $this->input->post('kode');
        $data = $this->m_pos->get_data_barang_bykode($kode);
        echo json_encode($data);
    }

}
