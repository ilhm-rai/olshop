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
        $this->load->helper('string');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin . DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function admin()
    {
        $data = [
            'title' => 'Data Admin · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'admin' => $this->User_model->getAllAdmin()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    protected function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'AdminName',
                'rules' => 'required',
                'errors' => [
                    'required' => "Field nama tidak boleh kosong!"
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => "Field email tidak boleh kosong!",
                    'is_unique' => 'Maaf email yang anda masukan sudah terdaftar!',
                    'valid_email' => "Masukan dengan format email yang benar."
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]',
                'errors' => [
                    'required' => "Field Password tidak boleh kosong!",
                    'min_length' => 'Password terlalu pendek!'
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|numeric|is_natural',
                'errors' => [
                    'required' => "Field No HP tidak boleh kosong!",
                    'numeric' => "Masukan No HP harus berupa angka."
                ]
            ],
        ];
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Admin · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
        ];

        $validation = $this->form_validation;

        $validation->set_rules($this->rules());

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        $config = [
            'upload_path' => './assets/img/user_picture/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size' => 5120,
            'encrypt_name' => true,
            'file_ext_tolower' => true
        ];

        $this->upload->initialize($config);

        if (($validation->run() == false) || (!$this->upload->do_upload('picture'))) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/create', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();
            $pictureName = $dataUpload['file_name'];
            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            $data = [
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => date('Y-m-d H:i:s'),
                'picture' => $pictureName
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin berhasil ditambahkan!</div>');
            redirect('admin');
        }
    }
    public function delete($name)
    {

        $admin = $this->User_model->getAllAdmin();

        unlink('assets/img/user_picture/' . $admin->picture);

        $this->User_model->delete($name);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin berhasil dihapus!</div>');
        redirect('admin');
    }
    public function edit($name)
    {
        $data = [
            'title' => 'Ubah Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'admin' => $this->User_model->getWhere($name)
        ];

        $config = [
            'upload_path' => './assets/img/user_picture/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size' => 5120,
            'encrypt_name' => true,
            'file_ext_tolower' => true
        ];

        $this->upload->initialize($config);

        $validation = $this->form_validation;

        $oldName = $data['admin']->name;
        $oldPicture = $data['admin']->picture;
        $id = $data['admin']->id;

        $rules = $this->rules();
        if ($oldName == $this->input->post('name')) {
            // rules[index_rule][item_dalam_rule]
            $rules[0]['rules'] = 'required';
        } else {
            $rules[0]['rules'] = 'required|is_unique[users.name]';
        }

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if (($validation->run() == false) || (!$this->upload->do_upload('picture'))) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();

            $pictureName = $dataUpload['file_name'];

            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            if ($oldPicture != $pictureName) {
                if ($pictureName != 'default.png') {
                    unlink('assets/img/user_picture/' . $oldPicture);
                }
            }

            $data = [
                'id' => $id,
                'name' => $name,
                'address' => $this->input->post('address'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => 1,
                'is_active' => 1,
                // 'picture' => $this->input->post('pictures')
                'picture' => $pictureName
            ];

            $this->User_model->replace($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil diubah!</div>');

            redirect('admin');
        }
    }
}
