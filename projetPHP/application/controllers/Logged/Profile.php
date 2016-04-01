<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index()
    {
        $this->load->model('profileModel');
        $data = $this->profileModel->read(1); //todo remplacer par l'id de l'utilisateur connecté


        $this->load->view('layout/include/header');
        $this->load->view('Logged/Profile', $data);
        $this->load->view('layout/include/footer');
    }

    public function edit()
    {

    }
}