<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->database();
		$this->load->model('LoginM');	
		$this->data['lastaccess']=$this->LoginM->getUserLoginDetails();
		$this->data['visitcount']=$this->LoginM->getUserLoginCount();
		$this->data['classlist']=$this->LoginM->getClassList();
		$this->data['featurename']=$this->LoginM->getRightFeatureList();
		$this->data['leftfeaturename']=$this->LoginM->getLeftFeatureList();
		unset($this->LoginM);
		$this->db->close();
    }
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
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
	public function Dashboard()
	{
		$this->load->database();
		// $this->load->Models('DashboardM');
		// echo 'session'. $this->session->userdata('username';
		// die();
		if( $this->session->userdata('username')!=''){
		$this->data['title']='Dashboard';
		$this->data['SecTitle']='Dashboard';
		$this->load->view('header',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->load->view('footer',$this->data);
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		$this->db->close();
	}
	public function schoolConfigurator()
	{
		$this->load->database();
		// $this->load->Models('DashboardM');
		// echo 'session'. $this->session->userdata('username';
		// die();
		if( $this->session->userdata('username')!=''){
		$this->data['Title']='School Configurator';
		$this->data['SecTitle']='School Configurator';
		$this->load->view('header',$this->data);
		$this->load->view('schoolconfigurator',$this->data);
		$this->load->view('footer',$this->data);
		
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		$this->db->close();
	}
	public function academicConfigurator()
	{
		$this->load->database();
		// $this->load->Models('DashboardM');
		// echo 'session'. $this->session->userdata('username';
		// die();
		if( $this->session->userdata('username')!=''){
		$this->data['Title']='Academic Configurator';
		$this->data['SecTitle']='Academic Configurator';
		$this->load->view('header',$this->data);
		$this->load->view('acadmicconfigurator',$this->data);
		$this->load->view('footer',$this->data);
		
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		$this->db->close();
	}
	public function feesConfigurator()
	{
		$this->load->database();
		// $this->load->Models('DashboardM');
		// echo 'session'. $this->session->userdata('username';
		// die();
		if( $this->session->userdata('username')!=''){
		$this->data['Title']='Fees Configurator';
		$this->data['SecTitle']='Fees Configurator';
		$this->load->view('header',$this->data);
		$this->load->view('feesconfigurator',$this->data);
		$this->load->view('footer',$this->data);
		
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		$this->db->close();
	}
	public function NewStudentEnquiry($data=null)
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			if($data!=null && $data!=''){
			$this->load->model('NewStudentEnquiryM');
			$this->data['newstudentdata']=$this->NewStudentEnquiryM->getNewStudentData($data);	
			unset($this->NewStudentEnquiryM);
			}
			$this->data['actiontype']=$data;
			$this->data['Title']='New Student';
			$this->data['SecTitle']='New Student';
			$this->load->view('header',$this->data);
			$this->load->view('newstudent_enquiry',$this->data);
			$this->load->view('footer',$this->data);
	
		}else{
			redirect(base_url() . 'index.php/Login');
		}
		$this->db->close();
	}
	public function NewStudentList()
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			$this->load->model('NewStudentListM');
			$this->data['totalcount']=$this->NewStudentListM->getTotalStatusCount();
			$this->data['statuscount']=$this->NewStudentListM->getStatusBYCount();
			unset($this->NewStudentListM);
		
			$this->data['Title']='New Student';
			$this->data['SecTitle']='New Student List';
			$this->load->view('header',$this->data);
			$this->load->view('newstudent_list',$this->data);
			$this->load->view('footer',$this->data);
			}else{
				redirect(base_url() . 'index.php/Login');
			}
		$this->db->close();
	}
	public function SearchPage($search=null)
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			$this->load->model('SearchM');
			$this->data['student']=$this->SearchM->getStudent($search);
			unset($this->SearchM);
	
		$this->data['search']=$search;
		$this->data['SecTitle']='Search';
		$this->load->view('header',$this->data);
		$this->load->view('search_page',$this->data);
		$this->load->view('footer',$this->data);
			}else{
				redirect(base_url() . 'index.php/Login');
			}
		$this->db->close();
	}
	public function ExistStudentList($search=null)
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			
			$this->load->model('NewStudentListM');
			$this->data['totalcount']=$this->NewStudentListM->getTotalStatusCount();
			$this->data['statuscount']=$this->NewStudentListM->getStatusBYCount();
			unset($this->NewStudentListM);
	
		$this->data['SecTitle']='Exist Student';
		$this->load->view('header',$this->data);
		$this->load->view('existtudent_list',$this->data);
		$this->load->view('footer',$this->data);
			}else{
				redirect(base_url() . 'index.php/Login');
			}
		$this->db->close();
	}
	public function FeesCollection()
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			
			$this->load->model('NewStudentListM');
			$this->data['totalcount']=$this->NewStudentListM->getTotalStatusCount();
			$this->data['statuscount']=$this->NewStudentListM->getStatusBYCount();
			unset($this->NewStudentListM);
	
		$this->data['SecTitle']='Fees Collection';
		$this->load->view('header',$this->data);
		$this->load->view('fees_collection',$this->data);
		$this->load->view('footer',$this->data);
			}else{
				redirect(base_url() . 'index.php/Login');
			}
		$this->db->close();
	}
	public function getClassListData(){
		$this->load->database();
		$this->db->select('id,branch,classname');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->order_by('id','ASC');
		$query=$this->db->get('classlist');
		$result=$query->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function insertNewClass(){
		$this->load->database();
		$classname=$this->input->post('classname');
		$this->db->select('id');
		$this->db->where('branch',$this->session->userdata('branch'));
		$this->db->where('classname',$classname);
		$query=$this->db->get('classlist');
		// $result=$query->result();
		if($query->num_rows()>0){
			return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
		}else{
			$arrayu=array(
				'classname'=>$classname,
				'branch'=>$this->session->userdata('branch'),
				'username'=>$this->session->userdata('username'),
				'datetime'=>date('Y/m/d H:n:s'),
				'ip'=>$this->input->ip_address()

			);
			$this->db->insert('classlist',$arrayu);
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function HRMSConfigurator($search=null)
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			
			$this->load->model('NewStudentListM');
			$this->data['totalcount']=$this->NewStudentListM->getTotalStatusCount();
			$this->data['statuscount']=$this->NewStudentListM->getStatusBYCount();
			unset($this->NewStudentListM);
	
		$this->data['SecTitle']='Exist Student';
		$this->load->view('header',$this->data);
		$this->load->view('hrmsconfigurator',$this->data);
		$this->load->view('footer',$this->data);
			}else{
				redirect(base_url() . 'index.php/Login');
			}
		$this->db->close();
	}
	public function printStudentFessBybarcode($search=null)
	{
		$this->load->database();
		if( $this->session->userdata('username')!=''){
			
			$this->load->model('NewStudentListM');
			$this->data['totalcount']=$this->NewStudentListM->getTotalStatusCount();
			$this->data['statuscount']=$this->NewStudentListM->getStatusBYCount();
			unset($this->NewStudentListM);
	
		$this->data['SecTitle']='Student Fees';
		// $this->load->view('header',$this->data);
		$this->load->view('printstudentfeesbybarcode',$this->data);
		// $this->load->view('footer',$this->data);
			}else{
				redirect(base_url() . 'index.php/Login');
			}
		$this->db->close();
	}
	public function checkout() {
        $data['title'] = 'Checkout payment | TechArise';  
        // $this->site->setProductID($id);
        $data['itemInfo'] = 'school system'; 
        $data['return_url'] = base_url().'razorpay/callback';
        // $data['surl'] = site_url().'razorpay/success';;
        // $data['furl'] = site_url().'razorpay/failed';;
		$data['currency_code'] = 'INR';
		$this->data['SecTitle']='Razor Pay';
		$data['surl'] = base_url().'razorpay/success';
        $data['furl'] = base_url().'razorpay/failed';
		$this->load->view('header',$this->data);
		$this->load->view('checkout', $data);
		$this->load->view('footer',$this->data);
	}
	// initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
    // callback method
    public function callback() {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                   // echo "<pre>";print_r($response_array);exit;
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
 
	public function getClass(){
		$this->load->database();
		$classname=$this->input->post('classname');
		$id=$this->input->post('id');
		$this->db->select('id,classname');
		$this->db->where('branch',$this->session->userdata('branch'));
		if($classname!='' && $classname!=null){
		$this->db->where('classname',$classname);
		}
		if($id!='' && $id!=null){
		$this->db->where('id',$id);
		}
		$query=$this->db->get('classlist');
		$result=$query->result();
		if($query->num_rows()>0){
			return $this->output->set_content_type('application/json')->set_output(json_encode(array('options'=>'Already','result'=>$result)));
		}
		$this->db->close();
	}
	public function updateClass(){
		$this->load->database();
		$classname=$this->input->post('editclass');
		$id=$this->input->post('id');
		$this->db->select('id,classname');
		$this->db->where('branch',$this->session->userdata('branch'));
		if($classname!='' && $classname!=null){
		$this->db->where('classname',$classname);
		}
		$query=$this->db->get('classlist');
		// $result=$query->result();
		if($query->num_rows()>0){
			return $this->output->set_content_type('application/json')->set_output(json_encode('Already'));
		}else{
			if($classname!='' && $classname!=null){
				// $this->db->where('classname',$classname);
				$arrayu=array(
					'classname'=>$classname,
					'branch'=>$this->session->userdata('branch'),
					'username'=>$this->session->userdata('username'),
					'datetime'=>date('Y/m/d H:n:s'),
					'ip'=>$this->input->ip_address()
	
				);
				$this->db->where('id',$id);
				$this->db->update('classlist',$arrayu);
				}
				return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
			
		}
		
		// echo json_encode(array($result));
		$this->db->close();
	}
	public function deleteClass(){
		$this->load->database();
		$id=$this->input->post('id');
		if($id!='' && $id!=null){
		$this->db->where('id',$id);
		}
		$query=$this->db->delete('classlist');
		return $this->output->set_content_type('application/json')->set_output(json_encode('Done'));
		// echo json_encode(array($result));
		$this->db->close();
	}

}
