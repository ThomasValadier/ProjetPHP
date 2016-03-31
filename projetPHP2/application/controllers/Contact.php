<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function index()
    {
        $data['css'] = array('Contact.css');
        $this->load->view('layout/include/header', $data);
        $this->load->view('Contact', $data);
        $this->load->view('layout/include/footer', $data);
    }
}