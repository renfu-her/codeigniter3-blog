<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Category extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->database = 'categories';
	}

	public function index_get($id = 0){

		if(!empty($id)){
			$data = $this->db->get_where($this->database, ['id' => $id])->row_array();
		}else{
			$data = $this->db->get($this->database)->result();
		}

		$this->response($data, REST_Controller::HTTP_OK);

	}

	public function index_post()
	{
		$input = $this->input->post();
		$input['created_at'] = date("Y-m-d H:i:s");
		$input['updated_at'] = date("Y-m-d H:i:s");
		$this->db->insert($this->database, $input);

		$this->response(['Blog created successfully.'], REST_Controller::HTTP_OK);
	}

	public function index_put($id)
	{
		$input = $this->put();
		unset($input['id']);
		$this->db->update($this->database, $input, "`id` = $id");

		$this->response(['Blog updated successfully.'], REST_Controller::HTTP_OK);
	}

	public function index_delete($id)
	{
		$this->db->delete($this->database, array('id'=>$id));

		$this->response(['Blog deleted successfully.'], REST_Controller::HTTP_OK);
	}

}
