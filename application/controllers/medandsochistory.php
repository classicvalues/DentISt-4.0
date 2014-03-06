<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class MedAndSocHistory extends CI_Controller {

 function __construct()
 {
   parent::__construct();
	$this->load->model('patient','',TRUE);
	$this->load->model('user','',TRUE);
 }

	function patient(){
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in'))
   		{
			$bool = false;
			$sec = $session_data['section'];
			foreach($sec as $row){
				if($row != "System Maintenance"){
					$bool = true;
					break;
				}
			}
 
			if($bool){
				$id = $this->uri->segment(3);
				$version = "";
			
				if($this->uri->segment(4) == ""){
					$ver = $this->patient->getLatest3($id);
					foreach($ver as $row){
						$version = $row['medhistoID'];
					}
				}
				else
					$version = $this->uri->segment(4);

				//echo $version;

				$this->load->helper(array('form'));
				$data = $this->patient->getPatient($id);
				
				$data['recordexist'] = false;

				//$ver = $this->patient->getLatest($id);

				/*foreach($ver as $row){
					$version = $row['patientinfoID'];
				}*/

				$userID222 = $session_data['username'];
				$userID22 = $this->user->getUserID($userID222);
				$userID2 = $userID22['$userID'];
				$date = date("Y-m-d");

				if($this->patient->hasMedAndSocHisto($id)){
					$data['info'] = $this->patient->getPatientInfoMedAndSocHisto($id);
					$data['recordexist'] = true;
				}

				//print_r($data['info']);

				if($this->patient->isLatestForApproval3($id)){
					$this->user->addAuditTrail($userID2, 'SELECT', 'Medical and Social History', $id, $date);
					redirect('medandsochistory/view/'.$id);
				}else{
					$this->user->addAuditTrail($userID2, 'SELECT', 'Medical and Social History', $id, $date);
					$this->load->view('medandsochistory_view', $data);
				}
			}
			else
				redirect('home', 'refresh');
		}
		else
   		{
     			//If no session, redirect to login page
     			redirect('login', 'refresh');
   		}
		
	}

	function view(){
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in'))
   		{
			$bool = false;
			$sec = $session_data['section'];
			foreach($sec as $row){
				if($row != "System Maintenance"){
					$bool = true;
					break;
				}
			}
 
			if($bool){
				$id = $this->uri->segment(3);
				$version = "";
			
				if($this->uri->segment(4) == ""){
					$ver = $this->patient->getLatest3($id);
					foreach($ver as $row){
						$version = $row['medhistoID'];
					}
				}
				else
					$version = $this->uri->segment(4);

				//echo $version;

				$this->load->helper(array('form'));
				$data = $this->patient->getPatient($id);
				
				$data['recordexist'] = false;

				//$ver = $this->patient->getLatest($id);

				/*foreach($ver as $row){
					$version = $row['patientinfoID'];
				}*/

				$userID222 = $session_data['username'];
				$userID22 = $this->user->getUserID($userID222);
				$userID2 = $userID22['$userID'];
				$date = date("Y-m-d");

				if($this->patient->hasMedAndSocHisto($id)){
					$data['info'] = $this->patient->getPatientInfoMedAndSocHistoRO($id, $version);
					$data['recordexist'] = true;
				}


				if($this->patient->isLatestForApproval3($id)){
					$data['forapproval'] = true;
				}
				//print_r($data['info']);
				$this->user->addAuditTrail($userID2, 'SELECT', 'Medical and Social History', $id, $date);
				$this->load->view('medandsochistoryreadonly_view', $data);
			}
			else
				redirect('home', 'refresh');
		}
		else
   		{
     			//If no session, redirect to login page
     			redirect('login', 'refresh');
   		}
		
	}
}

?>


