<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadee extends CI_Controller {
    public function index()
    {
        $this->load->library('jade');
        $this->jade->view('myview');
    }
}