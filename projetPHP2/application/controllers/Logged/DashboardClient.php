<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardClient extends CI_Controller {
    public function index()
    {
        $data['css'] = array('DashboardClient.css');
        $data['js'] = array('javascript/dashboard_client.js');
        $this->load->library('session');
        $this->load->view('layout/include/header', $data);
        $this->load->view('Logged/dashboard_client', $data);
        $this->load->view('layout/include/footer', $data);
    }
}