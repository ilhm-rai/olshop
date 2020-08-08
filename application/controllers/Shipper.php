<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipper extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Ads_model');
        $this->load->model('Shipper_model');
    }

    protected function rules()
    {
        return [
            [
                'field' => 'company_name',
                'label' => 'Company_Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "Field nama perusahaan tidak boleh kosong!"
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|numeric|is_natural',
                'errors' => [
                    'required' => "Field telepon  tidak boleh kosong!",
                    'numeric' => "Masukan no telepon berupa angka."
                ]
            ],
        ];
    }

    public function index()
    {
        $data = [
            'title' => 'Data Jasa Pengiriman · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'shippers' => $this->Shipper_model->getShipper()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('shipper/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jasa Pengiriman · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
        ];

        $validation = $this->form_validation;

        $validation->set_rules($this->rules());

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');



        if (($validation->run() == false)) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('shipper/create', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'company_name' => $this->input->post('company_name'),
                'phone' => $this->input->post('phone')
            ];
            $this->Shipper_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perusahaan Jasa Pengiriman berhasil ditambahkan!</div>');
            redirect('shipper');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->Shipper_model->delete($id);
        if ($id) {
            $category = $this->Shipper_model->getShipper($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jasa Pengiriman berhasil dihapus!</div>');
            redirect('shipper');
        } else {
            redirect('auth/blocked');
        }
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Jasa Pengiriman · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'shippers' => $this->Shipper_model->getShipper($id)
        ];

        $validation = $this->form_validation;

        $id = $data['shippers']->id;

        $rules = $this->rules();

        $validation->set_rules($rules);

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($validation->run() == false) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('shipper/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id' => $id,
                'company_name' => $this->input->post('company_name'),
                'phone' => $this->input->post('phone')
            ];

            $this->Shipper_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jasa Pengiriman berhasil diubah!</div>');
            redirect('shipper');
        }
    }
}
