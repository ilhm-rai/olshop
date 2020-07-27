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
		user_check();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Ads_model');
	}

	public function index()
	{
		$products = $this->Product_model->getProduct();
		$data = [
			'title' => 'It\'s Better to Wear The Hijab · DalyRasya',
			'products' => $products,
			'ads' => $this->Ads_model->getAds(),
			'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/index', $data);
		$this->load->view('templates/footer');
	}

	public function product_detail($slug)
	{
		$product = $this->Product_model->getProduct($slug);
		$data = [
			'product' => $product,
			'title' => $product->product_name . ' | DalyRasya',
			'user' => $this->User_model->getUser('email', $this->session->userdata('email'))
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/product/product_detail', $data);
		$this->load->view('templates/footer');
	}
}
