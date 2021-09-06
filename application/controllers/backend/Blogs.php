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

		$data = [
			'blogs' => $blogs
		];

		$this->twig->output('backend/blogs/edit-browse', $data);
	}
}
