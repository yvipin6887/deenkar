<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileHandler extends CI_Model {

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
		$this->load->helper(array('form', 'url'));
		$this->filename='';
		// $this->load->database();
	}
	public function imageHandler($mathodname ){
			if($mathodname=='Student'){
				if(isset($_FILES) && $_FILES['studentpic']['name']!=''){
					$this->filename=$this->doupload('studentpic',"./uploads/profiles/");
				}
           
			}
			return $this->filename;
	}
	public function doupload($inputfilename,$upload_path)
     {
      
	    // $filename=$upload_path.''.date('dmY').$_FILES[$inputfilename]['name'];
	    $filename=$upload_path.$_FILES[$inputfilename]['name'];
        if(!file_exists($upload_path)) 
        {
                   mkdir($upload_path, 0777, true);
        }
        $config = array(
        'upload_path' => $upload_path,
        'allowed_types' => "gif|jpg|png|jpeg",
        'overwrite' => TRUE,
        'max_size' => "2048000", 
        'max_height' => "768",
        'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload($inputfilename))
        { 
            $data['imageError'] =  $this->upload->display_errors();

        }
        else
        {
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
		}
		// echo $filename;
		// die();
		return  $filename;

     }
	
}
