<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

        $this->load->helper('url');
        $this->load->library('session');
    }
	public function index()
	{
		$this->load->database();
		// $this->load->Models('DashboardM');
		// echo 'session'. $this->session->userdata('username';
		// die();
		if( $this->session->userdata('username')!=''){
		$this->db->select('count(login_logs.barcode) as visitcount');
		$this->db->Where('barcode','DEEN-5432345');
		$query1=$this->db->get('login_logs');
		$this->data['visitcount']=$query1->result();
		$this->db->select('users.barcode,users.usertype,users.name,users.username,login_logs.datetime');
		$this->db->join('users','users.barcode=login_logs.barcode');
		$this->db->order_by('login_logs.id','desc');
		$this->db->limit('2');
		$query=$this->db->get('login_logs');
		$result=$query->result();
		$this->data['lastaccess']=$result;
		$this->data['title']='Dashboard';
		$this->data['SecTitle']='Dashboard';
		$this->load->view('header',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->load->view('footer',$this->data);
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		
		$this->db->close();
		
	}
	public function getallusers()
	{
		$this->load->helper('url');
		$this->load->database();
		$this->db->select('*');
		$query=$this->db->get('allusers');
		$result=$query->result();
		echo json_encode($result);


	}
}
