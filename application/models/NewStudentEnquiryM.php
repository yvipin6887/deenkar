<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewStudentEnquiryM extends CI_Model {

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
	public function insert()
	{
		$this->load->database();
		$arrayi=array(
			'firstname'=>$this->input->post('firstname'),
			'middlename'=>$this->input->post('middlename'),
			'lastname'=>$this->input->post('lastname'),
			'gender'=>$this->input->post('gender'),
			'dateofbirth'=>$this->input->post('DOB'),
			'mobile'=>$this->input->post('Contact'),
			'email'=>$this->input->post('Email'),
			'class'=>$this->input->post('classname'),
			'source'=>$this->input->post('Source'),
			'country'=>$this->input->post('Country'),
			'state'=>$this->input->post('State'),
			'city'=>$this->input->post('City'),
			'address'=>$this->input->post('Address'),
			'fathername'=>$this->input->post('fathername'),
			'f_DOB'=>$this->input->post('DOB_f'),
			'f_mobile'=>$this->input->post('Contact_f'),
			'f_email'=>$this->input->post('Email_f'),
			'f_qualification'=>$this->input->post('Qualification'),
			'f_worktitle'=>$this->input->post('job_title'),
			'mothername'=>$this->input->post('fullname_m'),
			'm_mobile'=>$this->input->post('Contact_m'),
			'm_email'=>$this->input->post('Email_m'),
			'm_DOB'=>$this->input->post('DOB_m'),
			'm_qualification'=>$this->input->post('Qualification_m'),
			'm_worktitle'=>$this->input->post('job_title_m'),
			'note'=>$this->input->post('note'),
			'status'=>'Open',
			'datetime'=>date('Y-m-d H:n:s'),
			'fdate'=>date('d-m-Y'),
			'Date'=>date('Y-m-d'),
			'ip'=>$this->input->ip_address(),
			'username'=>$this->session->userdata('username'),
			'branch'=>$this->session->userdata('branch'),
			'institute'=>$this->session->userdata('institute')
						);
		$this->db->insert('newstudent',$arrayi);
		$this->db->close();
	}
	public function update()
	{
		$this->load->database();
		$arrayu=array(
			'firstname'=>$this->input->post('firstname'),
			'middlename'=>$this->input->post('middlename'),
			'lastname'=>$this->input->post('lastname'),
			'gender'=>$this->input->post('gender'),
			'dateofbirth'=>$this->input->post('DOB'),
			'mobile'=>$this->input->post('Contact'),
			'email'=>$this->input->post('Email'),
			'class'=>$this->input->post('classname'),
			'source'=>$this->input->post('Source'),
			'state'=>$this->input->post('State'),
			'country'=>$this->input->post('Country'),
			'city'=>$this->input->post('City'),
			'address'=>$this->input->post('Address'),
			'fathername'=>$this->input->post('fathername'),
			'f_DOB'=>$this->input->post('DOB_f'),
			'f_mobile'=>$this->input->post('Contact_f'),
			'f_email'=>$this->input->post('Email_f'),
			'f_qualification'=>$this->input->post('Qualification'),
			'f_worktitle'=>$this->input->post('job_title'),
			'mothername'=>$this->input->post('fullname_m'),
			'm_DOB'=>$this->input->post('DOB_m'),
			'm_mobile'=>$this->input->post('Contact_m'),
			'm_email'=>$this->input->post('Email_m'),
			'm_qualification'=>$this->input->post('Qualification_m'),
			'm_worktitle'=>$this->input->post('job_title_m'),
			'note'=>$this->input->post('note'),
			'note'=>$this->input->post('note'),
			'datetime'=>date('Y-m-d H:n:s'),
			'fdate'=>date('d-m-Y'),
			'Date'=>date('Y-m-d'),
			'ip'=>$this->input->ip_address(),
			'username'=>$this->session->userdata('username'),
			'branch'=>$this->session->userdata('branch'),
			'institute'=>$this->session->userdata('institute')
						);

		$updateid=$this->input->post('updateid');
		
		$this->db->where('id',$updateid);
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('institute',$this->session->userdata('institute'));
		$this->db->update('newstudent',$arrayu);
		$this->db->close();
	}
	public function getNewStudentData($id){
		$this->load->database();
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->where('branch',$this->session->userdata('branch'));
		$query=$this->db->get('newstudent');
		$result=$query->result();
		return $result;
		$this->db->close();
	}
	public function delete(){
		$this->load->database();
		$id=$this->input->post('deleteid');
		$this->db->where('id',$id);
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->delete('newstudent');
		$this->db->close();
		return '';
	}
	
}
