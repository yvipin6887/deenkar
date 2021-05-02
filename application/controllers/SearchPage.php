<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchPage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
        parent:: __construct();

		$this->load->helper('url', 'form');
		$this->load->library('session');
		$this->data=[];
    }
	public function index($search=null)
	{
		$this->load->database();
		// $this->load->Models('DashboardM');
		// echo 'session'. $this->session->userdata('username';
		// die();
		if( $this->session->userdata('username')!=''){
		$this->load->model('LoginM');	
		$this->data['lastaccess']=$this->LoginM->getUserLoginDetails();
		$this->data['visitcount']=$this->LoginM->getUserLoginCount();
		unset($this->LoginM);
		$this->load->model('SearchM');
		$this->data['newstudent']=$this->SearchM->getNewStudent($search);
		unset($this->LoginM);
	
		$this->data['search']=$search;
		$this->data['SecTitle']='Search';
		$this->load->view('header',$this->data);
		$this->load->view('search_page',$this->data);
		$this->load->view('footer',$this->data);
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		$this->db->close();
		
	}
	
}
