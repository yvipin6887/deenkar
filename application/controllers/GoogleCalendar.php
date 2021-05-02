<?php
/* * ***
 * Version: 1.0.0
 *
 * Description of Google Calendar Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 * *** */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class GoogleCalendar extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        //load library  
        $this->load->library('googleapi');
        $this->calendarapi = new Google_Service_Calendar($this->googleapi->client());
 
    }
 
 
    // add google calendar event
    public function addEvent() {
        
            $json = array();
            $event = array();
            $calendarId = 'primary';
            $data = $this->actionEvent($calendarId, $event);
            if ($data->status == 'confirmed') {
                $json['message'] = 1;
            } else {
                $json['message'] = 0;
            }
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($json);
    }
 
    // actionEvent
    public function actionEvent($calendarId, $data) {
        //Date Format: 2016-06-18T17:00:00+03:00
        $event = new Google_Service_Calendar_Event(
            array(
                'summary' => 'Google I/O 2015',
                'location' => '800 Howard St., San Francisco, CA 94103',
                'description' => 'A chance to hear more about Google\'s developer products.',
                'start' => array(
                  'dateTime' => '2020-04-06T09:00:00-07:00',
                  'timeZone' => 'America/Los_Angeles',
                ),
                'end' => array(
                  'dateTime' => '2020-04-06T17:00:00-07:00',
                  'timeZone' => 'America/Los_Angeles',
                ),
                'recurrence' => array(
                  'RRULE:FREQ=DAILY;COUNT=2'
                ),
                'attendees' => array(
                  array('email' => 'lpage@example.com'),
                  array('email' => 'sbrin@example.com'),
                ),
                'reminders' => array(
                  'useDefault' => FALSE,
                  'overrides' => array(
                    array('method' => 'email', 'minutes' => 24 * 60),
                    array('method' => 'popup', 'minutes' => 10),
                  ),
                ),
              )
        );
        return $this->calendarapi->events->insert($calendarId, $event);
    }
 
    // get event list
    public function viewEvent() {        
        $json = array();
        if (!$this->isLogin()) {
            $this->session->sess_destroy();    
            redirect(base_url(), 'refresh');
        } else { 
            $google_event_date = $this->input->post('google_event_date');
            $start = date($google_event_date).' 00:00:00';
            $end = date($google_event_date).' 23:59:59';
            $eventData = $this->getEvents('primary', $start, $end, null);   
            /*echo "<pre>";
            print_r($eventData);die; */         
            $json['eventData'] = $eventData;
            $this->output->set_header('Content-Type: application/json');
            $this->load->view('google-calendar/popup/render', $json);
        }
 
    }
    // render Event Form
    public function renderEventForm() {        
        $json = array();
        if (!$this->isLogin()) {
            $this->session->sess_destroy();    
            redirect(base_url(), 'refresh');
        } else { 
            $datetime = $this->input->post('datetime');                   
            $json['datetime'] = $datetime;
            $this->output->set_header('Content-Type: application/json');
            $this->load->view('google-calendar/popup/renderadd', $json);
        }
 
    }
    //logout method
    public function logout() {
        $this->googleapi->revokeToken();
        $this->session->unset_userdata('is_authenticate_user');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('gc/auth/login');
    }   
 
}