<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('app_helper');

		$this->load->library('form_validation');
		$this->load->library('session');

		
		$this->data["title"] = "Main Title";
		$this->data["css_scripts"] = $this->load->view("scripts/css","",true);
		$this->data["js_scripts"] = $this->load->view("scripts/js","",true);
		$this->data["meta_scripts"] = $this->load->view("scripts/meta","",true);
		$this->data["announcements"] = "";
		

		

		$this->data["modaljs_scripts"] = $this->load->view("layouts/modals",'',true);
		

		($this->session->userdata("admin_sessions")?$navbar_data["navbar_is_logged_in"] = TRUE:$navbar_data["navbar_is_logged_in"] = FALSE);
		$this->data["navbar_scripts"] = $this->load->view("layouts/navbar",$navbar_data,true);

	}

	public function index($value='')
	{
		$this->data["title"] = "Home";
		$this->load->view("items",$this->data);
	}

	public function items($value='')
	{
		
		$this->data["title"] = "Items";
		$this->load->view("items",$this->data);
	}


}
