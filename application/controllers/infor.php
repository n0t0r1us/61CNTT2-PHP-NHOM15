<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class infor extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function infor(){
        $this->db->where('discount NOT IN (0) ');
    //        $input['order'] = array('discount', 'DESC');
        $this->load->library('pagination');
        $config = array();
        $this->pagination->initialize($config);
    
        $segment = $this->uri->segment(3);
        $segment = intval($segment);
    
        $this->data['temp'] = 'site/infor/tt';
        $this->load->view('site/layoutin4', $this->data);
    }
    public function baitap(){
        $this->db->where('discount NOT IN (0) ');
    //        $input['order'] = array('discount', 'DESC');
        $this->load->library('pagination');
        $config = array();
        $this->pagination->initialize($config);
    
        $segment = $this->uri->segment(3);
        $segment = intval($segment);
    
        $this->data['temp'] = 'site/btth/index';
        $this->load->view('site/layoutin4', $this->data);
    }
}



