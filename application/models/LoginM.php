<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginM extends CI_Model {

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
	function __construct() {
		parent::__construct();
		// $this->load->database();
    }
	public function getUserLoginDetails()
	{
		$this->db->select('users.barcode,users.usertype,users.name,users.username,login_logs.datetime,users.pic');
		$this->db->join('users','users.barcode=login_logs.barcode');
		$this->db->order_by('login_logs.id','desc');
		$this->db->limit('2');
		$query=$this->db->get('login_logs');
		$result=$query->result();
		return $result;
	}
	public function getUserLoginCount()
	{

		$this->db->select('count(login_logs.barcode) as visitcount');
		$this->db->Where('barcode',$this->session->userdata('barcode'));
		$query=$this->db->get('login_logs');
		$result=$query->result();
		return $result;
	}
	public function getClassList()
	{

		$this->db->select('classname');
		$this->db->where('branch',$this->session->userdata('branch'));
		$query=$this->db->get('classlist');
		$result=$query->result();
		return $result;
	}
	public function getRightFeatureList()
	{

		$this->db->select('viewname,weblink,webicone,onclickshow');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('rightsidebar','1');
		$this->db->like('accessby',$this->session->userdata('usertype'));
		$query=$this->db->get('features');
		$result=$query->result();
		// echo '<pre>';
		// print_r($result);
		// die();
		return $result;
	}
	public function getLeftFeatureList()
	{

		$this->db->select('viewname,weblink,webicone,onclickshow');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('leftsidebar','1');
		$this->db->like('accessby',$this->session->userdata('usertype'));
		$query=$this->db->get('features');
		$result=$query->result();
		// echo '<pre>';
		// print_r($result);
		// die();
		return $result;
	}
	
}
