<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

		$this->load->view('login');
	}
	public function loginUser()
	{
		// $this->load->helper('url');
		// $this->load->helper('session');
		$this->load->database();
		$username=$this->input->post('Username');
		$password=$this->input->post('Password');
		$this->db->select('*');
		$this->db->Where('username',$username);
		$this->db->Where('password',$password);
		$query=$this->db->get('users');
		$result=$query->result();
		if(count($result)!=0 && !empty($result)){
			$this->session->set_userdata('userbarcode',$result[0]->barcode);
			$this->session->set_userdata('username',$result[0]->username);
			$this->session->set_userdata('name',$result[0]->name);
			$this->session->set_userdata('userpic',$result[0]->pic);
			$this->session->set_userdata('usertype',$result[0]->usertype);
			$this->session->set_userdata('branch',$result[0]->branch);
			$this->session->set_userdata('institute',$result[0]->institute);
			$this->session->set_userdata('barcode',$result[0]->barcode);
        $arraylog=array(
			'branch'=>$result[0]->branch,
			'barcode'=>$result[0]->barcode,
			'datetime'=>date('Y/m/d H:n:s'),
			'Date'=>date('Y/m/d'),
			'usertype'=>$result[0]->usertype,
			'ip'=>$this->input->ip_address()
		);
		$this->db->insert('login_logs',$arraylog);
		 $this->db->insert_id();
		//  redirect(base_url().'index.php/Dashboard');
		 echo json_encode('Go');
		}else{
	   echo json_encode('<div class="alert alert-warning alert-dismissible">
	   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	   <strong>Warning!</strong> Wrong Username or Password.
	 </div>');
		}
		
		$this->db->close();


	}
	public function logout()
	{
		// $this->load->helper('url');
		// $this->load->helper('session');
		$this->load->database();
		
			$this->session->unset_userdata('userbarcode','');
			$this->session->unset_userdata('username','');
			$this->session->unset_userdata('name','');
			$this->session->unset_userdata('userpic','');
			$this->session->unset_userdata('usertype','');
			echo json_encode('logout');
		$this->db->close();

	}
	public function user_register(){
		$this->load->database();
		$username=$this->input->post('Username');
		$password=$this->input->post('Password');
		$mobileno=$this->input->post('mobileno');
		$this->db->select('*');
		$this->db->where('username',$username);
		$result=$this->db->get('user')->nums_row();
		if($result>0){
			echo json_encode('Allready');
		}else{
			$this->db->select('*');
			$this->db->where('mobile',$mobileno);
			$result1=$this->db->get('allusers')->nums_row();
			if($result1>0){
				$result2=$this->db->get('allusers')->result_array();
			}else{
				$this->db->select('*');
				$this->db->where('mobile',$mobileno);
				$result3=$this->db->get('student')->nums_row();
				if($result3>0){
				$result4=$this->db->get('student')->result_array();
				echo '<pre>';
				print_r($result41);
				die();
				//    $arrat1=array(
				// 	   'branch'=>
				// 	   'barcode'=>
				// 	   'name'=>
				// 	   'username'=>
				// 	   'password'=>
				// 	   'department'=>
				// 	   'usertype'=>
				// 	   'institute'=>
				// 	   'pic'=>
				// 	   'Date'=>
				// 	   'datetime'=>
				// 	   'ip'=>
				//    );
				}else{
					echo json_encode('Invailid');
				}
			}	
		}

		$this->db->close();
	}
}
