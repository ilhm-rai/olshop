<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Ads_model');
		$this->load->model('Cart_model');
	}

	public function index()
	{
		$products = $this->Product_model->getProduct();
		$user = $this->User_model->getUser('email', $this->session->userdata('email'));
		$cart = ($user) ? $this->Cart_model->getCart($user->id) : [];
		$itemCart = ($cart) ? $this->Cart_model->getItemCart($cart->id, 3) : [];
		$data = [
			'title' => 'It\'s Better to Wear The Hijab · DalyRasya',
			'products' => $products,
			'ads' => $this->Ads_model->getAds(),
			'user' => $user,
			'carts' => ($user) ? $itemCart : [],
			'categories' => $this->Category_model->getCategory()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('welcome/index', $data);
		$this->load->view('templates/footer');
	}

	public function product_detail($slug)
	{
		$product = $this->Product_model->getProduct('slug', $slug);
		$user = $this->User_model->getUser('email', $this->session->userdata('email'));
		$cart = ($user) ? $this->Cart_model->getCart($user->id) : [];
		$itemCart = ($cart) ? $this->Cart_model->getItemCart($cart->id, 3) : [];
		if ($product) {
			$data = [
				'product' => $product,
				'title' => $product->product_name . ' · DalyRasya',
				'user' => $user,
				'carts' => ($user) ? $itemCart : []
			];
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('welcome/product_detail', $data);
			$this->load->view('templates/footer');
		} else {
			show_404();
		}
	}

	public function product_by_category($category)
	{
		$category = $this->Category_model->getCategory('category_name', $category);
		$categoryId = $category->id;
		$user = $this->User_model->getUser('email', $this->session->userdata('email'));
		$cart = ($user) ? $this->Cart_model->getCart($user->id) : [];
		$itemCart = ($cart) ? $this->Cart_model->getItemCart($cart->id, 3) : [];
		$product = $this->Product_model->getProduct('category_id', $categoryId);
		$data = [
			'category' => $category,
			'products' => $product,
			'title' => 'Produk ' . $category->category_name . ' · DalyRasya',
			'user' => $user,
			'carts' => ($user) ? $itemCart : []
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('welcome/product_by_category', $data);
		$this->load->view('templates/footer');
	}
}
