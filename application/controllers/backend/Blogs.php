<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		$blogs = $this->Blog_model->get_blogs();
		$categories = $this->Categories_model->get_categories();

		$data = [
			'blogs' => $blogs,
			'categories' => $categories,
		];

		$this->twig->output('backend/blogs/edit-browse', $data);
	}
}
