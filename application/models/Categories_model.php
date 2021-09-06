<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

	public $name;
	public $created_at;
	public $updated_at;

	public function __construct()
	{
		parent::__construct();
		$this->database = 'categories';
	}


	public function insert_entry()
	{
		$this->name    = $_POST['name'];
		$this->created_at  = time();

		$this->db->insert($this->database, $this);
	}

	public function update_entry()
	{
		$this->title    = $_POST['name'];
		$this->updated_at   = time();

		$this->db->update($this->database, $this, array('id' => $_POST['id']));
	}

	public function get_category($id)
	{
		$category = $this->db->get($this->database, array('id' => $id));

		return $category->result_array();
	}

	public function get_categories()
	{

		$categories = $this->db->get($this->database);

		return $categories->result_array();
	}
}
