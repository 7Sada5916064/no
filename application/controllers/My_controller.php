<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
    }
	
	public function wtd_view($view,$data,$show=true){
		$d = '';
		$this->load->view('header');
		$this->load->view($view,$data);

	}
}
?>