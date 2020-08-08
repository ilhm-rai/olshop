<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Product_model');
    }

    public function add_to_cart()
    {
        $cart = $this->User_model->getCart($this->input->post("user_id"));
        $product = $this->Product_model->getProduct('slug', $this->input->post("slug"));

        $data = [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'qty' => $this->input->post("qty")
        ];

        $this->User_model->insertItemToCart($data);
        redirect($product->slug);
    }
}
