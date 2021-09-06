<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		$categories = $this->Categories_model->get_categories();

		$data = [
			'categories' => $categories
		];

		$this->twig->output('backend/categories/edit-browse', $data);
	}
}
