<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewStudentList extends CI_Controller {

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
	
	public function getNewStudentData(){
		$this->load->database();
		$this->db->select('*');
		// print_r(json_decode($_POST));
		// echo $this->input->post('id');
		if($this->input->post('id')!=null && !empty($this->input->post('id'))){
		$this->db->where('id',$this->input->post('id'));
		}
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->order_by('id','desc');
		$query=$this->db->get('newstudent');
		$result=$query->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
		// echo json_encode(array($result));
		$this->db->close();
	}
	
	public function getStatusData(){
		$this->load->database();
		$this->db->select('name');
		$this->db->where('branch',$this->session->userdata('branch'));
		$query=$this->db->get('inquiry_status');
		$result=$query->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function changestatus(){
		$this->load->database();
		$status=$this->input->post('status');
		$id=$this->input->post('id');
		$this->db->select('id');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('status',$status);
		$this->db->where('id',$id);
		$query=$this->db->get('newstudent');
		// $result=$query->result();
		if($query->num_rows()>0){
			return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
		}else{
			$arrayu=array(
				'status'=>$status
			);
			$this->db->where('branch',$this->session->userdata('branch'));
			// $this->db->where('status',$status);
			$this->db->where('id',$id);
			$this->db->update('newstudent',$arrayu);
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function addStatusData(){
		$this->load->database();
		$status=$this->input->post('status');
		// $text_color=$this->input->post('text_color');
		// $bg_color=$this->input->post('bg_color');
		$text_color='#ffff';
		$bg_color='#ffff';
		$this->db->select('id');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('name',$status);
		$query=$this->db->get('inquiry_status');
		// $result=$query->result();
		if($query->num_rows()>0){
			return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
		}else{
			$arrayu=array(
				'name'=>$status,
				'branch'=>$this->session->userdata('branch'),
				'bg_color'=>$bg_color,
				'text_color'=>$text_color,
				'username'=>$this->session->userdata('username'),
				'datetime'=>date('Y/m/d H:n:s'),
				'ip'=>$this->input->ip_address()

			);
			$this->db->where('branch',);
			$this->db->insert('inquiry_status',$arrayu);
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
		// echo json_encode(array($result));
		$this->db->close();
	}
	
	
	
}
