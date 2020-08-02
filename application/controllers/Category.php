<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Category_model');
    }

    protected function rules()
    {
        return [
            [
                'field' => 'category_name',
                'label' => 'CategoryName',
                'rules' => 'required|is_unique[categories.category_name]',
                'errors' => [
                    'required' => "Field nama kategori tidak boleh kosong!",
                    'is_unique' => "Nama kategori sudah terdaftar."
                ]
            ], [
                'field' => 'category_description',
                'label' => 'CategoryDescription',
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => "Field deskripsi tidak boleh kosong!",
                    'less_than' => "Deskripsi kategori tidak boleh lebih dari 100 karakter."
                ]
            ]
        ];
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'categories' => $this->Category_model->getCategory()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/category/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
        ];

        $validation = $this->form_validation;
        $validation->set_rules($this->rules());
        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        $config = [
            'upload_path' => './assets/img/products/categories/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size' => 5120,
            'encrypt_name' => true,
            'file_ext_tolower' => true
        ];

        $this->upload->initialize($config);

        if (($validation->run() == false) || !$this->upload->do_upload('picture')) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/category/create');
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();
            $pictureName = $dataUpload['file_name'];

            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            $data = [
                'category_name' => $this->input->post('category_name'),
                'category_description' => $this->input->post('category_description'),
                'picture' => $pictureName
            ];

            $this->Category_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori produk berhasil ditambahkan!</div>');
            redirect('category');
        }
    }

    public function delete($id)
    {
        $category = $this->Category_model->getCategory($id);
        $pictureName = $category->picture;
        $path = 'assets/img/products/categories/';
        if ($pictureName != 'default.png') {
            if (file_exists($path . $pictureName)) {
                unlink($path . $pictureName);
            }
        }
        $this->Category_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori produk berhasil dihapus!</div>');
        redirect('category');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Kategori Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'category' => $this->Category_model->getCategory($id)
        ];

        $config = [
            'upload_path' => './assets/img/products/categories/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size' => 5120,
            'encrypt_name' => true,
            'file_ext_tolower' => true
        ];

        $this->upload->initialize($config);

        $validation = $this->form_validation;

        $oldCategoryName = $data['category']->category_name;
        $oldPicture = $data['category']->picture;
        $id = $data['category']->id;

        $rules = $this->rules();
        if ($oldCategoryName == $this->input->post('category_name')) {
            // rules[index_rule][item_dalam_rule]
            $rules[0]['rules'] = 'required';
        } else {
            $rules[0]['rules'] = 'required|is_unique[categories.category_name]';
        }

        $validation->set_rules($rules);

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($validation->run() == false || !$this->upload->do_upload('picture')) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/category/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();
            $pictureName = $dataUpload['file_name'];

            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            if ($oldPicture != $pictureName) {
                $path = 'assets/img/products/categories/';
                if ($pictureName != 'default.png') {
                    if (file_exists($path . $pictureName)) {
                        unlink($path . $oldPicture);
                    }
                }
            }

            $data = [
                'id' => $id,
                'category_name' => $this->input->post('category_name'),
                'category_description' => $this->input->post('category_description'),
                'picture' => $pictureName
            ];

            $this->Category_model->replace($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori produk berhasil diubah!</div>');
            redirect('category');
        }
    }
}
