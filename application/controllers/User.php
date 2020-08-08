<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Ads_model');
        $this->load->model('Category_model');
    }

    protected function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
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
                    'required' => "Field password tidak boleh kosong!",
                    'min_length' => 'Password terlalu pendek!'
                ]
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required|is_natural_no_zero|numeric',
                'errors' => [
                    'required' => "Field role pengguna tidak boleh kosong!",
                    'is_natural_no_zero' => "Pilih salah satu role pengguna!",
                    'numeric' => "Masukan role pengguna dengan benar."
                ]
            ],
        ];
    }

    public function index()
    {
        $data = [
            'title' => 'Data User · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'users' => $this->User_model->getUser()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Admin · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'role' => $this->User_model->getRole()
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

        if (isset($_FILES['picture'])) {
            if ($_FILES['picture']['error'] != 4) {
                $this->upload->do_upload('picture');
            }
        }

        if (($validation->run() == false) || $this->upload->display_errors()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/create', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();
            $pictureName = $dataUpload['file_name'];
            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            $data = [
                'name' => $this->input->post('name'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'is_active' => 1,
                'date_created' => date('Y-m-d H:i:s'),
                'picture' => $pictureName
            ];
            $db = $this->User_model->insert($data);
            if ($data['role_id'] == 2) {
                $data = [
                    'user_id' => $db->conn_id->insert_id,
                    'date_created' => date('Y-m-d H:i:s')
                ];
                $this->User_model->insertCart($data);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin berhasil ditambahkan!</div>');
            redirect('user');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $user = $this->User_model->getUser('id', $id);
            $pictureName = $user->picture;
            $path = 'assets/img/user_picture/';
            if ($pictureName != 'default.png') {
                if (file_exists($path . $pictureName)) {
                    unlink($path . $pictureName);
                }
            }
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
            redirect('user');
        } else {
            redirect('auth/blocked');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data User · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'user_edit' => $this->User_model->getUser('id', $id),
            'role' => $this->User_model->getRole()
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

        $oldEmail = $data['user_edit']->email;
        $oldPicture = $data['user_edit']->picture;
        $oldPassword = $data['user_edit']->password;

        $rules = $this->rules();

        // Remove password rule
        unset($rules[2]);

        array_push($rules, [
            'field' => 'old_password',
            'label' => 'oldPassword',
            'rules' => 'trim'
        ]);


        if ($this->input->post('old_password') == '') {
            $rules[4]['rules'] = 'trim';
            $password = $oldPassword;
        } else {
            $rules[4]['rules'] = 'trim|callback_password_check';
            if ($this->password_check($this->input->post('old_password'), $oldPassword)) {
                $rules[4]['rules'] = 'trim';
                array_push($rules, [
                    'field' => 'new_password',
                    'label' => 'newPassword',
                    'rules' => 'trim|required|min_length[3]',
                    'errors' => [
                        'required' => "Field password baru tidak boleh kosong!",
                        'min_length' => 'Password baru terlalu pendek!'
                    ]
                ]);
                $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            } else {
                $password = $oldPassword;
            }
        }

        if ($oldEmail == $this->input->post('email')) {
            $rules[1]['rules'] = 'required';
        } else {
            $rules[1]['rules'] = 'required|is_unique[users.email]';
        }

        $validation->set_rules($rules);

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if (isset($_FILES['picture'])) {
            if ($_FILES['picture']['error'] != 4) {
                $this->upload->do_upload('picture');
            }
        }

        if (($validation->run() == false) || $this->upload->display_errors()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();

            if ($dataUpload['file_name'] == null) {
                $pictureName = $oldPicture;
            } else {
                $pictureName = $dataUpload['file_name'];
            }

            if ($oldPicture != $pictureName) {
                $path = 'assets/img/user_picture/';
                if ($oldPicture != 'default.png') {
                    if (file_exists($path . $oldPicture)) {
                        unlink($path . $oldPicture);
                    }
                }
            }

            $data = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $password,
                'role_id' => $this->input->post('role'),
                'picture' => $pictureName
            ];

            $this->User_model->update($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil diubah!</div>');

            redirect('user');
        }
    }

    public function password_check($passwordPost, $passwordTbl)
    {
        if (!password_verify($passwordPost, $passwordTbl)) {
            $this->form_validation->set_message('password_check', 'Password lama tidak sesuai, silakan coba kembali!');
            return false;
        } else {
            return true;
        }
    }
}
