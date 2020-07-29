<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        $this->load->helper('string');
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

    protected function rules()
    {
        return [
            [
                'field' => 'product_name',
                'label' => 'ProductName',
                'rules' => 'required|is_unique[products.product_name]',
                'errors' => [
                    'required' => "Field nama produk tidak boleh kosong!",
                    'is_unique' => "Nama produk sudah terdaftar."
                ]
            ],
            [
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required|is_natural_no_zero|numeric',
                'errors' => [
                    'required' => "Field kategori produk tidak boleh kosong!",
                    'is_natural_no_zero' => "Pilih salah satu kategori produk!",
                    'numeric' => "Masukan kategori produk dengan benar."
                ]
            ],
            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'required|numeric|is_natural',
                'errors' => [
                    'required' => "Field stok produk tidak boleh kosong!",
                    'numeric' => "Masukan stok produk berupa angka."
                ]
            ],
            [
                'field' => 'unit_price',
                'label' => 'UnitPrice',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "Field harga produk tidak boleh kosong!",
                    'numeric' => "Masukan harga produk berupa angka."
                ]
            ],
            [
                'field' => 'discount',
                'label' => 'Discount',
                'rules' => 'numeric|less_than[100]',
                'errors' => [
                    'numeric' => "Masukan diskon produk berupa angka mulai dari 1-100.",
                    'less_than' => "Diskon product tidak boleh lebih dari 100%."
                ]
            ],
        ];
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'categories' => $this->Category_model->getCategory(),
        ];

        $validation = $this->form_validation;

        $validation->set_rules($this->rules());

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        $config = [
            'upload_path' => './assets/img/products/',
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
            $this->load->view('product/create', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();
            $pictureName = $dataUpload['file_name'];
            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            $productName = $this->input->post('product_name');
            $slug = url_title($productName, '-') . '.P-' . random_string('numeric');
            $data = [
                'product_name' => $productName,
                'slug' => $slug,
                'product_description' => $this->input->post('product_description'),
                'stock' => $this->input->post('stock'),
                'category_id' => $this->input->post('category'),
                'unit_price' => $this->input->post('unit_price'),
                'discount' => $this->input->post('discount'),
                'picture' => $pictureName
            ];
            $this->Product_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil ditambahkan!</div>');
            redirect('product');
        }
    }

    public function delete($slug)
    {

        $product = $this->Product_model->getProduct($slug);

        unlink('assets/img/products/' . $product->picture);

        $this->Product_model->delete($slug);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil dihapus!</div>');
        redirect('product');
    }

    public function detail($slug)
    {
        $product = $this->Product_model->getProduct($slug);
        $data = [
            'product' => $product,
            'title' => $product->product_name . ' | DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Produk · DalyRasya',
            'user' => $this->User_model->getUser('email', $this->session->userdata('email')),
            'categories' => $this->Category_model->getCategory(),
            'product' => $this->Product_model->getProduct($slug)
        ];

        $config = [
            'upload_path' => './assets/img/products/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size' => 5120,
            'encrypt_name' => true,
            'file_ext_tolower' => true
        ];

        $this->upload->initialize($config);

        $validation = $this->form_validation;

        $oldProductName = $data['product']->product_name;
        $oldPicture = $data['product']->picture;
        $id = $data['product']->id;
        $slugSuffix = substr($data['product']->slug, -11);

        $rules = $this->rules();
        if ($oldProductName == $this->input->post('product_name')) {
            // rules[index_rule][item_dalam_rule]
            $rules[0]['rules'] = 'required';
        } else {
            $rules[0]['rules'] = 'required|is_unique[products.product_name]';
        }

        $validation->set_rules($rules);

        $validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if (($validation->run() == false) || (!$this->upload->do_upload('picture'))) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpload = $this->upload->data();

            $pictureName = $dataUpload['file_name'];

            if ($pictureName == null) {
                $pictureName = 'default.png';
            }

            if ($oldPicture != $pictureName) {
                if ($pictureName != 'default.png') {
                    unlink('assets/img/products/' . $oldPicture);
                }
            }


            $productName = $this->input->post('product_name');
            $data = [
                'id' => $id,
                'product_name' => $productName,
                'slug' => url_title($productName) . $slugSuffix,
                'product_description' => $this->input->post('product_description'),
                'stock' => $this->input->post('stock'),
                'category_id' => $this->input->post('category'),
                'unit_price' => $this->input->post('unit_price'),
                'discount' => $this->input->post('discount'),
                // 'picture' => $this->input->post('pictures')
                'picture' => $pictureName
            ];

            $this->Product_model->replace($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil diubah!</div>');

            redirect('product');
        }
    }
}
