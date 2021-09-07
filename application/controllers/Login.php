<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * admin 的登入
	 * 一定要 session 是 login_user 才可以
	 */
	public function index()
	{

		if($this->session->userdata('admin_login') != ''){
			redirect('backend/home');
		}

		$result = [];

		if(!empty($_POST['submit'])){

			$data = $_POST;

			$chk_valid = $this->System_model->login_valid($data['email'], $data['password']);

			if(!empty($chk_valid)){
				$this->session->set_userdata('admin_login', $chk_valid[0]['username']);
				$this->session->set_userdata('admin_id', $chk_valid[0]['id']);

				redirect('backend');
			} else {
				$result['errMsg'] = '登入發生錯誤，請再重新登入！';
			}
		}
		$this->twig->output('backend/login', $result);
	}

}
