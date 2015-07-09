<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index()
	{
		echo "This is the index!";
	}

	public function show($userId = 0)
	{
		$userId = (int)$userId;
		echo "This is show users!<br>";
		if ($userId > 0) {
			echo "This is show user: $userId!<br>";
		}

		$this->load->model("hello_model");
		$profile = $this->hello_model->getProfile("Huzaifa");
		
		$data = array('name'=>$profile['fullName']);
		$this->load->view('header',$data);
		
	}
}
?>