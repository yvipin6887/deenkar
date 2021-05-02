<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentC extends CI_Controller {

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
	
	public function insertStudentData(){
		$this->load->database();
		$request=json_decode(file_get_contents('php://input'),TRUE);
		echo '<pre>';
		print_r($request);
		// $this->db->select('name');
		// $this->db->where('branch',$this->session->userdata('branch'));
		// $query=$this->db->get('inquiry_status');
		// $result=$query->result();
		// return $this->output->set_content_type('application/json')->set_output(json_encode($result));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function getStudentData(){
		$this->load->database();
		$this->db->select('*');
		// print_r(json_decode($_POST));
		// echo $this->input->post('id');
		if($this->input->post('id')!=null && !empty($this->input->post('id'))){
		$this->db->where('id',$this->input->post('id'));
		}
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->order_by('id','desc');
		$query=$this->db->get('student');
		$result=$query->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
		// echo json_encode(array($result));
		$this->db->close();
	}
	
	public function fetchStudentData(){
		$this->load->database();
		$classname=json_decode(file_get_contents('php://input'),TRUE);
		// echo '<pre>';
		// print_r($classname);
		// echo $classname['classname'];
		$this->db->select("concat(firstname,'',lastname)as fullname,class,s_pic,gender,barcode,rollno");
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('class',$classname['classname']);
		$query=$this->db->get('student');
		$result=$query->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function updaterollnoStudentData(){
		$this->load->database();
		$studentdata=json_decode(file_get_contents('php://input'),TRUE);
		// echo '<pre>';
		// print_r($studentdata['rollno']);
		// echo $classname['classname'];
		$i=0;
		foreach($studentdata['barcode'] as $value){
			$arrayr=array(
				'rollno'=>$studentdata['rollno'][$i]
			);
		// 	echo '<pre>';
		// print_r($arrayr);
		// echo $value;
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('barcode',$value);
			$this->db->update('student',$arrayr);
			$i++;
		}
		

		return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function sendStudentMail(){
		$this->load->database();
		$this->load->model('Emailer');
		$response=$this->Emailer->sendMail();
		unset($this->NewStudentEnquiryM);
		$this->db->close();
	}
	public function getTotalStudentCount(){
		$this->load->database();
		$this->db->select('count(id) as totalstudent');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('academicyear',$this->session->userdata('academicyear'));
		$query=$this->db->get('student');
		$result=$query->result();
		$this->db->select('count(id) as totalmale');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('academicyear',$this->session->userdata('academicyear'));
		$this->db->where('gender','Male');
		$querym=$this->db->get('student');
		$resultm=$querym->result();
		$this->db->select('count(id) as totalfemale');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('academicyear',$this->session->userdata('academicyear'));
		$this->db->where('gender','Female');
		$queryfm=$this->db->get('student');
		$resultfm=$queryfm->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode(array('result'=>$result,'result1'=>$resultm,'result2'=>$resultfm)));
	}
	
}
