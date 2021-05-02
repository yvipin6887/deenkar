<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeesC extends CI_Controller {

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
	
	public function insertProfileData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// echo '<pre>';
			// print_r($request);
			// die();
			$this->db->select('id');
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('profilename',$request['feesprofile']);
			$query=$this->db->get('feesprofiles');
			// $result=$query->result();
			if($query->num_rows()>0){
				return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
			}else{
				$arrayi=array(
					'academic'=>$this->session->userdata('academicyear'),
					'profilename'=>$request['feesprofile'],
					'branch'=>$this->session->userdata('branch'),
					'datetime'=>date('Y-m-d H:i:s'),
					'ip'=>$this->input->ip_address(),
					'user'=>$this->session->userdata('username'),
		
				);
				// echo '<pre>';
				// print_r($arrayi);
				$this->db->insert('feesprofiles',$arrayi);
				return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			}
			
			// echo json_encode(array($result));
			$this->db->close();
		}
	public function updateprofileData(){
			$this->load->database();
				$request=json_decode(file_get_contents('php://input'),TRUE);
				$arrayi=array(
					'academic'=>$this->session->userdata('academicyear'),
					'profilename'=>$request['profilename'],
					'branch'=>$this->session->userdata('branch'),
					'datetime'=>date('Y-m-d H:i:s'),
					'ip'=>$this->input->ip_address(),
					'user'=>$this->session->userdata('username'),
		
				);
				
				
				// echo '<pre>';
				// print_r($arrayi);
				$this->db->where('id',$request['updateid']);
				$this->db->update('feesprofiles',$arrayi);
				return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			
			
			// echo json_encode(array($result));
			$this->db->close();
		}
		public function deleteFeesProfile(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			$this->db->where('id',$request['deleteid']);
			$this->db->delete('feesprofiles');
			return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			$this->db->close();
		}
		public function getFeesprofilesData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// print_r($request);
			$this->db->select('id,profilename,branch');
			$this->db->where('branch',$this->session->userdata('branch'));
			if(isset($request['id']) && $request['id']!=null){
				$this->db->where('id',$request['id']);
			}
			$query=$this->db->get('feesprofiles');
			$result=$query->result();
			return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			$this->db->close();	
		}
		public function insetFeesAssignData(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			
			$this->db->select('barcode,class');
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('academicyear',$this->session->userdata('academicyear'));
			$this->db->where_in('class',$request['selectedclassname']);
			$query=$this->db->get('student');
			$result=$query->result();
			$install_amount =explode(',',rtrim($request['install_amount'],','));
			$profileid=explode('||',$request['selectedprofile']);
			foreach($result as $value){
				$inarray=array(
					'academic'=>$this->session->userdata('academicyear'),
					'branch'=>$this->session->userdata('branch'),
					'barcode'=>$value->barcode,
					'classname'=>$value->class,
					'profile_id'=>$profileid[0],
					'actul_fees'=>$request['actulefeesid'],
					'discount'=>$request['discountfeesid'],
					'net_fees'=>$request['netfeesid'],
					'installment'=>$request['selectedinstall'],
					'datetime'=>date('Y-m-d H:i:s'),
					'date'=>date('Y-m-d'),
					'ip'=>$this->input->ip_address(),
					'user'=>$this->session->userdata('username'),
				);
				$i=0;
				$l=1;
				for($i;$i<count($install_amount);$i++){
					$inarray['install_'.$l.'']=$install_amount[$i];
					$l++;
				}
				$this->db->insert('feesassign',$inarray);
			}	
			return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			$this->db->close();	
		}
		public function getAssignFeesdata(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// print_r($request);
			$this->db->select('student.barcode,student.s_pic,student.class,student.firstname,student.lastname,feesprofiles.profilename,net_fees,actul_fees,discount,installment');
			$this->db->where('student.branch',$this->session->userdata('branch'));
			$this->db->where('student.academicyear',$this->session->userdata('academicyear'));
			$this->db->join('feesassign','feesassign.barcode=student.barcode','left');
			$this->db->join('feesprofiles','feesprofiles.id=feesassign.profile_id','left');
			if(isset($request['id']) && $request['id']!=null){
				$this->db->where('feesprofiles.id',$request['id']);
			}
			if(isset($request['barcode']) && $request['barcode']!=null){
				$this->db->where('feesassign.barcode',$request['barcode']);
			}
			$query=$this->db->get('student');
			$result=$query->result();
			return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			$this->db->close();	
		}
	
		public function getCollectedFeesdata(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// print_r($request);
			$oderby='`student`.`firstname` asc';
			$install='';
			$where='';
			if(isset($request['selectedinstall']) && $request['selectedinstall']!=''){
			  $install=',install_'.$request['selectedinstall'].' as install';
			  $where='and feescollection.coll_install='.$request['selectedinstall'];
			}
			$where1='';
				if(isset($request['barcode']) && $request['barcode']!=null){
					$where1='and feesassign.barcode="'.$request['barcode'].'"';
					$oderby='`student`.`barcode` DESC';
					}		
			$query=$this->db->query('select *,sum(`net_fees`)as net_fees1,sum(`actul_fees`)as actul_fees1
		from ( select `student`.`barcode`,`student`.`s_pic`,`student`.`class`,`student`.`firstname`,
				`installment`,`student`.`lastname`,net_fees,actul_fees,`discount`,group_concat(`coll_install`) as coll_install,
				sum(`collectedamount`)as collectedamount,`feesassign`.`id` as `assign_id`,
				`feesassign`.`classname`,`install_remaining` '.$install.' from `student` join `feesassign` on
				`feesassign`.`barcode` = `student`.`barcode`
				 left join `feescollection` on
				`feescollection`.`barcode` = `feesassign`.`barcode` and `feescollection`.`assign_id` = `feesassign`.`id` '.$where.'
			where `student`.`branch` = "'.$this->session->userdata('branch').'" and `student`.`academicyear` = "'.$this->session->userdata('academicyear').'"
			'.$where1.'
			group by `feesassign`.`id`
			order by '.$oderby.')t group by t.barcode');
			$result=$query->result();
			$this->db->select('coll_install,install_remaining');
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('academic',$this->session->userdata('academicyear'));
			$this->db->where('install_remaining','0');
			if(isset($request['barcode']) && $request['barcode']!=null){
			$this->db->where_in('barcode',$request['barcode']);
			}
			$query1=$this->db->get('feescollection');
			$result1=$query1->result();

			return $this->output->set_content_type('application/json')->set_output(json_encode(array('result'=>$result,'result1'=>$result1)));
			$this->db->close();	
		}
		public function collectionFeesStudent(){
			$this->load->database();
			$request=json_decode(file_get_contents('php://input'),TRUE);
			// echo '<pre>';
			// print_r($request);
			// die();
			$this->db->select('sum(collectedamount) as collectedamount');
			$this->db->where('branch',$this->session->userdata('branch'));
			$this->db->where('academic',$this->session->userdata('academicyear'));
			$this->db->where_in('classname',$request['classname']);
			$this->db->where_in('coll_install',$request['selectedinstall']);
			$this->db->where_in('barcode',$request['barcode']);
			$query=$this->db->get('feescollection')->row();
			// 	echo '<pre>';
			// print_r($query);
			// die();
			if($query->collectedamount!=null && $query->collectedamount!=''){
          $remaining=$request['install_amount']-($query->collectedamount+$request['payinsatllamount']);
			}else{
			$remaining=	$request['install_amount']-$request['payinsatllamount'];
			}
			// $result=$query->result();
			// $install_amount =explode(',',rtrim($request['install_amount'],','));
			// $profileid=explode('||',$request['selectedprofile']);
			$inarray=array(
				'academic'=>$this->session->userdata('academicyear'),
				'branch'=>$this->session->userdata('branch'),
				'barcode'=>$request['barcode'],
				'classname'=>$request['classname'],
				'assign_id'=>$request['assignid'],
				'pay_mode'=>$request['paymode'],
				'install_remaining'=>$remaining,
				'collectedamount'=>$request['payinsatllamount'],
				'netfees'=>$request['netfees'],
				'coll_install'=>$request['selectedinstall'],
				'datetime'=>date('Y-m-d H:i:s'),
				'date'=>date('Y-m-d'),
				'ip'=>$this->input->ip_address(),
				'user'=>$this->session->userdata('username'),
			);
			
			$this->db->insert('feescollection',$inarray);	
			return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			$this->db->close();	
		}
	}
