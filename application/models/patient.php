<?php
Class Patient extends CI_Model
{

	function addPatient($id, $fname, $mname, $lname, $houseno, $street, $brgy, $city, $province, $sex, $bdate, $age, $deceased, $section, $clinician, $status, $date){
		$data = array(
			'UPCD_ID' => $id,
			'patientFName' => $fname,
			'patientMName' => $mname,
			'patientLName' => $lname,
			'houseno' => $houseno,
			'street' => $street,
			'brgy' => $brgy,
			'city' => $city,
			'province' => $province,
			'gender' => $sex,
			'bdate' => $bdate,
			'age' => $age,
			'deceased' => $deceased,
			'section' => $section,
			'clinician' => $clinician,
			'status' => $status,
			'date' => $date);
		$this->db->insert('patient', $data);

		$audit = array(	
			'committedBy' => $clinician,
			'action' => 'INSERT',
			'form' => 'Patient',
			'committedTo' => $id,
			'committedOn' => $date);
		$this->db->insert('audittrail', $audit);
	}

	function getPatient($id){
		$this -> db -> select('*');
   		$this -> db -> from('patient');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();

		$rowCount = $this->db->count_all('patient');

		//$query = $this->db->query("SELECT username FROM users_auth, users WHERE users.userID = users_auth.userID AND (users.userFName !='$fname' OR users.userMName!='$mname' OR users.userLName!='$lname')");
		
   		if($query -> num_rows() == 1 || $rowCount == 0)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return "false";
   		}
	}

	function addPatientInfo_tab1($id, $civstat, $phone, $edattain, $occupation, $ptnicoe, $ptnicoenum, $hopi, $gait, $appear, $dfcts, $bp, $pr, $rr, $temp, $wt){
		$data = array(
			'UPCD_ID' => $id,
			'civstat' => $civstat,
			'phonenum' => $phone,
			'edattain' => $edattain,
			'occupation' => $occupation,
			'persontonotify' => $ptnicoe,
			'persontonotifynum' => $ptnicoenum,
			'histo' => $hopi);
		$this->db->insert('patientinfo', $data);

		$data2 = array(
			'UPCD_ID' => $id,
			'gait' => $gait,
			'appear' => $appear,
			'dfcts' => $dfcts);
		$this->db->insert('phyassess', $data2);
		
		$data3 = array(
			'UPCD_ID' => $id,
			'bp' => $bp,
			'pr' => $pr,
			'rr' => $rr,
			'temp' => $temp,
			'weight' => $wt);
		$this->db->insert('vitalsigns', $data3);

	}

	function addPatientInfo_tab2($id, $hbp, $pij, $ha, $trem, $apcp, $bt, $sa, $dptgb, $fhf, $pal, $pahv, $dia, $emp, $goi, $af, $bobt, $cc, $swlog, $brp, $ft, $bs, $fh, $sin, $fur, $fha, $che, $diz, $puu, $fslc, $biu, $vi, $hep, $hi, $hiv, $art, $pad, $ner, $dep, $anx, $ast, $oth, $checklist, $diaf, $bdf, $hdf, $canf, $famoth, $family, $druga, $fooda, $ruba, $aloth, $allergy, $pregfe, $bffe, $hrtfe, $mensfe, $confe){
		$data = array(
			'UPCD_ID' => $id,
			'highbloodpressure' => $hbp,
			'joint_pain' => $pij,
			'heart_attack' => $ha,
			'tremors' => $trem,
			'chest_pain' => $apcp,
			'blood_transfusion' => $bt,
			'swollen_ankles' => $sa,
			'denied_blood' => $dptgb,
			'high_fever' => $fhf,
			'pallor' => $pal,
			'pacemaker' => $pahv,
			'diabetes' => $dia,
			'emphysema' => $emp,
			'goiter' => $goi,
			'afternoon_fever' => $af,
			'bruising_tendency' => $bobt,
			'chronic_cough' => $cc,
			'weight_change' => $swlog,
			'breathing_problem' => $brp,
			'frequent_thirst' => $ft,
			'bloody_sputum' => $bs,
			'frequent_hunger' => $fh,
			'sinusitis' => $sin,
			'frequent_urination' => $fur,
			'frequent_headaches' => $fha,
			'chemotherapy' => $che,
			'dizziness' => $diz,
			'pain_urination' => $puu,
			'loss_consciousness' => $fslc,
			'urine_blood' => $biu,
			'visual_impairment' => $vi,
			'hepatitis' => $hep,
			'hearing_impairment' => $hi,
			'HIV_positive' => $hiv,
			'arthritis' => $art,
			'pelvic_discomfort' => $pad,
			'nervousness' => $ner,
			'depression' => $dep,
			'anxiety' => $anx,
			'asthma' => $ast,
			'patientothers' => $oth,
			'patientothers_text' => $checklist);
		$this->db->insert('patientchecklist', $data);

		$data2 = array(
			'UPCD_ID' => $id,
			'familydiabetes' => $diaf,
			'bleeding_disorder' => $bdf,
			'heart_diseases' => $hdf,
			'cancer' => $canf,
			'familyothers' => $famoth,
			'familyothers_text' => $family);
		$this->db->insert('familychecklist', $data2);

		$data3 = array(
			'UPCD_ID' => $id,
			'drugs' => $druga,
			'food' => $fooda,
			'rubber' => $ruba,
			'allergyothers' => $aloth,
			'allergyothers_text' => $allergy);
		$this->db->insert('allergychecklist', $data3);

		$data4 = array(
			'UPCD_ID' => $id,
			'pregnant' => $pregfe,
			'breastfeeding' => $bffe,
			'hormonetherapy' => $hrtfe,
			'menstruation' => $mensfe,
			'contraceptive' => $confe);
		$this->db->insert('femalechecklist', $data4);
	}

	function addPatientInfo_tab3($id, $phyname, $phyphone, $hospdate, $hospreason, $allergies, $illnesses, $medications, $ci, $cig, $cigkind, $cigfreq, $cigdur, $cigdole, $alco, $alcokind, $alcofreq, $alcodur, $alcodole, $drug, $drugkind, $drugfreq, $drugdur, $drugdole){
		$data = array(
			'UPCD_ID' => $id,
			'physician_name' => $phyname,
			'physician_phone' => $phyphone,
			'dateoflatesthospitalization' => $hospdate,
			'hospitalizationreason' => $hospreason,
			'allergies' => $allergies,
			'illnesses' => $illnesses,
			'medications' => $medications,
			'childhood_illnesses' => $ci);
		$this->db->insert('medicalhistory', $data);
		
		$data2 = array(
			'UPCD_ID' => $id,
			'cigarette' => $cig,
			'cigarette_type' => $cigkind,
			'cigarette_frequency' => $cigfreq,
			'cigarette_duration' => $cigdur,
			'cigarette_dateoflastexposure' => $cigdole,
			'alcohol' => $alco,
			'alcohol_type' => $alcokind,
			'alcohol_frequency' => $alcofreq,
			'alcohol_duration' => $alcodur,
			'alcohol_dateoflastexposure' => $alcodole,
			'drug' => $drug,
			'drug_type' => $drugkind,
			'drug_frequency' => $drugfreq,
			'drug_duration' => $drugdur,
			'drug_dateoflastexposure' => $drugdole);
		$this->db->insert('socialhistory', $data2);

	}

	function addPatientInfo_tab4($id, $dolv, $pdolv, $fodv, $eortle, $cdaoadp, $hntd, $lfnd, $mucd, $pltd, $prxd, $ftmd, $tngd, $lymd, $sald, $thyd, $ggvd){
		$data = array(
			'UPCD_ID' => $id,
			'dateoflastvisit' => $dolv,
			'proceduresonlastvisit' => $pdolv,
			'frequencyofvisit' => $fodv,
			'anesthesia_exposure' => $eortle,
			'dental_complications' => $cdaoadp);
		$this->db->insert('dentalhistory', $data);

		$data2 = array(
			'UPCD_ID' => $id,
			'headneckTMJ' => $hntd,
			'lipsfrenum' => $lfnd,
			'mucosa' => $mucd,
			'palate' => $pltd,
			'pharynx' => $prxd,
			'floorofthemouth' => $ftmd,
			'tongue' => $tngd,
			'lymphnodes' => $lymd,
			'salivarygland' => $sald,
			'thyroid' => $thyd,
			'gingiva' => $ggvd);
		$this->db->insert('softtissueexamination', $data2);
	}

	function addPatientInfo_tab5($id, $discar, $buccar, $lincar, $mescar, $occcar, $discaries, $buccaries, $lincaries, $mescaries, $occcaries, $disrec, $bucrec, $linrec, $mesrec, $occrec, $disrecur, $bucrecur, $linrecur, $mesrecur, $occrecur, $disres, $bucres, $linres, $mesres, $occres, $disresto, $bucresto, $linresto, $mesresto, $occresto, $name, $rpds, $extrusions, $intrusions, $mesdrifts, $disdrifts, $rotations, $postcores, $rootcanals, $pitandfissures, $extracteds, $missings, $unerupteds, $impacteds, $porcelains, $acrylics, $metals, $porcelainfuseds, $fixedbridges, $c1s, $c2s, $c3s, $c4s, $c5s, $ols, $exs, $ods, $scs, $pss, $crs, $fss, $lams, $scrs, $bss, $ants, $poss, $oths, $periodontics, $pedodontics, $orthodontics, $acuteinfections, $traumaticinjuries, $completedent, $singledent, $removedent, $othersdent, $notes, $compdent, $updent, $lowdent){

		$data = array(
			'UPCD_ID' => $id,
			'distal_caries' => $discar,
			'buccal_caries' => $buccar,
			'lingual_caries' => $lincar,
			'mesial_caries' => $mescar,
			'occlusal_caries' => $occcar,
			'distal_restorable_caries' => $discaries,
			'buccal_restorable_caries' => $buccaries,
			'lingual_restorable_caries' => $lincaries,
			'mesial_restorable_caries' => $mescaries,
			'occlusal_restorable_caries' => $occcaries);
		$this->db->insert('cariesstatus', $data);

		$data2 = array(
			'UPCD_ID' => $id,
			'distal_recurrent' => $disrec,
			'buccal_recurrent' => $bucrec,
			'lingual_recurrent' => $linrec,
			'mesial_recurrent' => $mesrec,
			'occlusal_recurrent' => $occrec,
			'distal_restorable_recurrent' => $disrecur,
			'buccal_restorable_recurrent' => $bucrecur,
			'lingual_restorable_recurrent' => $linrecur,
			'mesial_restorable_recurrent' => $mesrecur,
			'occlusal_restorable_recurrent' => $occrecur);
		$this->db->insert('recurrentstatus', $data2);

		$data3 = array(
			'UPCD_ID' => $id,
			'distal_restoration' => $disres,
			'buccal_restoration' => $bucres,
			'lingual_restoration' => $linres,
			'mesial_restoration' => $mesres,
			'occlusal_restoration' => $occres,
			'distal_restorable_restoration' => $disresto,
			'buccal_restorable_restoration' => $bucresto,
			'lingual_restorable_restoration' => $linresto,
			'mesial_restorable_restoration' => $mesresto,
			'occlusal_restorable_restoration' => $occresto);
		$this->db->insert('restorationstatus', $data3);

		$data4 = array(
			'UPCD_ID' => $id,
			'clinician' => $name,
			'removable_partial_denture' => $rpds,
			'extrusion' => $extrusions,
			'intrusion' => $intrusions,
			'mesial_rotation' => $mesdrifts,
			'distal_rotation' => $disdrifts,
			'rotation' => $rotations,
			'postcore_crown' => $postcores,
			'rootcanal_treatment' => $rootcanals,
			'pitfissure_sealants' => $pitandfissures,
			'extracted' => $extracteds,
			'missing' => $missings,
			'unerupted' => $unerupteds,
			'impacted' => $impacteds,
			'porcelain_crown' => $porcelains,
			'acrylic_crown' => $acrylics,
			'metal_crown' => $metals,
			'porcelain_fused' => $porcelainfuseds,
			'fixed_bridge' => $fixedbridges);
		$this->db->insert('dentalchart', $data4);

		$data5 = array(
			'UPCD_ID' => $id,
			'class1' => $c1s,
			'class2' => $c2s,
			'class3' => $c3s,
			'class4' => $c4s,
			'class5' => $c5s,
			'onlay' => $ols,
			'extraction' => $exs,
			'odontectomy' => $ods,
			'special_case' => $scs,
			'pulp_sedation' => $pss,
			'crown_recementation' => $crs,
			'filling_service' => $fss,
			'laminated' => $lams,
			'single_crown' => $scrs,
			'bridge_service' => $bss,
			'anterior' => $ants,
			'posterior' => $poss,
			'orthoendo' => $oths);
		$this->db->insert('serviceneeded', $data5);

		$data6 = array(
			'UPCD_ID' => $id,
			'periodontics' => $periodontics,
			'pedodontics' => $pedodontics,
			'orthodontics' => $orthodontics,
			'acuteinfections' => $acuteinfections,
			'traumaticinjuries' => $traumaticinjuries,
			'completedenture' => $completedent,
			'singledenture' => $singledent,
			'removablepartialdenture' => $removedent,
			'otherdenture' => $othersdent,
			'dentalnotes' => $notes);
		$this->db->insert('otherservices', $data6);

		$data7 = array(
			'UPCD_ID' => $id,
			'complete_denture' => $compdent,
			'upper_denture' => $updent,
			'lower_denture' => $lowdent);
		$this->db->insert('dentures', $data7);

	}

	function addPatientInfo_tab6($id, $chiefcomp, $perio, $rpd, $resto, $os, $fpd, $pedo, $endo, $cd, $ortho,$ptp){
		$data = array(
			'UPCD_ID' => $id,
			'chiefcomplaints' => $chiefcomp,
			'perio' => $perio,
			'rpd' => $rpd,
			'resto' => $resto,
			'os' => $os,
			'fpd' => $fpd,
			'pedo' => $pedo,
			'endo' => $endo,
			'cd' => $cd,
			'ortho' => $ortho,
			'proposedtreatment' => $ptp);
		$this->db->insert('treatmentplan', $data);
	}

	function addPatientInfo_tab7($id, $datetxt, $toothtxt, $findingstxt){
		$data = array(
			'UPCD_ID' => $id,
			'date' => $datetxt,
			'toothno' => $toothtxt,
			'findings' => $findingstxt);
		$this->db->insert('radiographicexam', $data);
	}

	function addPatientInfo_tab8($id, $servicedatetxt, $renderedtxt, $feestxt){
		$data = array(
			'UPCD_ID' => $id,
			'date' => $servicedatetxt,
			'services' => $renderedtxt,
			'fees' => $feestxt);
		$this->db->insert('servicesrendered', $data);
	}

	function addPatientInfo_tab9($id, $datenewtxt, $reasontxt, $startdatetxt, $enddatetxt, $findingstxt){
		$data = array(
			'UPCD_ID' => $id,
			'date' => $datenewtxt,
			'reason' => $reasontxt,
			'startdate' => $startdatetxt,
			'enddate' => $enddatetxt,
			'findings' => $findingstxt);
		$this->db->insert('consultationandfindings', $data);
	}

	function addPatientInformationVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('patientinfoversion', $data);
	}

	function addPatientChecklistVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('patientchecklistversion', $data);
	}

	function addMedAndSocHistoVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('medandsochistoversion', $data);
	}

	function addDentalDataVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('dentaldataversion', $data);
	}

	function addDentalChartVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('dentalchartversion', $data);
	}

	function addTreatmentPlanVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('treatmentplanversion', $data);
	}

	function addRadiographicExamVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('radioexamversion', $data);
	}

	function addServicesRenderedVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('servicesrenderedversion', $data);
	}

	function addConFindVersion($id, $name, $date, $status, $approver){
		$data = array(
			'UPCD_ID' => $id,
			'updatedBy' => $name,
			'updateDate' => $date,
			'updateStatus' => $status,
			'approvedBy' => $approver);
		$this->db->insert('confindversion', $data);
	}

	function addPatientDashboardVersion($id, $section, $studentID, $date, $status, $facultyID, $curr_section){
		$data = array(
			'UPCD_ID7' => $id,
			'section7' => $section,
			'updatedBy7' => $studentID,
			'updateDate7' => $date,
			'updateStatus7' => $status,
			'approvedBy7' => $facultyID,
			'currentSection7' => $curr_section);
		$this->db->insert('patientdashboardversion', $data);
	}

	function hasPatientInfo($id){
		$this -> db -> select('*');
   		$this -> db -> from('patientinfo');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasPatientChecklist($id){
		$this -> db -> select('*');
   		$this -> db -> from('patientchecklist');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasMedAndSocHisto($id){
		$this -> db -> select('*');
   		$this -> db -> from('medicalhistory');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasDentalData($id){
		$this -> db -> select('*');
   		$this -> db -> from('dentalhistory');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}


	function hasDentalChart($id){
		$this -> db -> select('*');
   		$this -> db -> from('cariesstatus','recurrentstatus','restorationstatus','dentalchart','serviceneeded', 'dentures', 'otherservices');
		$this->db->join('recurrentstatus', 'cariesstatus.UPCD_ID = recurrentstatus.UPCD_ID');
		$this->db->join('restorationstatus', 'cariesstatus.UPCD_ID = restorationstatus.UPCD_ID');
		$this->db->join('dentalchart', 'cariesstatus.UPCD_ID = dentalchart.UPCD_ID');
		$this->db->join('serviceneeded', 'cariesstatus.UPCD_ID = serviceneeded.UPCD_ID');
		$this->db->join('dentures', 'cariesstatus.UPCD_ID = dentures.UPCD_ID');
		$this->db->join('otherservices', 'cariesstatus.UPCD_ID = otherservices.UPCD_ID');
   		$this -> db -> where('cariesstatus.UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasTreatmentPlan($id){
		$this -> db -> select('*');
   		$this -> db -> from('treatmentplan');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasRadioExam($id){
		$this -> db -> select('*');
   		$this -> db -> from('radiographicexam');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasServicesRendered($id){
		$this -> db -> select('*');
   		$this -> db -> from('servicesrendered');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasConFind($id){
		$this -> db -> select('*');
   		$this -> db -> from('consultationandfindings');
   		$this -> db -> where('UPCD_ID', $id);

		$query = $this -> db -> get();
		
   		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	/*function getPatientInfo($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('patientinfo', 'phyassess', 'vitalsigns', 'patientchecklist', 'familychecklist', 'allergychecklist', 'femalechecklist', 'medicalhistory', 'socialhistory', 'dentalhistory', 'softtissueexamination', 'treatmentplan');
		$this->db->join('phyassess', 'patientinfo.UPCD_ID = phyassess.UPCD_ID');
		$this->db->join('vitalsigns', 'patientinfo.UPCD_ID = vitalsigns.UPCD_ID');
		$this->db->join('patientchecklist', 'patientinfo.UPCD_ID = patientchecklist.UPCD_ID');
		$this->db->join('familychecklist', 'patientinfo.UPCD_ID = familychecklist.UPCD_ID');
		$this->db->join('allergychecklist', 'patientinfo.UPCD_ID = allergychecklist.UPCD_ID');
		$this->db->join('femalechecklist', 'patientinfo.UPCD_ID = femalechecklist.UPCD_ID');
		$this->db->join('medicalhistory', 'patientinfo.UPCD_ID = medicalhistory.UPCD_ID');
		$this->db->join('socialhistory', 'patientinfo.UPCD_ID = socialhistory.UPCD_ID');
		$this->db->join('dentalhistory', 'patientinfo.UPCD_ID = dentalhistory.UPCD_ID');
		$this->db->join('softtissueexamination', 'patientinfo.UPCD_ID = softtissueexamination.UPCD_ID');
		$this->db->join('treatmentplan', 'patientinfo.UPCD_ID = treatmentplan.UPCD_ID');
		$this -> db -> where('patientinfo.UPCD_ID', $id);
		$this -> db -> where('patientinfo.patientinfoID', $version);
		$this -> db -> where('phyassess.phyassessID', $version);
		$this -> db -> where('vitalsigns.vitalsignsID', $version);
		$this -> db -> where('patientchecklist.checklistID', $version);
		$this -> db -> where('familychecklist.checklistID', $version);
		$this -> db -> where('allergychecklist.checklistID', $version);
		$this -> db -> where('femalechecklist.checklistID', $version);
		$this -> db -> where('medicalhistory.medhistoID', $version);
		$this -> db -> where('socialhistory.socialhistoID', $version);
		$this -> db -> where('dentalhistory.denthistoID', $version);
		$this -> db -> where('softtissueexamination.softtissueexamID', $version);
		$this -> db -> where('treatmentplan.treatmentplanID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}*/

	function getPatientInfoPatientInfo($id){
		$this -> db -> select('*');
   		$this -> db -> from('patientinfo','phyassess', 'vitalsigns');
		$this->db->join('phyassess', 'patientinfo.UPCD_ID = phyassess.UPCD_ID');
		$this->db->join('vitalsigns', 'patientinfo.UPCD_ID = vitalsigns.UPCD_ID');
		$this -> db -> where('patientinfo.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoPatientChecklist($id){
		$this -> db -> select('*');
   		$this -> db -> from('patientchecklist','familychecklist', 'allergychecklist', 'femalechecklist');
		$this->db->join('familychecklist', 'patientchecklist.UPCD_ID = familychecklist.UPCD_ID');
		$this->db->join('allergychecklist', 'patientchecklist.UPCD_ID = allergychecklist.UPCD_ID');
		$this->db->join('femalechecklist', 'patientchecklist.UPCD_ID = femalechecklist.UPCD_ID');
		$this -> db -> where('patientchecklist.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoMedAndSocHisto($id){
		$this -> db -> select('*');
   		$this -> db -> from('medicalhistory','socialhistory');
		$this->db->join('socialhistory', 'medicalhistory.UPCD_ID = socialhistory.UPCD_ID');
		$this -> db -> where('medicalhistory.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoDentalData($id){
		$this -> db -> select('*');
   		$this -> db -> from('dentalhistory','softtissueexamination');
		$this->db->join('softtissueexamination', 'dentalhistory.UPCD_ID = softtissueexamination.UPCD_ID');
		$this -> db -> where('dentalhistory.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoDentalChart($id){
		$this -> db -> select('*');
   		$this -> db -> from('cariesstatus','recurrentstatus','restorationstatus','dentalchart','serviceneeded', 'dentures', 'otherservices');
		$this->db->join('recurrentstatus', 'cariesstatus.UPCD_ID = recurrentstatus.UPCD_ID');
		$this->db->join('restorationstatus', 'cariesstatus.UPCD_ID = restorationstatus.UPCD_ID');
		$this->db->join('dentalchart', 'cariesstatus.UPCD_ID = dentalchart.UPCD_ID');
		$this->db->join('serviceneeded', 'cariesstatus.UPCD_ID = serviceneeded.UPCD_ID');
		$this->db->join('dentures', 'cariesstatus.UPCD_ID = dentures.UPCD_ID');
		$this->db->join('otherservices', 'cariesstatus.UPCD_ID = otherservices.UPCD_ID');
		$this -> db -> where('cariesstatus.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}


	function getPatientInfoTreatmentPlan($id){
		$this -> db -> select('*');
   		$this -> db -> from('treatmentplan');
		$this -> db -> where('treatmentplan.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoRadioExam($id){
		$this -> db -> select('*');
   		$this -> db -> from('radiographicexam');
		$this -> db -> where('radiographicexam.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoServicesRendered($id){
		$this -> db -> select('*');
   		$this -> db -> from('servicesrendered');
		$this -> db -> where('servicesrendered.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoConFind($id){
		$this -> db -> select('*');
   		$this -> db -> from('consultationandfindings');
		$this -> db -> where('consultationandfindings.UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoPatientInformationRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('patientinfo', 'phyassess', 'vitalsigns');
		$this->db->join('phyassess', 'patientinfo.UPCD_ID = phyassess.UPCD_ID');
		$this->db->join('vitalsigns', 'patientinfo.UPCD_ID = vitalsigns.UPCD_ID');
		$this -> db -> where('patientinfo.UPCD_ID', $id);
		$this -> db -> where('patientinfo.patientinfoID', $version);
		$this -> db -> where('phyassess.phyassessID', $version);
		$this -> db -> where('vitalsigns.vitalsignsID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoPatientChecklistRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('patientchecklist','familychecklist', 'allergychecklist', 'femalechecklist');
		$this->db->join('familychecklist', 'patientchecklist.UPCD_ID = familychecklist.UPCD_ID');
		$this->db->join('allergychecklist', 'patientchecklist.UPCD_ID = allergychecklist.UPCD_ID');
		$this->db->join('femalechecklist', 'patientchecklist.UPCD_ID = femalechecklist.UPCD_ID');
		$this -> db -> where('patientchecklist.UPCD_ID', $id);
		$this -> db -> where('patientchecklist.checklistID', $version);
		$this -> db -> where('familychecklist.checklistID', $version);
		$this -> db -> where('allergychecklist.checklistID', $version);
		$this -> db -> where('femalechecklist.checklistID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoMedAndSocHistoRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('medicalhistory','socialhistory');
		$this->db->join('socialhistory', 'medicalhistory.UPCD_ID = socialhistory.UPCD_ID');
		$this -> db -> where('medicalhistory.UPCD_ID', $id);
		$this -> db -> where('medicalhistory.medhistoID', $version);
		$this -> db -> where('socialhistory.socialhistoID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}



	function getPatientInfoDentalDataRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('dentalhistory','softtissueexamination');
		$this->db->join('softtissueexamination', 'dentalhistory.UPCD_ID = softtissueexamination.UPCD_ID');
		$this -> db -> where('dentalhistory.UPCD_ID', $id);
		$this -> db -> where('dentalhistory.denthistoID', $version);
		$this -> db -> where('softtissueexamination.softtissueexamID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoDentalChartRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('cariesstatus','recurrentstatus','restorationstatus','dentalchart','serviceneeded', 'dentures', 'otherservices');
		$this->db->join('recurrentstatus', 'cariesstatus.UPCD_ID = recurrentstatus.UPCD_ID');
		$this->db->join('restorationstatus', 'cariesstatus.UPCD_ID = restorationstatus.UPCD_ID');
		$this->db->join('dentalchart', 'cariesstatus.UPCD_ID = dentalchart.UPCD_ID');
		$this->db->join('serviceneeded', 'cariesstatus.UPCD_ID = serviceneeded.UPCD_ID');
		$this->db->join('dentures', 'cariesstatus.UPCD_ID = dentures.UPCD_ID');
		$this->db->join('otherservices', 'cariesstatus.UPCD_ID = otherservices.UPCD_ID');
		$this -> db -> where('cariesstatus.UPCD_ID', $id);
		$this -> db -> where('cariesstatus.cariesstatusID', $version);
		$this -> db -> where('recurrentstatus.recurrentstatusID', $version);
		$this -> db -> where('restorationstatus.restorationstatusID', $version);
		$this -> db -> where('dentalchart.dentalchartID', $version);
		$this -> db -> where('serviceneeded.serviceneededID', $version);
		$this -> db -> where('dentures.denturesID', $version);
		$this -> db -> where('otherservices.otherservicesID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoTreatmentPlanRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('treatmentplan');
		$this -> db -> where('treatmentplan.UPCD_ID', $id);
		$this -> db -> where('treatmentplan.treatmentplanID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoRadioExamRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('radiographicexam');
		$this -> db -> where('radiographicexam.UPCD_ID', $id);
		$this -> db -> where('radiographicexam.radioexamID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoServicesRenderedRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('servicesrendered');
		$this -> db -> where('servicesrendered.UPCD_ID', $id);
		$this -> db -> where('servicesrendered.servicesrenderedID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoConFindRO($id, $version){
		$this -> db -> select('*');
   		$this -> db -> from('consultationandfindings');
		$this -> db -> where('consultationandfindings.UPCD_ID', $id);
		$this -> db -> where('consultationandfindings.confindID', $version);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function searchPatient1($agefrom, $ageto, $gender, $city, $occ, $agefrom, $ageto, $gender, $city, $occ, $perio, $rpd, $ortho, $os, $fpd, $pedo, $endo, $cd, $resto, $caries, $extrusion, $compdent, $impacted, $recurrent, $intrusion, $singdent, $missing, $restoration, $mdr, $rempardent, $acrcr, $pftm, $ddr, $pafs, $metcr, $rot, $rct, $pcc, $extracted, $unerupted, $porcr, $class1, $class2, $class3, $class4, $class5, $onlay, $extraction, $odon, $specclass, $pedodontics, $orthodontics, $pulpsed, $roc, $temfill, $moai, $moti, $lamented, $completedenture, $anterior, $singlecrown, $posterior, $bridge, $singledenture, $removablepartialdenture, $demo, $dentdemo, $servdemo){

		/*$this -> db -> select('*');
		$this -> db -> from('patient');
		$this->db->join('patientinfo', 'patient.UPCD_ID = patientinfo.UPCD_ID');
		//$this->db->where('patient.age >=', $agefrom);
		//$this->db->where('patient.age <=', $ageto); 
		$this->db->where('patient.gender', $gender);
		$this->db->where('patient.city', $city);
		$this->db->where('patientinfo.occupation', $occ);*/

		/*$query = "";

		if($occ == ""){
			$query = $this->db->query("SELECT * FROM  patient WHERE $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%'");
		}
		else $query = $this->db->query("SELECT * FROM  patient, patientinfo WHERE patient.UPCD_ID = patientinfo.UPCD_ID AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' AND patientinfo.occupation LIKE '%$occ%'");
// AND patient.city LIKE '%$city%' AND patientinfo.occupation LIKE '%$occ%'
// AND patient.age >= $agefrom AND patient.age <= $ageto*/

//		$query = $this -> db -> get();


		$carvar = "";
		$recvar = "";
		$resvar = "";
		$impvar = "";
		$extvar = "";
		$intvar = "";
		$sinvar = "";
		$misvar = "";
		$mdrvar = "";
		$remvar = "";
		$acrvar = "";
		$pftvar = "";
		$ddrvar = "";
		$pafvar = "";
		$metvar = "";
		$rotvar = "";
		$rctvar = "";
		$pccvar = "";
		$exrvar = "";
		$unevar = "";
		$porvar = "";

		$patinfo = "";
		$treatinfo = "";
		$dentinfo = "";
		$carinfo = "";
		$recinfo = "";
		$resinfo = "";
		$servinfo = "";

		$occs = "";
		$perios = "";
		$rpds = "";
		$orthos = "";
		$oss = "";
		$fpds = "";
		$pedos = "";
		$endos = "";
		$cds = "";
		$restos = "";

		$c1var = "";
		$c2var = "";
		$c3var = "";
		$c4var = "";
		$c5var = "";
		$olvar = "";
		$exvar = "";
		$odvar = "";
		$scvar = "";
		$pdvar = "";
		$orvar = "";
		$psvar = "";
		$rcvar = "";
		$tfvar = "";
		$lmvar = "";
		$anvar = "";
		$sivar = "";
		$povar = "";
		$bsvar = "";


		if($occ != ""){
			$patinfo = "patientinfo, ";
			$occs = "AND patientinfo.occupation LIKE '%$occ%'";
			
		}
		if($perio != ''){
			$perios = "treatmentplan.perio='$perio'";
			$treatinfo = "treatmentplan";
		}
		if($rpd != ''){
			$rpds = "treatmentplan.rpd='$rpd'";
			$treatinfo = "treatmentplan";
		}
		if($resto != ''){
			$restos = "treatmentplan.resto='$resto'";
			$treatinfo = "treatmentplan";
		}
		if($endo != ''){
			$endos = "treatmentplan.endo='$endo'";
			$treatinfo = "treatmentplan";
		}
		if($ortho != ''){
			$orthos = "treatmentplan.ortho='$ortho'";
			$treatinfo = "treatmentplan";
		}
		if($os != ''){
			$oss = "treatmentplan.os='$os'";
			$treatinfo = "treatmentplan";
		}
		if($cd != ''){
			$cds = "treatmentplan.cd='$cd'";
			$treatinfo = "treatmentplan";
		}
		if($fpd != ''){
			$fpds = "treatmentplan.fpd='$fpd'";
			$treatinfo = "treatmentplan";
		}
		if($pedo != ''){
			$pedos = "treatmentplan.pedo='$pedo'";
			$treatinfo = "treatmentplan";
		}

		if($caries == "Yes") { 
			$carvar = "cariesstatus.distal_caries != '' $dentdemo cariesstatus.mesial_caries != '' $dentdemo cariesstatus.buccal_caries != '' $dentdemo cariesstatus.occlusal_caries != '' $dentdemo cariesstatus.lingual_caries != ''";
			$carinfo = "cariesstatus";
		}
		if($recurrent == "Yes") {
			$recvar = "recurrentstatus.distal_recurrent != '' $dentdemo recurrentstatus.mesial_recurrent != '' $dentdemo recurrentstatus.buccal_recurrent != '' $dentdemo recurrentstatus.occlusal_recurrent != '' $dentdemo recurrentstatus.lingual_recurrent != ''";
			$recinfo = "recurrentstatus";
		}		
		if($restoration == "Yes") {
			$resvar = "restorationstatus.distal_restoration != '' $dentdemo restorationstatus.mesial_restoration != '' $dentdemo restorationstatus.buccal_restoration != '' $dentdemo restorationstatus.occlusal_restoration != '' $dentdemo restorationstatus.lingual_restoration != ''";
			$resinfo = "restorationstatus";
		}		

		if($impacted == "Yes") {
			$impvar = " dentalchart.impacted != ''";
			$dentinfo = "dentalchart";
		}		
		if($extrusion == "Yes") {
			$extvar = " dentalchart.extrusion != ''";
			$dentinfo = "dentalchart";
		}		
		if($intrusion == "Yes") {
			$intvar = " dentalchart.intrusion != ''";
			$dentinfo = "dentalchart";
		}
		/*if($singdent == "Yes") {
			$$intvar = "dentalchart.intrusion != ''";
			$dentinfo = "dentalchart, ";
		}*/
		if($missing == "Yes")  {
			$misvar = " dentalchart.missing != ''";
			$dentinfo = "dentalchart";
		}
		if($mdr == "Yes") {
			$mdrvar = " dentalchart.mesial_rotation != ''";
			$dentinfo = "dentalchart";
		}
		if($rempardent == "Yes") {
			$remvar = " dentalchart.removable_partial_denture != ''";
			$dentinfo = "dentalchart";
		}
		if($acrcr == "Yes") {
			$acrvar = " dentalchart.acrylic_crown != ''";
			$dentinfo = "dentalchart";
		}
		if($pftm == "Yes") {
			$pftvar = " dentalchart.porcelain_fused != ''";
			$dentinfo = "dentalchart";
		}
		if($ddr == "Yes") {
			$ddrvar = " dentalchart.distal_rotation != ''";
			$dentinfo = "dentalchart";
		}
		if($pafs == "Yes") {
			$pafvar = " dentalchart.pitfissure_sealants != ''";
			$dentinfo = "dentalchart";
		}
		if($metcr == "Yes") {
			$metvar = " dentalchart.metal_crown != ''";
			$dentinfo = "dentalchart";
		}
		if($rot == "Yes") {
			$rotvar = " dentalchart.rotation != ''";
			$dentinfo = "dentalchart";
		}
		if($rct == "Yes") {
			$rctvar = " dentalchart.rootcanal_treatment != ''";
			$dentinfo = "dentalchart";
		}
		if($pcc == "Yes") {
			$pccvar = " dentalchart.postcore_crown != ''";
			$dentinfo = "dentalchart";
		}
		if($extracted == "Yes") {
			$exrvar = " dentalchart.extracted != ''";
			$dentinfo = "dentalchart";
		}
		if($unerupted == "Yes") {
			$unevar = " dentalchart.unerupted != ''";
			$dentinfo = "dentalchart";
		}
		if($porcr == "Yes") {
			$porvar = " dentalchart.porcelain_crown != ''";
			$dentinfo = "dentalchart";
		}

		if($class1 == "Yes") {
			$c1var = " serviceneeded.class1 != ''";
			$servinfo = "serviceneeded";
		}
		if($class2 == "Yes") {
			$c2var = " serviceneeded.class2 != ''";
			$servinfo = "serviceneeded";
		}
		if($class3 == "Yes") {
			$c3var = " serviceneeded.class3 != ''";
			$servinfo = "serviceneeded";
		}
		if($class4 == "Yes") {
			$c4var = " serviceneeded.class4 != ''";
			$servinfo = "serviceneeded";
		}
		if($class5 == "Yes") {
			$c5var = " serviceneeded.class5 != ''";
			$servinfo = "serviceneeded";
		}
		if($onlay == "Yes") {
			$olvar = " serviceneeded.onlay != ''";
			$servinfo = "serviceneeded";
		}
		if($extracted == "Yes") {
			$exvar = " serviceneeded.extracted != ''";
			$servinfo = "serviceneeded";
		}
		if($odon == "Yes") {
			$odvar = " serviceneeded.odontectomy != ''";
			$servinfo = "serviceneeded";
		}
		if($specclass == "Yes") {
			$scvar = " serviceneeded.special_case != ''";
			$servinfo = "serviceneeded";
		}
		if($pedodontics == "Yes") {
			$pdvar = " serviceneeded.pedodontics != ''";
			$servinfo = "serviceneeded";
		}
		if($orthodontics == "Yes") {
			$orvar = " serviceneeded.orthodontics != ''";
			$servinfo = "serviceneeded";
		}
		if($pulpsed == "Yes") {
			$psvar = " serviceneeded.pulp_sedation != ''";
			$servinfo = "serviceneeded";
		}
		if($roc == "Yes") {
			$rcvar = " serviceneeded.crown_recementation != ''";
			$servinfo = "serviceneeded";
		}
		if($temfill == "Yes") {
			$tfvar = " serviceneeded.filling_service != ''";
			$servinfo = "serviceneeded";
		}
		if($lamented == "Yes") {
			$lmvar = " serviceneeded.lamented != ''";
			$servinfo = "serviceneeded";
		}
		if($anterior == "Yes") {
			$anvar = " serviceneeded.anterior != ''";
			$servinfo = "serviceneeded";
		}
		if($singlecrown == "Yes") {
			$sivar = " serviceneeded.single_crown != ''";
			$servinfo = "serviceneeded";
		}
		if($posterior == "Yes") {
			$povar = " serviceneeded.posterior != ''";
			$servinfo = "serviceneeded";
		}
		if($bridge == "Yes") {
			$bsvar = " serviceneeded.bridge_service != ''";
			$servinfo = "serviceneeded";
		}

		$query = "";
		
		echo "demo = $demo";

		if($demo == "or" || $demo == "and"){
			$txt = "SELECT * FROM  patient";
			if($patinfo != "") $txt = $txt.", $patinfo"; 
			if($treatinfo != "") $txt = $txt.", $treatinfo";

			if($dentdemo == "" && $servdemo == ""){
				$isfirstgood4 = true;

				if($patinfo != "") $txt = $txt." WHERE patient.UPCD_ID = patientinfo.UPCD_ID ";
				else $isfirstgood4 = false;
				if($treatinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = treatmentplan.UPCD_ID ";
					$isfirstgood4 = true;
				}
				else $txt = $txt." AND patient.UPCD_ID = treatmentplan.UPCD_ID ";

				$txt = $txt." AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' $occs $demo (";

				if($treatinfo != ""){
					$txt = $txt." (";
					$isfirstgood2 = true;

					if($perios != "") $txt = $txt." $perios ";
					else $isfirstgood2 = false;
					if($fpds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood){
						$txt = $txt." OR $fpds ";
					}
					if($oss != "" && !$isfirstgood2) {
						$txt = $txt." $oss ";
						$isfirstgood2 = true;
					}elseif($oss != "" && $isfirstgood2){
						$txt = $txt."OR $oss ";
					}
					if($rpds != ""  && !$isfirstgood2) {
						$txt = $txt." $rpds ";
						$isfirstgood2 = true;
					}elseif($rpds != "" && $isfirstgood2){
						$txt = $txt."OR $rpds ";
					}
					if($endos != ""  && !$isfirstgood2) {
						$txt = $txt." $endos ";
						$isfirstgood2 = true;
					}elseif($endos != "" && $isfirstgood2){
						$txt = $txt."OR $endos ";
					}
					if($pedos != ""  && !$isfirstgood2) {
						$txt = $txt." $pedos ";
						$isfirstgood2 = true;
					}elseif($pedos != "" && $isfirstgood2){
						$txt = $txt."OR $pedos ";
					}
					if($orthos != ""  && !$isfirstgood2) {
						$txt = $txt." $orthos ";
						$isfirstgood2 = true;
					}elseif($orthos != "" && $isfirstgood2){
						$txt = $txt."OR $orthos ";
					}
					if($restos != ""  && !$isfirstgood2) {
						$txt = $txt." $restos ";
						$isfirstgood2 = true;
					}elseif($restos != "" && $isfirstgood2){
						$txt = $txt."OR $restos ";
					}
					if($cds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood2){
						$txt = $txt."OR $cds ";
					}
					$txt = $txt.") ";
				}
				$txt = $txt.") ";

				echo "elseif1 = $txt";
				$query = $this->db->query($txt);


			}
			elseif($dentdemo != "" && $servdemo == ""){

				if($dentinfo != "") $txt = $txt.", $dentinfo";
				if($carinfo != "") $txt = $txt.", $carinfo"; 
				if($recinfo != "") $txt = $txt.", $recinfo";
				if($resinfo != "") $txt = $txt.", $resinfo";

				$isfirstgood4 = true;
				if($patinfo != "") $txt = $txt." WHERE patient.UPCD_ID = patientinfo.UPCD_ID ";
				else $isfirstgood4 = false;
				if($treatinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = treatmentplan.UPCD_ID ";
					$isfirstgood4 = true;
				}
				elseif($treatinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = treatmentplan.UPCD_ID ";

				if($dentinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = dentalchart.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($dentinfo != "" && $isfirstgood4)  $txt = $txt." AND patient.UPCD_ID = dentalchart.UPCD_ID";
				if($carinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = cariesstatus.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($carinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = cariesstatus.UPCD_ID";
				if($recinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = recurrentstatus.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($recinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = recurrentstatus.UPCD_ID";
				if($resinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = restorationstatus.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($recinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = restorationstatus.UPCD_ID";

				$txt = $txt." AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' $occs $demo (";
				if($treatinfo != ""){
					$txt = $txt." (";
					$isfirstgood2 = true;

					if($perios != "") $txt = $txt." $perios ";
					else $isfirstgood2 = false;
					if($fpds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood){
						$txt = $txt." OR $fpds ";
					}
					if($oss != "" && !$isfirstgood2) {
						$txt = $txt." $oss ";
						$isfirstgood2 = true;
					}elseif($oss != "" && $isfirstgood2){
						$txt = $txt."OR $oss ";
					}
					if($rpds != ""  && !$isfirstgood2) {
						$txt = $txt." $rpds ";
						$isfirstgood2 = true;
					}elseif($rpds != "" && $isfirstgood2){
						$txt = $txt."OR $rpds ";
					}
					if($endos != ""  && !$isfirstgood2) {
						$txt = $txt." $endos ";
						$isfirstgood2 = true;
					}elseif($endos != "" && $isfirstgood2){
						$txt = $txt."OR $endos ";
					}
					if($pedos != ""  && !$isfirstgood2) {
						$txt = $txt." $pedos ";
						$isfirstgood2 = true;
					}elseif($pedos != "" && $isfirstgood2){
						$txt = $txt."OR $pedos ";
					}
					if($orthos != ""  && !$isfirstgood2) {
						$txt = $txt." $orthos ";
						$isfirstgood2 = true;
					}elseif($orthos != "" && $isfirstgood2){
						$txt = $txt."OR $orthos ";
					}
					if($restos != ""  && !$isfirstgood2) {
						$txt = $txt." $restos ";
						$isfirstgood2 = true;
					}elseif($restos != "" && $isfirstgood2){
						$txt = $txt."OR $restos ";
					}
					if($cds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood2){
						$txt = $txt."OR $cds ";
					}
					$txt = $txt.") ";
				}
				

				if($dentdemo != "") {
					if($treatinfo == "") $txt = $txt." (";
					else $txt = $txt." $demo (";
					$isfirstgood = true;

					if($carvar != "") {
						$txt = $txt." $carvar";
					}else $isfirstgood = false;
					if($recvar != "" && !$isfirstgood) {
						$txt = $txt." $recvar";
						$isfirstgood = true;
					}elseif($recvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $recvar";
					}
					if($resvar != "" && !$isfirstgood) {
						$txt = $txt." $resvar";
						$isfirstgood = true;
					}elseif($resvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $resvar";
					}
					if($remvar != "" && !$isfirstgood) {
						$txt = $txt." $remvar";
						$isfirstgood = true;
					}elseif($remvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $remvar";
					}
					if($extvar != "" && !$isfirstgood) {
						$txt = $txt." $extvar";
						$isfirstgood = true;
					}elseif($extvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $extvar";
					}
					if($intvar != "" && !$isfirstgood) {
						$txt = $txt." $intvar";
						$isfirstgood = true;
					}elseif($intvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $intvar";
					}
					if($mdrvar != "" && !$isfirstgood) {
						$txt = $txt." $mdrvar";
						$isfirstgood = true;
					}elseif($mdrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $mdrvar";
					}
					if($ddrvar != "" && !$isfirstgood) {
						$txt = $txt." $ddrvar";
						$isfirstgood = true;
					}elseif($ddrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $ddrvar";
					}
					if($rotvar != "" && !$isfirstgood) {
						$txt = $txt." $rotvar";
						$isfirstgood = true;
					}elseif($rotvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $rotvar";
					}
					if($pccvar != "" && !$isfirstgood) {
						$txt = $txt." $pccvar";
						$isfirstgood = true;
					}elseif($pccvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $pccvar";
					}
					if($rctvar != "" && !$isfirstgood) {
						$txt = $txt." $rctvar";
						$isfirstgood = true;
					}elseif($rctvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $rctvar";
					}
					if($pafvar != "" && !$isfirstgood) {
						$txt = $txt." $pafvar";
						$isfirstgood = true;
					}elseif($pafvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $pafvar";
					}
					if($exrvar != "" && !$isfirstgood) {
						$txt = $txt." $exrvar";
						$isfirstgood = true;
					}elseif($exrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $exrvar";
					}
					if($misvar != "" && !$isfirstgood) {
						$txt = $txt." $misvar";
						$isfirstgood = true;
					}elseif($misvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $misvar";
					}
					if($unevar != "" && !$isfirstgood) {
						$txt = $txt." $unevar";
						$isfirstgood = true;
					}elseif($unevar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $unevar";
					}
					if($impvar != "" && !$isfirstgood) {
						$txt = $txt." $impvar";
						$isfirstgood = true;
					}elseif($impvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $impvar";
					}
					if($porvar != "" && !$isfirstgood) {
						$txt = $txt." $porvar";
						$isfirstgood = true;
					}elseif($porvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $porvar";
					} 
					if($acrvar != "" && !$isfirstgood) {
						$txt = $txt." $acrvar";
						$isfirstgood = true;
					}elseif($acrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $acrvar";
					}
					if($metvar != "" && !$isfirstgood) {
						$txt = $txt." $metvar";
						$isfirstgood = true;
					}elseif($metvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $metvar";
					}
					if($pftvar != "" && !$isfirstgood) {
						$txt = $txt." $pftvar";
						$isfirstgood = true;
					}elseif($pftvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $pftvar";
					}
					$txt = $txt.") ";

				}
				$txt = $txt.") ";

				echo "elseif2 = $txt";
				$query = $this->db->query($txt);	

			}elseif($dentdemo == "" && $servdemo != ""){

				if($servinfo != "") $txt = $txt.", $servinfo"; 
				$isfirstgood4 = true;

				if($patinfo != "") $txt = $txt." WHERE patient.UPCD_ID = patientinfo.UPCD_ID ";
				else $isfirstgood4 = false;
				if($treatinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = treatmentplan.UPCD_ID ";
					$isfirstgood4 = true;
				}
				elseif($treatinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = treatmentplan.UPCD_ID ";

				if($servinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = serviceneeded.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($servinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = serviceneeded.UPCD_ID";
				
				$txt = $txt." AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' $occs $demo (";
				if($treatinfo != ""){
					$txt = $txt." (";
					$isfirstgood2 = true;

					if($perios != "") $txt = $txt." $perios ";
					else $isfirstgood2 = false;
					if($fpds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood){
						$txt = $txt." OR $fpds ";
					}
					if($oss != "" && !$isfirstgood2) {
						$txt = $txt." $oss ";
						$isfirstgood2 = true;
					}elseif($oss != "" && $isfirstgood2){
						$txt = $txt."OR $oss ";
					}
					if($rpds != ""  && !$isfirstgood2) {
						$txt = $txt." $rpds ";
						$isfirstgood2 = true;
					}elseif($rpds != "" && $isfirstgood2){
						$txt = $txt."OR $rpds ";
					}
					if($endos != ""  && !$isfirstgood2) {
						$txt = $txt." $endos ";
						$isfirstgood2 = true;
					}elseif($endos != "" && $isfirstgood2){
						$txt = $txt."OR $endos ";
					}
					if($pedos != ""  && !$isfirstgood2) {
						$txt = $txt." $pedos ";
						$isfirstgood2 = true;
					}elseif($pedos != "" && $isfirstgood2){
						$txt = $txt."OR $pedos ";
					}
					if($orthos != ""  && !$isfirstgood2) {
						$txt = $txt." $orthos ";
						$isfirstgood2 = true;
					}elseif($orthos != "" && $isfirstgood2){
						$txt = $txt."OR $orthos ";
					}
					if($restos != ""  && !$isfirstgood2) {
						$txt = $txt." $restos ";
						$isfirstgood2 = true;
					}elseif($restos != "" && $isfirstgood2){
						$txt = $txt."OR $restos ";
					}
					if($cds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood2){
						$txt = $txt."OR $cds ";
					}
					$txt = $txt.") ";
				}

				if($servdemo != "") {
					if($treatinfo == "") $txt = $txt." (";
					else $txt = $txt." $demo (";
					$isfirstgood3 = true;

					if($c1var != "") {
						$txt = $txt." $c1var";
					}else $isfirstgood3 = false;
					if($c2var != "" && !$isfirstgood3) {
						$txt = $txt." $c2var";
						$isfirstgood3 = true;
					}elseif($c2var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c2var";
					}
					if($c3var != "" && !$isfirstgood3) {
						$txt = $txt." $c3var";
						$isfirstgood3 = true;
					}elseif($c3var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c3var";
					}
					if($c4var != "" && !$isfirstgood3) {
						$txt = $txt." $c4var";
						$isfirstgood3 = true;
					}elseif($c4var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c4var";
					}
					if($c5var != "" && !$isfirstgood3) {
						$txt = $txt." $c5var";
						$isfirstgood3 = true;
					}elseif($c5var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c5var";
					}
					if($olvar != "" && !$isfirstgood3) {
						$txt = $txt." $olvar";
						$isfirstgood3 = true;
					}elseif($olvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $olvar";
					}
					if($exvar != "" && !$isfirstgood3) {
						$txt = $txt." $exvar";
						$isfirstgood3 = true;
					}elseif($exvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $exvar";
					}
					if($odvar != "" && !$isfirstgood3) {
						$txt = $txt." $odvar";
						$isfirstgood3 = true;
					}elseif($odvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $odvar";
					}
					if($scvar != "" && !$isfirstgood3) {
						$txt = $txt." $scvar";
						$isfirstgood3 = true;
					}elseif($scvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $scvar";
					}
					if($pdvar != "" && !$isfirstgood3) {
						$txt = $txt." $pdvar";
						$isfirstgood3 = true;
					}elseif($pdvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $pdvar";
					}
					if($orvar != "" && !$isfirstgood3) {
						$txt = $txt." $orvar";
						$isfirstgood3 = true;
					}elseif($orvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $orvar";
					}
					if($psvar != "" && !$isfirstgood3) {
						$txt = $txt." $psvar";
						$isfirstgood3 = true;
					}elseif($psvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $psvar";
					}
					if($rcvar != "" && !$isfirstgood3) {
						$txt = $txt." $rcvar";
						$isfirstgood3 = true;
					}elseif($rcvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $rcvar";
					}
					if($tfvar != "" && !$isfirstgood3) {
						$txt = $txt." $tfvar";
						$isfirstgood3 = true;
					}elseif($tfvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $tfvar";
					}
					if($lmvar != "" && !$isfirstgood3) {
						$txt = $txt." $lmvar";
						$isfirstgood3 = true;
					}elseif($lmvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $lmvar";
					}
					if($anvar != "" && !$isfirstgood3) {
						$txt = $txt." $anvar";
						$isfirstgood3 = true;
					}elseif($anvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $anvar";
					}
					if($povar != "" && !$isfirstgood3) {
						$txt = $txt." $povar";
						$isfirstgood3 = true;
					}elseif($povar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $povar";
					}
					if($bsvar != "" && !$isfirstgood3) {
						$txt = $txt." $bsvar";
						$isfirstgood3 = true;
					}elseif($bsvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $bsvar";
					}
					if($sivar != "" && !$isfirstgood3) {
						$txt = $txt." $sivar";
						$isfirstgood3 = true;
					}elseif($sivar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $sivar";
					}
					$txt = $txt.") ";
				}

				$txt = $txt.") ";
				$query = $this->db->query($txt);

				echo "elseif3 = $txt";
			
			}elseif($dentdemo != "" && $servdemo != ""){
				if($dentinfo != "") $txt = $txt.", $dentinfo";
				if($carinfo != "") $txt = $txt.", $carinfo"; 
				if($recinfo != "") $txt = $txt.", $recinfo";
				if($resinfo != "") $txt = $txt.", $resinfo";
				if($servinfo != "") $txt = $txt.", $servinfo"; 

				$isfirstgood4 = true;

				if($patinfo != "") $txt = $txt." WHERE patient.UPCD_ID = patientinfo.UPCD_ID ";
				else $isfirstgood4 = false;
				if($treatinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = treatmentplan.UPCD_ID ";
					$isfirstgood4 = true;
				}
				elseif($treatinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = treatmentplan.UPCD_ID ";

				$isfirstgood4 = true;
				if($patinfo != "") $txt = $txt." WHERE patient.UPCD_ID = patientinfo.UPCD_ID ";
				else $isfirstgood4 = false;
				if($treatinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = treatmentplan.UPCD_ID ";
					$isfirstgood4 = true;
				}
				elseif($treatinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = treatmentplan.UPCD_ID ";

				if($dentinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = dentalchart.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($dentinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = dentalchart.UPCD_ID";

				if($carinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = cariesstatus.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($carinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = cariesstatus.UPCD_ID";
				if($recinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = recurrentstatus.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($recinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = recurrentstatus.UPCD_ID";
				if($resinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = restorationstatus.UPCD_ID";
					$isfirstgood4 = true;
				}
				elseif($resinfo != "" && $isfirstgood4) $txt = $txt." AND patient.UPCD_ID = restorationstatus.UPCD_ID";
				if($servinfo != "" && !$isfirstgood4) {
					$txt = $txt." WHERE patient.UPCD_ID = serviceneeded.UPCD_ID";
					$isfirstgood4 = true;
				}
				else $txt = $txt." AND patient.UPCD_ID = serviceneeded.UPCD_ID";

				$txt = $txt." AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' $occs $demo (";
				if($treatinfo != ""){
					$txt = $txt." (";
					$isfirstgood2 = true;

					if($perios != "") $txt = $txt." $perios ";
					else $isfirstgood2 = false;
					if($fpds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood){
						$txt = $txt." OR $fpds ";
					}
					if($oss != "" && !$isfirstgood2) {
						$txt = $txt." $oss ";
						$isfirstgood2 = true;
					}elseif($oss != "" && $isfirstgood2){
						$txt = $txt."OR $oss ";
					}
					if($rpds != ""  && !$isfirstgood2) {
						$txt = $txt." $rpds ";
						$isfirstgood2 = true;
					}elseif($rpds != "" && $isfirstgood2){
						$txt = $txt."OR $rpds ";
					}
					if($endos != ""  && !$isfirstgood2) {
						$txt = $txt." $endos ";
						$isfirstgood2 = true;
					}elseif($endos != "" && $isfirstgood2){
						$txt = $txt."OR $endos ";
					}
					if($pedos != ""  && !$isfirstgood2) {
						$txt = $txt." $pedos ";
						$isfirstgood2 = true;
					}elseif($pedos != "" && $isfirstgood2){
						$txt = $txt."OR $pedos ";
					}
					if($orthos != ""  && !$isfirstgood2) {
						$txt = $txt." $orthos ";
						$isfirstgood2 = true;
					}elseif($orthos != "" && $isfirstgood2){
						$txt = $txt."OR $orthos ";
					}
					if($restos != ""  && !$isfirstgood2) {
						$txt = $txt." $restos ";
						$isfirstgood2 = true;
					}elseif($restos != "" && $isfirstgood2){
						$txt = $txt."OR $restos ";
					}
					if($cds != ""  && !$isfirstgood2) {
						$txt = $txt." $fpds ";
						$isfirstgood2 = true;
					}elseif($fpds != "" && $isfirstgood2){
						$txt = $txt."OR $cds ";
					}
					$txt = $txt.") ";
				}

				if($dentdemo != "") {
					if($treatinfo == "") $txt = $txt." (";
					else $txt = $txt." $demo (";
					$isfirstgood = true;

					if($carvar != "") {
						$txt = $txt." $carvar";
					}else $isfirstgood = false;
					if($recvar != "" && !$isfirstgood) {
						$txt = $txt." $recvar";
						$isfirstgood = true;
					}elseif($recvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $recvar";
					}
					if($resvar != "" && !$isfirstgood) {
						$txt = $txt." $resvar";
						$isfirstgood = true;
					}elseif($resvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $resvar";
					}
					if($remvar != "" && !$isfirstgood) {
						$txt = $txt." $remvar";
						$isfirstgood = true;
					}elseif($remvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $remvar";
					}
					if($extvar != "" && !$isfirstgood) {
						$txt = $txt." $extvar";
						$isfirstgood = true;
					}elseif($extvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $extvar";
					}
					if($intvar != "" && !$isfirstgood) {
						$txt = $txt." $intvar";
						$isfirstgood = true;
					}elseif($intvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $intvar";
					}
					if($mdrvar != "" && !$isfirstgood) {
						$txt = $txt." $mdrvar";
						$isfirstgood = true;
					}elseif($mdrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $mdrvar";
					}
					if($ddrvar != "" && !$isfirstgood) {
						$txt = $txt." $ddrvar";
						$isfirstgood = true;
					}elseif($ddrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $ddrvar";
					}
					if($rotvar != "" && !$isfirstgood) {
						$txt = $txt." $rotvar";
						$isfirstgood = true;
					}elseif($rotvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $rotvar";
					}
					if($pccvar != "" && !$isfirstgood) {
						$txt = $txt." $pccvar";
						$isfirstgood = true;
					}elseif($pccvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $pccvar";
					}
					if($rctvar != "" && !$isfirstgood) {
						$txt = $txt." $rctvar";
						$isfirstgood = true;
					}elseif($rctvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $rctvar";
					}
					if($pafvar != "" && !$isfirstgood) {
						$txt = $txt." $pafvar";
						$isfirstgood = true;
					}elseif($pafvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $pafvar";
					}
					if($exrvar != "" && !$isfirstgood) {
						$txt = $txt." $exrvar";
						$isfirstgood = true;
					}elseif($exrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $exrvar";
					}
					if($misvar != "" && !$isfirstgood) {
						$txt = $txt." $misvar";
						$isfirstgood = true;
					}elseif($misvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $misvar";
					}
					if($unevar != "" && !$isfirstgood) {
						$txt = $txt." $unevar";
						$isfirstgood = true;
					}elseif($unevar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $unevar";
					}
					if($impvar != "" && !$isfirstgood) {
						$txt = $txt." $impvar";
						$isfirstgood = true;
					}elseif($impvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $impvar";
					}
					if($porvar != "" && !$isfirstgood) {
						$txt = $txt." $porvar";
						$isfirstgood = true;
					}elseif($porvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $porvar";
					} 
					if($acrvar != "" && !$isfirstgood) {
						$txt = $txt." $acrvar";
						$isfirstgood = true;
					}elseif($acrvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $acrvar";
					}
					if($metvar != "" && !$isfirstgood) {
						$txt = $txt." $metvar";
						$isfirstgood = true;
					}elseif($metvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $metvar";
					}
					if($pftvar != "" && !$isfirstgood) {
						$txt = $txt." $pftvar";
						$isfirstgood = true;
					}elseif($pftvar != "" && $isfirstgood){
						$txt = $txt." $dentdemo $pftvar";
					}
					$txt = $txt.") ";

				}

				if($servdemo != "") {
					if($treatinfo == "" && $dentinfo == "") $txt = $txt." (";
					else $txt = $txt." $demo (";
					$isfirstgood3 = true;

					if($c1var != "") {
						$txt = $txt." $c1var";
					}else $isfirstgood3 = false;
					if($c2var != "" && !$isfirstgood3) {
						$txt = $txt." $c2var";
						$isfirstgood3 = true;
					}elseif($c2var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c2var";
					}
					if($c3var != "" && !$isfirstgood3) {
						$txt = $txt." $c3var";
						$isfirstgood3 = true;
					}elseif($c3var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c3var";
					}
					if($c4var != "" && !$isfirstgood3) {
						$txt = $txt." $c4var";
						$isfirstgood3 = true;
					}elseif($c4var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c4var";
					}
					if($c5var != "" && !$isfirstgood3) {
						$txt = $txt." $c5var";
						$isfirstgood3 = true;
					}elseif($c5var != "" && $isfirstgood3){
						$txt = $txt." $servdemo $c5var";
					}
					if($olvar != "" && !$isfirstgood3) {
						$txt = $txt." $olvar";
						$isfirstgood3 = true;
					}elseif($olvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $olvar";
					}
					if($exvar != "" && !$isfirstgood3) {
						$txt = $txt." $exvar";
						$isfirstgood3 = true;
					}elseif($exvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $exvar";
					}
					if($odvar != "" && !$isfirstgood3) {
						$txt = $txt." $odvar";
						$isfirstgood3 = true;
					}elseif($odvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $odvar";
					}
					if($scvar != "" && !$isfirstgood3) {
						$txt = $txt." $scvar";
						$isfirstgood3 = true;
					}elseif($scvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $scvar";
					}
					if($pdvar != "" && !$isfirstgood3) {
						$txt = $txt." $pdvar";
						$isfirstgood3 = true;
					}elseif($pdvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $pdvar";
					}
					if($orvar != "" && !$isfirstgood3) {
						$txt = $txt." $orvar";
						$isfirstgood3 = true;
					}elseif($orvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $orvar";
					}
					if($psvar != "" && !$isfirstgood3) {
						$txt = $txt." $psvar";
						$isfirstgood3 = true;
					}elseif($psvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $psvar";
					}
					if($rcvar != "" && !$isfirstgood3) {
						$txt = $txt." $rcvar";
						$isfirstgood3 = true;
					}elseif($rcvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $rcvar";
					}
					if($tfvar != "" && !$isfirstgood3) {
						$txt = $txt." $tfvar";
						$isfirstgood3 = true;
					}elseif($tfvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $tfvar";
					}
					if($lmvar != "" && !$isfirstgood3) {
						$txt = $txt." $lmvar";
						$isfirstgood3 = true;
					}elseif($lmvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $lmvar";
					}
					if($anvar != "" && !$isfirstgood3) {
						$txt = $txt." $anvar";
						$isfirstgood3 = true;
					}elseif($anvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $anvar";
					}
					if($povar != "" && !$isfirstgood3) {
						$txt = $txt." $povar";
						$isfirstgood3 = true;
					}elseif($povar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $povar";
					}
					if($bsvar != "" && !$isfirstgood3) {
						$txt = $txt." $bsvar";
						$isfirstgood3 = true;
					}elseif($bsvar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $bsvar";
					}
					if($sivar != "" && !$isfirstgood3) {
						$txt = $txt." $sivar";
						$isfirstgood3 = true;
					}elseif($sivar != "" && $isfirstgood3){
						$txt = $txt." $servdemo $sivar";
					}
					$txt = $txt.") ";
				}

				$txt = $txt.") ";

				echo "elseif4 = $txt";
				$query = $this->db->query($txt);
			}


			
//WHERE patient.UPCD_ID = serviceneeded.UPCD_ID AND patient.UPCD_ID = patientinfo.UPCD_ID AND patient.UPCD_ID = treatmentplan.UPCD_ID AND patient.UPCD_ID = dentalchart.UPCD_ID AND patient.UPCD_ID = cariesstatus.UPCD_ID AND patient.UPCD_ID = recurrentstatus.UPCD_ID AND patient.UPCD_ID = restorationstatus.UPCD_ID AND WHERE patient.UPCD_ID = patientinfo.UPCD_ID AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' $occs $demo ( ($perios OR $rpds OR $orthos OR $oss OR $fpds OR $pedos OR $endos OR $cds OR $restos) $demo ($carvar OR $recvar OR $resvar OR $remvar OR $extvar OR $intvar OR $mdrvar OR $ddrvar OR $rotvar OR $pccvar OR $rctvar OR $pafvar OR $exrvar OR $misvar OR $unevar OR $impvar OR $porvar OR $acrvar OR $metvar OR $pftvar) $demo ($c1var OR $c2var OR $c3var OR $c4var OR $c5var OR $olvar OR $exvar OR $odvar OR $scvar OR $pdvar OR $orvar OR $psvar OR $rcvar OR $tfvar OR $lmvar OR $anvar OR $povar OR $bsvar OR $sivar))"


		}
		else{
			if($patinfo != ""){
				$txt = "SELECT * FROM  patient, $patinfo WHERE patient.UPCD_ID = patientinfo.UPCD_ID AND $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%' $occs";
				echo "elseif5 = $txt";

				$query = $this->db->query($txt);
			}
			else{ 
			$txt = "SELECT * FROM  patient WHERE $gender AND patient.age >= $agefrom AND patient.age <= $ageto AND patient.city LIKE '%$city%'";
			echo "elseif6 = $txt";
			$query = $this->db->query($txt);
			}
		}

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function searchPatient2($perio, $rpd, $ortho, $os, $fpd, $pedo, $endo, $cd, $resto){
		/*$this -> db -> select('*');
		$this -> db -> from('patient');
		$this->db->join('patientinfo', 'patient.UPCD_ID = patientinfo.UPCD_ID');
		//$this->db->where('patient.age >=', $agefrom);
		//$this->db->where('patient.age <=', $ageto); 
		$this->db->where('patient.gender', $gender);
		$this->db->where('patient.city', $city);
		$this->db->where('patientinfo.occupation', $occ);*/

		$query = $this->db->query("SELECT * FROM  patient, treatmentplan WHERE patient.UPCD_ID = treatmentplan.UPCD_ID AND section = '$section' AND (treatmentplan.perio='$perio' OR treatmentplan.rpd='$rpd' OR treatmentplan.ortho='$ortho' OR treatmentplan.os='$os' OR treatmentplan.fpd='$fpd' OR treatmentplan.pedo='$pedo' OR treatmentplan.endo='$endo' OR treatmentplan.cd='$cd' OR treatmentplan.resto='$resto')");

//		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function searchPatient3($caries, $extrusion, $compdent, $impacted, $recurrent, $intrusion, $singdent, $missing, $restoration, $mdr, $rempardent, $acrcr, $pftm, $ddr, $pafs, $metcr, $rot, $rct, $pcc, $extracted, $unerupted, $porcr){

		$carvar = "";
		$recvar = "";
		$resvar = "";
		$impvar = "";
		$extvar = "";
		$intvar = "";
		$sinvar = "";
		$misvar = "";
		$mdrvar = "";
		$remvar = "";
		$acrvar = "";
		$pftvar = "";
		$ddrvar = "";
		$pafvar = "";
		$metvar = "";
		$rotvar = "";
		$rctvar = "";
		$pccvar = "";
		$exrvar = "";
		$unevar = "";
		$porvar = "";

		if($caries == "Yes") $carvar = "!";
		if($recurrent == "Yes") $recvar = "!";
		if($restoration == "Yes") $resvar = "!";
		if($impacted == "Yes") $impvar = "!";
		if($extrusion == "Yes") $extvar = "!";
		if($intrusion == "Yes") $resvar = "!";
		if($singdent == "Yes") $sinvar = "!";
		if($missing == "Yes") $misvar = "!";
		if($mdr == "Yes") $mdrvar = "!";
		if($rempardent == "Yes") $remvar = "!";
		if($acrcr == "Yes") $acrvar = "!";
		if($pftm == "Yes") $pftvar = "!";
		if($ddr == "Yes") $ddrvar = "!";
		if($pafs == "Yes") $pafvar = "!";
		if($metcr == "Yes") $metvar = "!";
		if($rot == "Yes") $rotvar = "!";
		if($rct == "Yes") $rctvar = "!";
		if($pcc == "Yes") $pccvar = "!";
		if($extracted == "Yes") $exrvar = "!";
		if($unerupted == "Yes") $unevar = "!";
		if($porcr == "Yes") $porvar = "!";

		$query = $this->db->query("SELECT * FROM  patient, dentalchart, cariesstatus, recurrentstatus, restorationstatus WHERE patient.UPCD_ID = dentalchart.UPCD_ID AND patient.UPCD_ID = cariesstatus.UPCD_ID AND patient.UPCD_ID = recurrentstatus.UPCD_ID AND patient.UPCD_ID = restorationstatus.UPCD_ID AND (cariesstatus.distal_caries $carvar= '' OR cariesstatus.mesial_caries $carvar= '' OR cariesstatus.buccal_caries $carvar= '' OR cariesstatus.occlusal_caries $carvar= '' OR cariesstatus.lingual_caries $carvar= '' OR recurrentstatus.distal_recurrent $recvar= '' OR recurrentstatus.mesial_recurrent $recvar= '' OR recurrentstatus.buccal_recurrent $recvar= '' OR recurrentstatus.occlusal_recurrent $recvar= '' OR recurrentstatus.lingual_recurrent $recvar= '' OR restorationstatus.distal_restoration $resvar= '' OR restorationstatus.mesial_restoration $resvar= '' OR restorationstatus.buccal_restoration $resvar= '' OR restorationstatus.occlusal_restoration $resvar= '' OR restorationstatus.lingual_restoration $resvar= '' OR dentalchart.removable_partial_denture $remvar= '' OR dentalchart.extrusion $extvar= '' OR dentalchart.intrusion $intvar= '' OR dentalchart.mesial_rotation $mdrvar= '' OR dentalchart.distal_rotation $ddrvar= '' OR dentalchart.rotation $rot= '' OR dentalchart.postcore_crown $pccvar= '' OR dentalchart.rootcanal_treatment $rct= '' OR dentalchart.pitfissure_sealants $pafvar= '' OR dentalchart.extracted $exr= '' OR dentalchart.missing $misvar= '' OR dentalchart.unerupted $unevar= '' OR dentalchart.impacted $impvar= '' OR dentalchart.porcelain_crown $porvar= '' OR dentalchart.acrylic_crown $acrvar= '' OR dentalchart.metal_crown $metvar= '' OR dentalchart.porcelain_fused $pftvar= '')");

//		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function searchPatient4($class1, $class2, $class3, $class4, $class5, $onlay, $extraction, $odon, $specclass, $pedodontics, $orthodontics, $pulpsed, $roc, $temfill, $moai, $moti, $lamented, $completedenture, $anterior, $singlecrown, $posterior, $bridge, $singledenture, $removablepartialdenture){

		if($class1 == "Yes") $c1var = "!";
		if($class2 == "Yes") $c2var = "!";
		if($class3 == "Yes") $c3var = "!";
		if($class4 == "Yes") $c4var = "!";
		if($class5 == "Yes") $c5var = "!";
		if($onlay == "Yes") $olvar = "!";
		if($extracted == "Yes") $exvar = "!";
		if($odon == "Yes") $odvar = "!";
		if($specclass == "Yes") $scvar = "!";
		if($pedodontics == "Yes") $pdvar = "!";
		if($orthodontics == "Yes") $orvar = "!";
		if($pulpsed == "Yes") $psvar = "!";
		if($roc == "Yes") $rcvar = "!";
		if($tempfill == "Yes") $tfvar = "!";
		if($lamented == "Yes") $lmvar = "!";
		if($anterior == "Yes") $anvar = "!";
		if($singlecrown == "Yes") $sivar = "!";
		if($posterior == "Yes") $povar = "!";
		if($bridge == "Yes") $bsvar = "!";

		$query = $this->db->query("SELECT * FROM  patient, serviceneeded WHERE patient.UPCD_ID = serviceneeded.UPCD_ID AND (serviceneeded.class1 $c1var= '' OR serviceneeded.class2 $c2var= '' OR serviceneeded.class3 $c3var= '' OR serviceneeded.class4 $c4var= '' OR serviceneeded.class5 $c5var= '' OR serviceneeded.onlay $olvar= '' OR serviceneeded.extracted $exvar= '' OR serviceneeded.odontectomy $odvar= '' OR serviceneeded.special_case $scvar= '' OR serviceneeded.pedodontics $pdvar= '' OR serviceneeded.orthodontics $orvar= '' OR serviceneeded.pulp_sedation $psvar= '' OR serviceneeded.crown_recementation $rcvar= '' OR serviceneeded.filling_service $tfvar= '' OR serviceneeded.lamented $lmvar= '' OR serviceneeded.anterior $anvar= '' OR serviceneeded.posterior $povar= '' OR serviceneeded.bridge_service $bsvar= '' OR serviceneeded.single_crown $sivar= '')");

//		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientInfoVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('patientinfoversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientChecklistVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('patientchecklistversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getMedAndSocHistoVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('medandsochistoversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getDentalDataVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('dentaldataversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getDentalChartVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('dentalchartversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getTreatmentPlanVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('treatmentplanversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getRadioExamVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('radiographicexamversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getServicesRenderedVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('servicesrenderedversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getConFindVersions($id){
		$this -> db -> select('*');
		$this -> db -> from('confindversion');
		$this->db->where('UPCD_ID', $id);
		$this->db->where('updateStatus', 'Approved');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest1($id){
		$this->db->select_max('patientinfoID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('patientinfo');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest2($id){
		$this->db->select_max('checklistID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('patientchecklist');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest3($id){
		$this->db->select_max('medhistoID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('medicalhistory');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest4($id){
		$this->db->select_max('denthistoID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('dentalhistory');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest5($id){
		$this->db->select_max('dentalchartID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('dentalchart');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest6($id){
		$this->db->select_max('treatmentplanID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('treatmentplan');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest7($id){
		$this->db->select_max('radioexamID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('radiographicexam');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest8($id){
		$this->db->select_max('servicesrenderedID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('servicesrendered');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatest9($id){
		$this->db->select_max('confindID');
		$this->db->where('UPCD_ID', $id);
		$query = $this->db->get('consultationandfindings');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getMaxId(){
		$this -> db -> select('UPCD_ID');
		$this -> db -> from('patient');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function addPatientServices($id, $perio, $rpd, $resto, $os, $fpd, $pedo, $endo, $cd, $ortho){
		$data = array(
			'UPCD_ID' => $id,
			'perio' => $perio,
			'rpd' => $rpd,
			'resto' => $resto,
			'os' => $os,
			'fpd' => $fpd,
			'pedo' => $pedo,
			'endo' => $endo,
			'cd' => $cd,
			'ortho' => $ortho);
		$this->db->insert('patientServices', $data);
	}

	function getPatientServices($id){
		$this->db->select('*');
		$this->db->from('patientServices');
		$this->db->where('UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function addStudentTask($patientID, $section){
		$data = array(
			'UPCD_ID' => $patientID,
			'section' => $section,
			'taskdescription' => 'Assign to '.$section.' Clinician'
		);
		$this->db->insert('studenttasks', $data);
	}

	function getStudentTask($section, $studentID){
		/*$this->db->select('*');
		$this->db->from('studenttasks');
		$this->db->where('section', $section);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}*/

		$query = $this->db->query("SELECT * FROM studenttasks where section = '$section' OR clinicianID=$studentID");

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientRecordStatus($id){
		$this->db->select('status');
		$this->db->from('patient');
		$this->db->where('UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function deleteStudentTask($id){
		$this->db->where('UPCD_ID', $id);
		$this->db->delete('studenttasks');
	}

	function updateClinician($patientID, $facultyID){
		$data2 = array(
			'clinician' => $facultyID
            	);
		$this->db->where('UPCD_ID', $patientID);
		$this->db->update('patient', $data2);
	}

	function updatePatientApprover($patientID, $facultyid){
		$data = array(
			'approvedBy7' => $facultyid
            	);
		$this->db->where('UPCD_ID7', $patientID);
		$this->db->update('patientdashboardversion', $data); 
	}

	function updatePatientRecordStatus($id, $status){
		$data2 = array(
			'status' => $status
            	);
		$this->db->where('UPCD_ID', $id);
		$this->db->update('patient', $data2);
	}


	function getFacultyTask($section, $facultyid){
		/*$this -> db -> select('*');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('currentsection7', $section);
		$this->db->where('updateStatus7', 'Pending');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}*/
		
		$query = $this->db->query("SELECT * FROM patientdashboardversion where updateStatus7 = 'Pending' AND (currentsection7 = '$section' OR approvedBy7=$facultyid)");

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}

		//$query = $this->db->query("SELECT * FROM patientdashboardversion where ");
		/*if($section == "Oral Diagnosis"){
			//$query = $this->db->query("SELECT * FROM patientinfoversion, patientchecklistversion, medandsochistoversion, dentaldataversion, dentalchartversion, treatmentplanversion");
			
			/*this -> db -> select('*');
			$this -> db -> from('patientinfoversion, patientchecklistversion, medandsochistoversion, dentaldataversion, dentalchartversion, treatmentplanversion');
			//$this->db->join('patientchecklistversion', 'patientinfoversion.UPCD_ID = patientchecklistversion.UPCD_ID');
			//$this->db->join('medandsochistoversion', 'patientinfoversion.UPCD_ID = medandsochistoversion.UPCD_ID');
			//$this->db->join('dentaldataversion', 'patientinfoversion.UPCD_ID = dentaldataversion.UPCD_ID');
			//$this->db->join('dentalchartversion', 'patientinfoversion.UPCD_ID = dentalchartversion.UPCD_ID');
			//$this->db->join('treatmentplanversion', 'patientinfoversion.UPCD_ID = treatmentplanversion.UPCD_ID');
			//$this->db->where('patientinfoversion.updateStatus', 'Pending');

			//$query = $this -> db -> get();

			if($query -> num_rows() >= 1)
	   		{
	     			return $query->result_array();
	   		}
	   		else
	   		{
	     			return false;
	   		}
		}
		elseif($section == "Operative Dentistry"){
			$query = $this->db->query("SELECT * FROM patientdashboardversion");
		}
		elseif($section == "Oral Medicine"){
			$query = $this->db->query("SELECT * FROM patientdashboardversion");
		}
		elseif($section == "Prosthodontics"){
			$query = $this->db->query("SELECT * FROM patientdashboardversion");
		}*/
	}

	function getSection($id, $section){
		/*$this -> db -> select('section7');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('UPCD_ID7', $id);
		$this->db->where('currentsection7', $section);

		$query = $this -> db -> get();*/

		$this->db->select_max('patientdashboardversionID');
		$this->db->where('UPCD_ID7', $id);
		$query = $this->db->get('patientdashboardversion');
		$res = $query->row_array();

		$maxID = $res['patientdashboardversionID'];

		$this -> db -> select('section7');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('patientdashboardversionID', $maxID);

		$query2 = $this -> db -> get();
		
		if($query2 -> num_rows() >= 1)
   		{
     			return $query2->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientDashboardStatus($id){
		$this -> db -> select('updateStatus7');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('UPCD_ID7', $id);
	
		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientDashboardStatus2($id){
		$this -> db -> select('updateStatus7');
		$this -> db -> from('patientdashboardversion');
		$this->db->order_by("patientdashboardversionID", "desc"); 
		$this->db->limit(1);
		$this->db->where('UPCD_ID7', $id);
		$this->db->where('updateStatus7 !=', 'Approved');

	
		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getPatientDashboardStatus3($id){
		$this -> db -> select('updateStatus7');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('UPCD_ID7', $id);
		$this->db->where('updateStatus7 !=', 'Pending');
	
		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getRemarkStatus($id){
		$this -> db -> select('remarkStatus');
		$this -> db -> from('remark');
		$this->db->where('patientID', $id);
	
		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getRemarks($id){
		$this -> db -> select('*');
		$this -> db -> from('remark');
		$this->db->where('patientID', $id);
		//$this->db->where('remarkStatus', 'Temporary');
	
		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getRemarks2($id, $facultyid){
		$this -> db -> select('*');
		$this -> db -> from('remark');
		$this->db->where('patientID', $id);
		$this->db->where('userID', $facultyid);
		//$this->db->where('remarkStatus', 'Temporary');
	
		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	/*function getRemarks2($id, $remarkID){
		$this -> db -> select('*');
		$this -> db -> from('remark');
		$this->db->where('patientID', $id);
		$this->db->where('remarkID', $remarkID);
	
		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function getLatestRemarks($id){
		$this->db->select_max('remarkID');
		$this->db->where('patientID', $id);
		$query = $this->db->get('remark');

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}*/

	function hasTempRecord($patientid){
		/*$this -> db -> select('*');
		$this -> db -> from('remark');
		$this->db->where('patientID', $patientid);
		$this->db->where('remarkStatus', 'Temporary');
	
		$query = $this -> db -> get();*/
		$query = $this->db->query("SELECT * FROM remark WHERE patientID='$patientid' AND (remarkStatus='Temporary' or remarkStatus='Pending')");

		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function clearPatient($id){
		$data = array(
			'section' => 'Finished'
            	);
		$this->db->where('UPCD_ID', $id);
		$this->db->update('patient', $data); 
	}

	function updatePatientTemporary($studentid, $facultyid, $patientid, $remark, $patientinfo, $patientchecklist, $medandsochisto, $dentaldata, $dentalchart, $treatmentplan){
		/*$data = array(
			'remarkStatus' => $remark,
			'patientinfo' => $patientinfo,
			'patientchecklist' => $patientchecklist,
			'medandsochisto' => $medandsochisto,
			'dentaldata' => $dentaldata,
			'dentalchart' => $dentalchart,
			'treatmentplan' => $treatmentplan
            	);
		$this->db->where('patientID', $patientid);
		$this->db->where('remarkStatus', 'Temporary');
		$this->db->update('remark', $data);*/

		$query = $this->db->query("UPDATE remark SET remarkStatus='$remark', patientinfo='$patientinfo', patientchecklist='$patientchecklist', medandsochisto='$medandsochisto', dentaldata='$dentaldata', dentalchart='$dentalchart', treatmentplan='$treatmentplan' WHERE patientID='$patientid' AND (remarkStatus='Temporary' or remarkStatus='Pending')"); 
	}

	function updatePatientRejected2($studentid, $facultyid, $patientid, $remark, $patientinfo, $patientchecklist, $medandsochisto, $dentaldata, $dentalchart, $treatmentplan){
		$data = array(
			'remarkStatus' => $remark,
			'patientinfo' => $patientinfo,
			'patientchecklist' => $patientchecklist,
			'medandsochisto' => $medandsochisto,
			'dentaldata' => $dentaldata,
			'dentalchart' => $dentalchart,
			'treatmentplan' => $treatmentplan
            	);
		$this->db->where('patientID', $patientid);
		$this->db->where('remarkStatus', 'Pending');
		$this->db->update('remark', $data); 
	}

	function getStudentID($patientid){
		$this -> db -> select('*');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('UPCD_ID7', $patientid);
		$this->db->where('updateStatus7', 'Pending');

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function addRemark($studentid, $facultyid, $patientid, $remark, $patientinfo, $patientchecklist, $medandsochisto, $dentaldata, $dentalchart, $treatmentplan){
		$data = array(
			'userID' => $studentid,
			'patientID' => $patientid,
			'facultyID' => $facultyid,
			'remarkStatus' => $remark,
			'patientinfo' => $patientinfo,
			'patientchecklist' => $patientchecklist,
			'medandsochisto' => $medandsochisto,
			'dentaldata' => $dentaldata,
			'dentalchart' => $dentalchart,
			'treatmentplan' => $treatmentplan);
		$this->db->insert('remark', $data);
	}

	function updatePatient($patientID, $section, $facultyID, $status){
		$data = array(
               		'section' => $section,
			'status' => "Open",
			'clinician' => 'Pending'
            	);
		$this->db->where('UPCD_ID', $patientID);
		$this->db->update('patient', $data); 	

		$data2 = array(
               		'updateStatus7' => $status,
			'approvedBy7' => $facultyID,
			'currentsection7' => $section
            	);
		$this->db->where('UPCD_ID7', $patientID);
		$this->db->where('updateStatus7', 'Pending');
		$this->db->update('patientdashboardversion', $data2);

		$data3 = array(
			'UPCD_ID' => $patientID,
			'section' => $section,
			'taskdescription' => 'Assign to '.$section.' Clinician'
		);
		$this->db->insert('studenttasks', $data3);

		$this->db->where('UPCD_ID', $patientID);
		$this->db->delete('appointment');
	}

	function updatePatientRejected($patientID, $userid, $status, $currentsection, $referredsection){
		$data = array(
               		'updateStatus7' => $status
            	);
		$this->db->where('UPCD_ID7', $patientID);
		$this->db->where('updateStatus7', 'Pending');
		$this->db->update('patientdashboardversion', $data);

		$data2 = array(
			'UPCD_ID' => $patientID,
			'clinicianID' => $userid,
			'section' => $currentsection,
			'taskdescription' => 'Rejected Referral to '.$referredsection
		);
		$this->db->insert('studenttasks', $data2);
	}

	function hasPatientDB($id, $section){
		$this -> db -> select('*');
		$this -> db -> from('patientdashboardversion');
		$this->db->where('UPCD_ID7', $patientid);
		$this->db->where('currentsection7', $section);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function hasAppointment($id){
		$this -> db -> select('*');
		$this -> db -> from('appointment');
		$this->db->where('UPCD_ID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function setAppointment($patientID, $studentID, $date){
		$data = array(
			'UPCD_ID' => $patientID,
			'studentID' => $studentID,
			'appointmentDate' => $date);
		$this->db->insert('appointment', $data);
	}

	function updateAppointment($patientID, $studentID, $date){
		$data = array(
			'appointmentDate' => $date);
		$this->db->where('UPCD_ID', $patientID);
		$this->db->where('studentID', $studentID);
		$this->db->update('appointment', $data);

	}

	function deleteAppointment($id, $userID, $date){
		$this->db->where('UPCD_ID', $id);
		$this->db->delete('appointment');

	}

	function getAppointments($id){

		$this -> db -> select('*');
		$this -> db -> from('appointment');
		$this->db->where('studentID', $id);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
   		{
     			return $query->result_array();
   		}
   		else
   		{
     			return false;
   		}
	}

	function isClinician($patientid){
		$this -> db -> select('*');
		$this -> db -> from('patient');
		$this->db->where('UPCD_ID', $patientid);

		$query = $this -> db -> get();
		$res = $query->result_array();
		$clinician = "";
		foreach($res as $row){
			$clinician = $row['clinician'];
		}

		if($clinician == 'Pending'){
			return false;
		}
		else{
			return $clinician;
		}

	}

	function resetPatientRemark($patientid){
		$data2 = array(
               		'remarkStatus' => 'Pending',
			'patientinfo' => '',
			'patientchecklist' => '',
			'medandsochisto' => '',
			'dentaldata' => '',
			'dentalchart' => '',
			'treatmentplan' => ''
            	);
		$this->db->where('patientID', $patientid);
		$this->db->update('remark', $data2);
	}

	function setApproved($patientid, $facultyid){

		//PATIENT INFORMATION
		$this->db->select_max('patientinfoID');
		$this->db->where('UPCD_ID', $patientid);
		$query1 = $this->db->get('patientinfo');
		$res1 = $query1->row_array();

		if($query1 -> num_rows() >= 1) $patientinfoID = $res1['patientinfoID'];
		else $patientinfoID = false;

		if($patientinfoID){
			$data = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('patientinfoversionID', $patientinfoID);
			$this->db->update('patientinfoversion', $data);
		}

		//PATIENT CHECKLIST
		$this->db->select_max('checklistID');
		$this->db->where('UPCD_ID', $patientid);
		$query2 = $this->db->get('patientchecklist');
		$res2 = $query2->row_array();

		if($query2 -> num_rows() >= 1) $checklistID = $res2['checklistID'];
		else $checklistID = false;

		if($checklistID){
			$data2 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('patientchecklistversionID', $checklistID);
			$this->db->update('patientchecklistversion', $data2);	
		}
		
		// MED AND SOC HISTO
		$this->db->select_max('medhistoID');
		$this->db->where('UPCD_ID', $patientid);
		$query3 = $this->db->get('medicalhistory');
		$res3 = $query3->row_array();
		
		if($query3 -> num_rows() >= 1) $medhistoID = $res3['medhistoID'];
		else $medhistoID = false;

		if($medhistoID){
			$data3 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('medandsochistoversionID', $medhistoID);
			$this->db->update('medandsochistoversion', $data3);
		}

		// DENTAL DATA
		$this->db->select_max('denthistoID');
		$this->db->where('UPCD_ID', $patientid);
		$query4 = $this->db->get('dentalhistory');
		$res4 = $query4->row_array();
		
		if($query4 -> num_rows() >= 1) $denthistoID = $res4['denthistoID'];
		else $denthistoID = false;

		if($denthistoID){
			$data4 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('dentaldataversionID', $denthistoID);
			$this->db->update('dentaldataversion', $data4);
		}

		// DENTAL CHART
		$this->db->select_max('dentalchartID');
		$this->db->where('UPCD_ID', $patientid);
		$query5 = $this->db->get('dentalchart');
		$res5 = $query5->row_array();
		
		if($query5 -> num_rows() >= 1) $dentalchartID = $res5['dentalchartID'];
		else $dentalchartID = false;

		if($dentalchartID){
			$data5 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('dentalchartversionID', $dentalchartID);
			$this->db->update('dentalchartversion', $data5);
		}

		// TREATMENTPLAN
		$this->db->select_max('treatmentplanID');
		$this->db->where('UPCD_ID', $patientid);
		$query6 = $this->db->get('treatmentplan');
		$res6 = $query6->row_array();
		
		if($query6 -> num_rows() >= 1) $treatmentplanID = $res6['treatmentplanID'];
		else $treatmentplanID = false;

		if($treatmentplanID){
			$data6 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('treatmentplanversionID', $treatmentplanID);
			$this->db->update('treatmentplanversion', $data6);
		}

		// RADIOGRAPHIC EXAM
		$this->db->select_max('radioexamID');
		$this->db->where('UPCD_ID', $patientid);
		$query7 = $this->db->get('radiographicexam');
		$res7 = $query7->row_array();
		
		if($query7 -> num_rows() >= 1) $radioexamID = $res7['radioexamID'];
		else $radioexamID = false;

		if($radioexamID){
			$data7 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('radioexamversionID', $treatmentplanID);
			$this->db->update('radioexamversion', $data7);
		}

		// SERVICES RENDERED
		$this->db->select_max('servicesrenderedID');
		$this->db->where('UPCD_ID', $patientid);
		$query8 = $this->db->get('servicesrendered');
		$res8 = $query8->row_array();
		
		if($query8 -> num_rows() >= 1) $servicesrenderedID = $res8['servicesrenderedID'];
		else $servicesrenderedID = false;

		if($servicesrenderedID){
			$data8 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('servicesrenderedversionID', $servicesrenderedID);
			$this->db->update('servicesrenderedversion', $data8);
		}

		// CONSULTATION AND FINDINGS
		$this->db->select_max('confindID');
		$this->db->where('UPCD_ID', $patientid);
		$query9 = $this->db->get('consultationandfindings');
		$res9 = $query9->row_array();
		
		if($query9 -> num_rows() >= 1) $confindID = $res9['confindID'];
		else $confindID = false;

		if($confindID){
			$data9 = array(
		       		'updateStatus' => 'Approved',
				'approvedBy' => $facultyid
		    	);
			$this->db->where('UPCD_ID', $patientid);
			$this->db->where('confindversionID', $confindID);
			$this->db->update('confindversion', $data9);
		}

	}

	function isLatestForApproval1($patientid){
		/*$this->db->select_max('patientinfoversionID');
		$this->db->where('UPCD_ID', $patientid);
		$this->db->where('updateStatus', 'Pending');
		$query = $this->db->get('patientinfoversion');*/

		$this->db->select_max('patientinfoversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('patientinfoversion');
		$res = $query->row_array();

		$maxID = $res['patientinfoversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('patientinfoversion');
		$this->db->where('patientinfoversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
		
	}

	function isLatestForApproval2($patientid){
		$this->db->select_max('patientchecklistversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('patientchecklistversion');
		$res = $query->row_array();

		$maxID = $res['patientchecklistversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('patientchecklistversion');
		$this->db->where('patientchecklistversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		$versionID = $res2['updateStatus'];

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval3($patientid){
		$this->db->select_max('medandsochistoversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('medandsochistoversion');
		$res = $query->row_array();

		$maxID = $res['medandsochistoversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('medandsochistoversion');
		$this->db->where('medandsochistoversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval4($patientid){
		$this->db->select_max('dentaldataversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('dentaldataversion');
		$res = $query->row_array();

		$maxID = $res['dentaldataversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('dentaldataversion');
		$this->db->where('dentaldataversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval5($patientid){
		$this->db->select_max('dentalchartversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('dentalchartversion');
		$res = $query->row_array();

		$maxID = $res['dentalchartversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('dentalchartversion');
		$this->db->where('dentalchartversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval6($patientid){
		$this->db->select_max('treatmentplanversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('treatmentplanversion');
		$res = $query->row_array();

		$maxID = $res['treatmentplanversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('treatmentplanversion');
		$this->db->where('treatmentplanversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval7($patientid){
		$this->db->select_max('radioexamversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('radioexamversion');
		$res = $query->row_array();

		$maxID = $res['radioexamversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('radioexamversion');
		$this->db->where('radioexamversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval8($patientid){
		$this->db->select_max('servicesrenderedversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('servicesrenderedversion');
		$res = $query->row_array();

		$maxID = $res['servicesrenderedversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('servicesrenderedversion');
		$this->db->where('servicesrenderedversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function isLatestForApproval9($patientid){
		$this->db->select_max('confindversionID');
		$this->db->where('UPCD_ID', $patientid);
		$query = $this->db->get('confindversion');
		$res = $query->row_array();

		$maxID = $res['confindversionID'];

		$this -> db -> select('updateStatus');
		$this -> db -> from('confindversion');
		$this->db->where('confindversionID', $maxID);

		$query = $this -> db -> get();
		$res2 = $query->row_array();
		if($res2){
			$versionID = $res2['updateStatus'];
		}
		else 
			$versionID = false;

		if($versionID == 'Pending')
   		{
     			return true;
   		}
   		else
   		{
     			return false;
   		}
	}

	function updateTaskClinician($patientid, $userID){
		$data2 = array(
               		'clinicianID' => $userID
            	);
		$this->db->where('UPCD_ID', $patientid);
		$this->db->update('studenttasks', $data2);
	}
}

?>
