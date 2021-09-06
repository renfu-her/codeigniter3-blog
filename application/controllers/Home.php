<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
	}

	public function index(){

		$blogs = $this->Blog_model->get_blogs();

		$data = [
			'blogs' => $blogs,
		];

		$this->twig->output('home', $data);
	}
}
