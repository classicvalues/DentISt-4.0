<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class TreatmentPlan extends CI_Controller {

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
					$ver = $this->patient->getLatest6($id);
					foreach($ver as $row){
						$version = $row['treatmentplanID'];
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
				$userID2 = $userID22['userID'];
				$date = date("Y-m-d");

				if($this->patient->hasTreatmentPlan($id)){
					$data['info'] = $this->patient->getPatientInfoTreatmentPlan($id);
					$data['recordexist'] = true;
				}
				$clinicianID = $this->patient->isClinician($id);

				//print_r($data['info']);
				if($this->patient->isLatestForApproval6($id)){
					$this->user->addAuditTrail($userID2, 'SELECT', 'Treatment Plan', $id, $date);
					redirect('treatmentplan/view/'.$id);
				}else{
					//$this->user->addAuditTrail($userID2, 'SELECT', 'Treatment Plan', $id, $date);
					if($clinicianID!=$userID2){
						redirect('treatmentplan/view/'.$id);
					}
					else{ 
						$this->load->view('treatmentplan_view', $data);
					}
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
					$ver = $this->patient->getLatest6($id);
					foreach($ver as $row){
						$version = $row['treatmentplanID'];
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
				$userID2 = $userID22['userID'];
				$date = date("Y-m-d");

				$clinicianID = $this->patient->isClinician($id);
				$data['private'] = false;
				$data['forapproval'] = false;

				if($this->patient->hasTreatmentPlan($id)){
					$data['info'] = $this->patient->getPatientInfoTreatmentPlanRO($id, $version);
					$data['recordexist'] = true;
				}

				//print_r($data['info']);

				if($this->patient->isLatestForApproval6($id)){
					$data['forapproval'] = true;
				}

				if($clinicianID!=$userID2){
					$data['private'] = true;
					//redirect('dentalchart/view/'.$id);
				}

				$this->user->addAuditTrail($userID2, 'SELECT', 'Treatment Plan', $id, $date);

				$this->load->view('treatmentplanreadonly_view', $data);
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


