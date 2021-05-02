<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailer extends CI_Model {

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
  public function sendMail(){
		$body=[
			"Messages"=>[
			[
				"From"=> [
				"Email"=> "yvipin7997@gmail.com",
				"Name"=> "Mailjet Pilot"
				],
				"To"=> [
				[
					"Email"=> "vipinrajbahadur97@gmail.com",
					"Name"=> "passenger 1"
				]
				],
				"Subject"=> "Your email flight plan!",
				"TextPart"=> "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
				"HTMLPart"=> "<h3>Dear passenger 1, welcome to"
			]
			]
		];
		// echo '<pre>';
		// print_r($body);
		 /* API URL */
		 $url = 'https://api.mailjet.com/v3.1/send';
   
		 /* Init cURL resource */
		 $ch = curl_init($url);

		 /* Array Parameter Data */
		 $data = ['name'=>'Hardik', 'email'=>'itsolutionstuff@gmail.com'];

		 /* pass encoded JSON string to the POST fields */
		 curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
				 
		 /* set the content type json */
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				 
		 /* set return type json */
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 curl_setopt($ch, CURLOPT_USERPWD, "b653c3ee5ba99a785e97c2a8fb6458bc:a74cac45e87c51b8fc0821b4ccfc703a");
				 
		 /* execute request */
		 $result = curl_exec($ch);
		 echo '<pre>';
		 echo 'vbvbvbn';
		 print_r($result);
					
		 /* close cURL resource */
		 curl_close($ch);

  }	
}
