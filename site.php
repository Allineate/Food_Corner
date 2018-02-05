<?php

class Site extends CI_Controller {

	function members_area() {
		$this->load->view('members_area');
	}
	function error_area() {
		$this->load->view('error_area');
	}
}