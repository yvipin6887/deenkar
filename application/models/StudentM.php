<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentM extends CI_Model {

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
		$this->load->helper('string');
		// $this->load->database();
    }
	
	public function insert()
	{
		$this->load->database();
		// echo $_SERVER['REQUEST_URI'];
		$this->load->model('FileHandler');
		$filename=$this->FileHandler->imageHandler('Student');
		unset($this->FileHandler);
		// if(isset($filename1)){
		// 	$filename=$filename1;
		// }else{
		// 	$filename='';
		// }
		
		    $currentURL = current_url();
		     strtoupper(substr($currentURL,7,4));
			 $barcode=strtoupper(substr($currentURL,7,4).'-'.random_string('alnum',5).rand(5,10000));
			 if($filename!=''){
				$arrayi=array(
					'barcode'=>$barcode,
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
					'm_DOB'=>$this->input->post('DOB_m'),
					'm_mobile'=>$this->input->post('Contact_m'),
					'm_email'=>$this->input->post('Email_m'),
					'm_qualification'=>$this->input->post('Qualification_m'),
					'm_worktitle'=>$this->input->post('job_title_m'),
					'note'=>$this->input->post('note'),
					'datetime'=>date('Y-m-d H:n:s'),
			        'fdate'=>date('d-m-Y'),
			        'Date'=>date('Y-m-d'),
					'ip'=>$this->input->ip_address(),
					'username'=>$this->session->userdata('username'),
					'branch'=>$this->session->userdata('branch'),
					'academicyear'=>$this->session->userdata('academicyear'),
					'institute'=>$this->session->userdata('institute'),
					's_pic'=>$filename
								);
			 }else{
				$filename='./uploads/profiles/student.png';
				$arrayi=array(
					'barcode'=>$barcode,
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
					'm_DOB'=>$this->input->post('DOB_m'),
					'm_mobile'=>$this->input->post('Contact_m'),
					'm_email'=>$this->input->post('Email_m'),
					'm_qualification'=>$this->input->post('Qualification_m'),
					'm_worktitle'=>$this->input->post('job_title_m'),
					'note'=>$this->input->post('note'),
					'datetime'=>date('Y-m-d H:n:s'),
			        'fdate'=>date('d-m-Y'),
			        'Date'=>date('Y-m-d'),
					'ip'=>$this->input->ip_address(),
					'username'=>$this->session->userdata('username'),
					'branch'=>$this->session->userdata('branch'),
					'academicyear'=>$this->session->userdata('academicyear'),
					'institute'=>$this->session->userdata('institute'),
					's_pic'=>$filename
								);
			 }
		
		// echo '<pre>';
		// print_r($arrayi);
		// die();
		$this->db->insert('student',$arrayi);
		$this->db->close();
	}
	public function update()
	{
		$this->load->database();
		// echo $_SERVER['REQUEST_URI'];
		// $this->load->model('FileHandler');
		// $filename=$this->FileHandler->imageHandler('Student');
		// unset($this->FileHandler);
		// if(isset($filename1)){
		// 	$filename=$filename1;
		// }else{
		// 	$filename='';
		// }
		$barcode=$this->input->post('editbarocde');
		
		   $filename='';
			 if($filename!=''){
				$arrayi=array(
					'firstname'=>$this->input->post('editfirstname'),
					'middlename'=>$this->input->post('editmiddlename'),
					'lastname'=>$this->input->post('editlastname'),
					'gender'=>$this->input->post('editgender'),
					'dateofbirth'=>$this->input->post('editDOB'),
					'mobile'=>$this->input->post('editContact'),
					'email'=>$this->input->post('editEmail'),
					'class'=>$this->input->post('editclassname'),
					'source'=>$this->input->post('editSource'),
					'country'=>$this->input->post('editCountry'),
					'state'=>$this->input->post('editState'),
					'city'=>$this->input->post('editCity'),
					'address'=>$this->input->post('editAddress'),
					'fathername'=>$this->input->post('editfathername'),
					'f_DOB'=>$this->input->post('editDOB_f'),
					'f_mobile'=>$this->input->post('editContact_f'),
					'f_email'=>$this->input->post('editEmail_f'),
					'f_qualification'=>$this->input->post('editQualification'),
					'f_worktitle'=>$this->input->post('editjob_title'),
					'mothername'=>$this->input->post('editfullname_m'),
					'm_DOB'=>$this->input->post('editDOB_m'),
					'm_mobile'=>$this->input->post('editContact_m'),
					'm_email'=>$this->input->post('editEmail_m'),
					'm_qualification'=>$this->input->post('editQualification_m'),
					'm_worktitle'=>$this->input->post('editjob_title_m'),
					'note'=>$this->input->post('editnote'),
					'datetime'=>date('Y-m-d H:n:s'),
			        'fdate'=>date('d-m-Y'),
			        'Date'=>date('Y-m-d'),
					'ip'=>$this->input->ip_address(),
					'username'=>$this->session->userdata('username'),
					'branch'=>$this->session->userdata('branch'),
					'academicyear'=>$this->session->userdata('academicyear'),
					'institute'=>$this->session->userdata('institute'),
					's_pic'=>$filename
								);
			 }else{
				$arrayi=array(
					'firstname'=>$this->input->post('editfirstname'),
					'middlename'=>$this->input->post('editmiddlename'),
					'lastname'=>$this->input->post('editlastname'),
					'gender'=>$this->input->post('editgender'),
					'dateofbirth'=>$this->input->post('editDOB'),
					'mobile'=>$this->input->post('editContact'),
					'email'=>$this->input->post('editEmail'),
					'class'=>$this->input->post('editclassname'),
					'source'=>$this->input->post('editSource'),
					'country'=>$this->input->post('editCountry'),
					'state'=>$this->input->post('editState'),
					'city'=>$this->input->post('editCity'),
					'address'=>$this->input->post('editAddress'),
					'fathername'=>$this->input->post('editfathername'),
					'f_DOB'=>$this->input->post('editDOB_f'),
					'f_mobile'=>$this->input->post('editContact_f'),
					'f_email'=>$this->input->post('editEmail_f'),
					'f_qualification'=>$this->input->post('editQualification'),
					'f_worktitle'=>$this->input->post('editjob_title'),
					'mothername'=>$this->input->post('editfullname_m'),
					'm_DOB'=>$this->input->post('editDOB_m'),
					'm_mobile'=>$this->input->post('editContact_m'),
					'm_email'=>$this->input->post('editEmail_m'),
					'm_qualification'=>$this->input->post('editQualification_m'),
					'm_worktitle'=>$this->input->post('editjob_title_m'),
					'note'=>$this->input->post('editnote'),
					'datetime'=>date('Y-m-d H:n:s'),
			        'fdate'=>date('d-m-Y'),
			        'Date'=>date('Y-m-d'),
					'ip'=>$this->input->ip_address(),
					'username'=>$this->session->userdata('username'),
					'branch'=>$this->session->userdata('branch'),
					'academicyear'=>$this->session->userdata('academicyear'),
					'institute'=>$this->session->userdata('institute')
								);
			 }
		
		// echo '<pre>';
		// print_r($arrayi);
		// die();
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('barcode',$barcode);
		$this->db->update('student',$arrayi);
		$this->db->close();
	}
	public function delete(){
		$this->load->database();
		$id=$this->input->post('deleteid');
		$this->db->where('id',$id);
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->delete('student');
		$this->db->close();
		return '';
	}
	
	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
}
