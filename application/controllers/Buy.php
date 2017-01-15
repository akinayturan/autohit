<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $this->load->view('_head');
            $this->load->view('buy');
            $this->load->view('_foot');
        }
    }
}
