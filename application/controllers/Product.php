<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Product_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'products' => $this->Product_model->getProduct()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/create', $data);
        $this->load->view('templates/footer');
    }
}
