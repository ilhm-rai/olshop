<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('Ads_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
