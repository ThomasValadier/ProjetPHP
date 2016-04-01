<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller
{
    public function index()
    {
        $data['css'] = array('Inscription.css');
        $this->load->view('layout/include/header', $data);
        $this->load->view('inscription', $data);
        $this->load->view('layout/include/footer', $data);
    }
}