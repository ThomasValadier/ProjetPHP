<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index($data = null)
    { 
        $data['css'] = array('Home.css');
        $data['js'] = array('vendor/jquery.leanModal.min.js', 'home.js',);
        $this->load->library('session');
        $this->load->view('layout/include/header', $data);
        $this->load->view('Home', $data); 
        $this->load->view('layout/include/footer', $data);
    }
}