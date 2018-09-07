<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('plantillas/frontend/header');
		$this->load->view('menu');
		$this->load->view('plantillas/frontend/footer');
	}

	public function login() {  
       
    }
	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */