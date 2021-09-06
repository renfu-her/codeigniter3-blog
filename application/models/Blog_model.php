<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public $title;
	public $content;
	public $slug;
	public $created_at;
	public $updated_at;

	public function __construct()
	{
		parent::__construct();
		$this->database = 'blogs';
	}


	public function insert_entry()
	{
		$this->title    = $_POST['title'];
		$this->slug     = $_POST['slug'];
		$this->content  = $_POST['content'];
		$this->created_at  = time();

		$this->db->insert($this->database, $this);
	}

	public function update_entry()
	{
		$this->title    = $_POST['title'];
		$this->slug     = $_POST['slug'];
		$this->content  = $_POST['content'];
		$this->updated_at   = time();

		$this->db->update($this->database, $this, array('id' => $_POST['id']));
	}

	public function get_blog($id)
	{
		$this->db->select('blogs.*, categories.name as cname');
		$this->db->from('blogs');
		$this->db->join('categories', 'categories.id = blogs.category_id');
		$this->db->where('blogs.id',$id);
		$blog = $this->db->get();

		return $blog->result_array();
	}

	public function get_blogs()
	{
		$this->db->select('blogs.*, categories.name as cname');
		$this->db->from('blogs');
		$this->db->join('categories', 'categories.id = blogs.category_id');
		$blogs = $this->db->get();

		return $blogs->result_array();
	}
}
