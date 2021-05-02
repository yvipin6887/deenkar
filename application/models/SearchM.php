<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchM extends CI_Model {

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
	public function getNewStudent($data){
		$this->load->database();
		$this->db->select('*');
		$this->db->like('firstname',$data);
		$this->db->or_like('lastname',$data);
		$this->db->where('branch',$this->session->userdata('branch'));
		$query=$this->db->get('newstudent');
		$result=$query->result();
		return $result;
		$this->db->close();
	}
	public function getStudent($data){
		$this->load->database();
		$this->db->select('*');
		$this->db->like('firstname',$data);
		$this->db->or_like('lastname',$data);
		$this->db->or_like('barcode',$data);
		$this->db->where('branch',$this->session->userdata('branch'));
		$query=$this->db->get('student');
		$result=$query->result();
		return $result;
		$this->db->close();
	}
	
}
