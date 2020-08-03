<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller{
    
     public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }
    
    public function index()
    {
         $data = [
            'title' => 'Data User . DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'users' => $this->User_model->getAllUser()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($name)
    {
        $customer = $this->User_model->getAllUser($name);
        $data = [
            'users' => $customer,
            'title' => $customer->name . ' | DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }
    public function delete($name)
    {

        $user = $this->User_model->getAllUser();

        unlink('assets/img/user_picture/' . $user->picture);

        $this->User_model->delete($name);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin berhasil dihapus!</div>');
        redirect('user');
    }
}