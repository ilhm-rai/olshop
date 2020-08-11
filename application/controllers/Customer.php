<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Product_model');
        $this->load->model('Cart_model');
    }

    public function add_to_cart()
    {
        $user_id = $this->input->post("user_id");
        $cart = $this->Cart_model->getCart($user_id);
        $product = $this->Product_model->getProduct('slug', $this->input->post("slug"));

        if (!$cart) {
            $data = [
                'user_id' => $user_id,
                'date_created' => date('Y-m-d H:i:s')
            ];

            $cart = $this->Cart_model->insertCart($data);
            $cart_id = $cart->conn_id->insert_id;
        } else {
            $cart_id = $cart->id;
        }

        $data = [
            'cart_id' => $cart_id,
            'product_id' => $product->id,
            'qty' => $this->input->post("qty")
        ];

        $this->Cart_model->insertItemToCart($data);
        redirect($product->slug);
    }
}
