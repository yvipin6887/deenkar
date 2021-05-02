<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewStudentListM extends CI_Model {

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
	public function getTotalStatusCount(){
		$this->load->database();
		$this->db->select('count(id) as totalstatus');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('status !=','');
		$query=$this->db->get('newstudent');
		$result=$query->result();
		return $result;
	}
	public function getStatusBYCount(){
		$this->load->database();
		$this->db->select('status,count(status) as statuscount');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('status !=','');
		$this->db->group_by('status');
		$query=$this->db->get('newstudent');
		$result=$query->result();
		return $result;
	}
	
}
