<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {

        $data = [
            'posts' => $this->post_model->get_all_data()
        ];

        $this->twig->display('home', $data);
    }
}
