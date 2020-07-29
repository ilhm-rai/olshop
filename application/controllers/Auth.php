<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('/');
            }
        };

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback pl-2">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Masuk ke DalyRasya · DalyRasya';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->getUser('email', $email);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {

                    $data  = array(
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    );

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('/');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda masukan belum melakukan aktivasi!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda masukan belum terdaftar!</div>');
            redirect('login');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('/');
            }
        };

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', array(
            'is_unique' => 'Maaf email yang anda masukan sudah terdaftar!'
        ));
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[repeatPassword]',
            array(
                'matches' => 'Password tidak sesuai, silakan periksa kembali!',
                'min_length' => 'Password terlalu pendek!'
            )
        );

        $this->form_validation->set_rules(
            'repeatPassword',
            'RepeatPassword',
            'required|trim|matches[password]'
        );

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback pl-2">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun · DalyRasya';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'picture' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, akun Anda berhasil dibuat!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('/');
    }

    public function blocked()
    {
        $data['url'] =  ($this->session->userdata('role_id') == 1) ? 'admin' : '/';
        $this->load->view('auth/blocked', $data);
    }
}
