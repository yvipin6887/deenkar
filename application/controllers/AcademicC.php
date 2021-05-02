<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AcademicC extends CI_Controller {

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
	
	public function insertAcademicData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// echo '<pre>';
			// print_r($request);
			// die();
			$this->db->select('id');
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('academic',$request['academicname']);
			$query=$this->db->get('academic');
			// $result=$query->result();
			if($query->num_rows()>0){
				return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
			}else{
				if(isset($request['active'])){
					if($request['active']=='1'){
						$active='1';
					}else{
						$active='0';
					}
				}else{
					$active='0';
				}
				
				// echo  $request['todate'];
				$date1=DateTime::createFromFormat('d/m/Y',$request['fromdate']);
				$date2=DateTime::createFromFormat('d/m/Y',$request['todate']);
				$fromdate=$date1->format('Y-m-d');
				$todate=$date2->format('Y-m-d');
				$arrayi=array(
					'academic'=>$request['academicname'],
					'fromdate'=>$fromdate,
					'todate'=>$todate,
					'active'=>$active,
					'branch'=>$this->session->userdata('branch'),
					'datetime'=>date('Y-m-d H:i:s'),
					'ip'=>$this->input->ip_address(),
					'user'=>$this->session->userdata('username'),
		
				);
				// echo '<pre>';
				// print_r($arrayi);
				$this->db->insert('academic',$arrayi);
				return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			}
			
			// echo json_encode(array($result));
			$this->db->close();
		}
	public function updateAcademicData(){
			$this->load->database();
				$request=json_decode(file_get_contents('php://input'),TRUE);
				$date1=DateTime::createFromFormat('d/m/Y',$request['fromdate']);
				$date2=DateTime::createFromFormat('d/m/Y',$request['todate']);
				$fromdate=$date1->format('Y-m-d');
				$todate=$date2->format('Y-m-d');
				if(isset($request['active'])){
					if($request['active']=='1'){
						$active='1';
					}else{
						$active='0';
					}
					$arrayi=array(
						'academic'=>$request['academicname'],
						'fromdate'=>$fromdate,
						'todate'=>$todate,
						'active'=>$active,
						'branch'=>$this->session->userdata('branch'),
						'datetime'=>date('Y-m-d H:i:s'),
						'ip'=>$this->input->ip_address(),
						'user'=>$this->session->userdata('username'),
			
					);
				}else{
					$arrayi=array(
						'academic'=>$request['academicname'],
						'fromdate'=>$fromdate,
						'todate'=>$todate,
						'branch'=>$this->session->userdata('branch'),
						'datetime'=>date('Y-m-d H:i:s'),
						'ip'=>$this->input->ip_address(),
						'user'=>$this->session->userdata('username'),
			
					);
				}
				
				// echo '<pre>';
				// print_r($arrayi);
				$this->db->where('id',$request['updateid']);
				$this->db->update('academic',$arrayi);
				return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			
			
			// echo json_encode(array($result));
			$this->db->close();
		}
		public function deleteAcademic(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			$this->db->where('id',$request['deleteid']);
			$this->db->delete('academic');
			return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			$this->db->close();
		}
		public function getAcademicData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// print_r($request);
			$this->db->select('id,branch,academic,DATE_FORMAT(fromdate, "%d/%m/%Y")as fromdate,
			DATE_FORMAT(todate, "%d/%m/%Y")as todate,
			active');
			$this->db->where('branch',$this->session->userdata('branch'));
			if(isset($request['id']) && $request['id']!=null){
				$this->db->where('id',$request['id']);
			}
			$query=$this->db->get('academic');
			$result=$query->result();
			return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			$this->db->close();	
		}
		public function getSemesterData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// print_r($request);
			$this->db->select('id,branch,academic,semester,DATE_FORMAT(fromdate, "%d/%m/%Y")as fromdate,
			DATE_FORMAT(todate, "%d/%m/%Y")as todate,
			active');
			$this->db->where('branch',$this->session->userdata('branch'));
			if(isset($request['id']) && $request['id']!=null){
				$this->db->where('id',$request['id']);
			}
			$query=$this->db->get('semester');
			$result=$query->result();
			return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			$this->db->close();	
		}
		public function insertSemesterData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// echo '<pre>';
			// print_r($request);
			// die();
			$this->db->select('id');
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('academic',$request['academicname']);
			$this->db->where('semester',$request['Semestername']);
			$query=$this->db->get('semester');
			// $result=$query->result();
			if($query->num_rows()>0){
				return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
			}else{
				if(isset($request['active'])){
					if($request['active']=='1'){
						$active='1';
					}else{
						$active='0';
					}
				}else{
					$active='0';
				}
				
				// echo  $request['todate'];
				$date1=DateTime::createFromFormat('d/m/Y',$request['fromdate']);
				$date2=DateTime::createFromFormat('d/m/Y',$request['todate']);
				$fromdate=$date1->format('Y-m-d');
				$todate=$date2->format('Y-m-d');
				$arrayi=array(
					'academic'=>$request['academicname'],
					'semester'=>$request['Semestername'],
					'fromdate'=>$fromdate,
					'todate'=>$todate,
					'active'=>$active,
					'branch'=>$this->session->userdata('branch'),
					'datetime'=>date('Y-m-d H:i:s'),
					'ip'=>$this->input->ip_address(),
					'user'=>$this->session->userdata('username'),
		
				);
				// echo '<pre>';
				// print_r($arrayi);
				$this->db->insert('semester',$arrayi);
				return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			}
			
			// echo json_encode(array($result));
			$this->db->close();
		}
	}
