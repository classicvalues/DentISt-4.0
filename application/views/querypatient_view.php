<?php 
	include('header.php'); 
	include('navigation.php');
	
	echo "<link rel=\"stylesheet\" type=\"text/css\" href='".base_url()."css/style.css'>";
	echo "<script type=\"text/javascript\" src=\"".base_url()."js/dynamic.js\"></script>";
	echo "<script type=\"text/javascript\" src=\"".base_url()."js/patientdb.js\"></script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.custom.js"></script>

   <title>Query Patient - Oral Diagnosis</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/upcd-20140224-favicon.ico">	
<script type="text/javascript">
	
	
</script>
 </head>
<?php 
	$session_data = $this->session->userdata('logged_in');
     	$usernamelog = $session_data['username'];

	if($gender == "") $gender="both";

	//print_r($patientmatch);

?>
 <body>
  
<div class="validation" style="display:<?if(validation_errors() == true) echo 'block'; else echo 'none'?>">
   <?php echo validation_errors(); ?>
</div>
<div class="maindiv">
<h3 align="left" style="left: 1%;position: relative;">Query Patient</h3>

  	<div align="left" style="left:1%; position: relative;"><a href="<?php echo base_url(); ?>index.php/searchpatient">Go Back</a></div><br>
	
	<table frame="box" class="frame alttable" style="width:98%; left:1%;">
		<tr class="header">
			<td colspan=6> Patient
		</tr>
		<tr>
			<td colspan=6> 
			<?php 
				if($agefrom != 0 && $ageto != 100){
					echo " | Age: ".$agefrom."-".$ageto;
				}
				echo " | Gender: ".$gender;
				if($city != ""){
					echo " | City: ".$city;
				}
				if($occ != ""){
					echo " | Occupation: ".$occ;
				}
				echo " |";
			?>
		</tr>
		<tr>
			<td style="text-align:center;"><br><b>Id</b>
			<td style="text-align:center;"><br><b>Name</b>
			<td style="text-align:center;"><br><b>Age</b>
		</tr>
		<?php 	if($patientmatch){
				foreach($patientmatch as $row){
					echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>";
					echo "<td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
					echo "<td style='text-align:center;'>".$row['age'];
					echo "</tr>";
				}
			}
		?>
		<tr>
			<td colspan=6 style="text-align: right;"> <?php echo "<br>".(sizeof($patientmatch))?> record/s found.
		</tr>
		<tr>
			<td> &nbsp;
		<tr>
		</table><br>

		<table frame='box' class="frame alttable" style="width:98%; left:1%;">
			<tr class="header">
			<td colspan=2 class="noborder">Other Conditions (Using Demographics)</td>
			<td class="noborder">
			<td class="noborder" style='text-align:right;'>
			</tr>
		</table><br>
		

		<?php 	
		$sectionmatch = false;
		if ($perio == "Yes" || $rpd == "Yes" || $ortho == "Yes" || $os == "Yes" || $fpd == "Yes" || $pedo == "Yes" || $endo == "Yes" || $cd == "Yes" || $resto == "Yes") $sectionmatch = true;

		if($sectionmatch){
		echo "<table frame='box' class='frame alttable' style='width:98%; left:1%;'><tr class='header'>
			<td colspan=6> Patients
		</tr>
		<tr>
			<td>
			<td style='text-align:center;'> <b>Id</b>
			<td style='text-align:center;'> <b>Name</b>
			<td>
		</tr>";
		
				//foreach($patientmatch as $row){
					if($perio == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Periodontics";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['perio'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['perio'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($rpd == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Removable Prosthodontics </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['rpd'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['rpd'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($ortho == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Orthodontics";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['ortho'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['ortho'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}					
					if($os == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Oral Surgery";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['os'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['os'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($fpd == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Fixed Partial Prosthodontics";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['fpd'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['fpd'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($pedo == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Pedodontics";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['pedo'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['pedo'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($endo == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Endodontics";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['endo'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['endo'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($cd == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Complete Denture";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['cd'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['cd'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
					if($resto == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Restorative Dentistry";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['resto'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
								$ctr++;
							}
						}
						echo "</table></td><td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['resto'] == "Yes") { 
								echo "<tr><td style='text-align:center;'>".$row['patientFName']." ".substr($row['patientMName'], 0, 1).". ".$row['patientLName'];
								echo "</tr>";
							}
						}
						echo "</table></td></tr>";
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><br>
						<hr width='98%'>
						</tr>";
					//echo "<td>";
					//echo "</tr>";
					}
				
					echo "<td>";
					echo "</tr>";
				//}
				echo "</table><br>";
			}
		?>
		<tr>
			<td> &nbsp;
		<tr>
		<?php 	
		$dentstatmatch = false;
		if ($caries == "Yes" || $extrusion == "Yes" || $compdent == "Yes" || $impacted == "Yes" || $recurrent == "Yes" || $intrusion == "Yes" || $singdent == "Yes" || $missing == "Yes" || $restoration == "Yes" || $mdr == "Yes" || $rempardent == "Yes" || $acrcr == "Yes" || $pftm == "Yes" || $ddr == "Yes" || $pafs == "Yes" || $metcr == "Yes" || $rot == "Yes" || $rct == "Yes" || $pcc == "Yes" || $extracted == "Yes" || $unerupted == "Yes" || $porcr  == "Yes") $dentstatmatch = true;

		if($dentstatmatch){
		echo "<table frame='box' class='frame alttable' style='width:98%; left:1%;'><tr class='header'>
			<td colspan=6> Dental Chart Queries
		</tr>
		<tr>
			<td>
			<td style='text-align:center;'> <b>Id</b>
			<td style='text-align:center;'> <b>Name</b>
			<td style='text-align:center;'> <b>Tooth Number(s)</b>
		</tr>";
		
				//foreach($patientmatch as $row){
					if($caries == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Caries</tr>";
						foreach($patientmatch as $row2){
							$tok = explode(' ', $row2['distal_caries']);
							$tok2 = explode(' ', $row2['buccal_caries']);
							$tok3 = explode(' ', $row2['lingual_caries']);
							$tok4 = explode(' ', $row2['mesial_caries']);
							$tok5 = explode(' ', $row2['occlusal_caries']);

							$tootharray = array();
							foreach($tok as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok2 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok3 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok4 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok5 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}


							if(sizeof($tootharray) >= 1) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>";
								foreach($tootharray as $tth){
									echo $tth." ";
								}
								echo "</tr>";
								$ctr++;
							}
							
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
		
					}
					if($recurrent == "Yes"){
						$ctr++;
						echo "<tr><td style='text-align:center;'> Recurrent Caries </tr>";
						foreach($patientmatch as $row2){
							$tok = explode(' ', $row2['distal_recurrent']);
							$tok2 = explode(' ', $row2['buccal_recurrent']);
							$tok3 = explode(' ', $row2['lingual_recurrent']);
							$tok4 = explode(' ', $row2['mesial_recurrent']);
							$tok5 = explode(' ', $row2['occlusal_recurrent']);

							$tootharray = array();
							foreach($tok as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok2 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok3 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok4 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok5 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}


							if(sizeof($tootharray) >= 1) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>";
								foreach($tootharray as $tth){
									echo $tth." ";
								}
								echo "</tr>";
							}
							//else echo "<td colspan='3'>No results found";
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($restoration == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Restoration </tr>";
						foreach($patientmatch as $row2){
							$tok = explode(' ', $row2['distal_restoration']);
							$tok2 = explode(' ', $row2['buccal_restoration']);
							$tok3 = explode(' ', $row2['lingual_restoration']);
							$tok4 = explode(' ', $row2['mesial_restoration']);
							$tok5 = explode(' ', $row2['occlusal_restoration']);

							$tootharray = array();
							foreach($tok as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok2 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok3 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok4 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}
							foreach($tok5 as $row){
								if(!in_array($row, $tootharray) && $row != ""){
									array_push($tootharray, $row);
								}
							}


							if(sizeof($tootharray) >= 1) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>";
								foreach($tootharray as $tth){
									echo $tth." ";
								}
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($pftm == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Porcelain Fused to Metal </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['porcelain_fused']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['porcelain_fused'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($rot == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Rotation </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['rotation']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['rotation'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($extracted == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Extracted </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['extracted']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extracted'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($extrusion == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Extrusion </tr>";
						foreach($patientmatch as $row2){
							if($row2['extrusion'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extrusion'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($intrusion == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Intrusion </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['intrusion']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['intrusion'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($mdr == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Mesial Drifting Rotation </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['mesial_rotation']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['mesial_rotation'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($ddr == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Distal Drift Rotation </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['distal_rotation']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['distal_rotation'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($rct == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Root Canal Treatment </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['rootcanal_treatment']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['rootcanal_treatment'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($unerupted == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Unerupted </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['unerupted']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['unerupted'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($compdent == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Complete Denture </tr>";
						foreach($patientmatch as $row2){
							if($row2['completedenture'] == "Yes") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'></tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($singdent == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Single Denture </tr>";
						foreach($patientmatch as $row2){
							if($row2['singledenture'] == "Yes") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'></tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($rempardent == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Removable Partial Denture </tr>";
						foreach($patientmatch as $row2){
							if($row2['removablepartialdenture'] == "Yes") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'></tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($pafs == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Pit and Fissure Sealants </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['pitfissure_sealants']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['pitfissure_sealants'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($pcc == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Postcore Crown </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['postcore_crown']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['postcore_crown'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($porcr == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Porcelain Crown </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['porcelain_crown']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['porcelain_crown'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($impacted == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Impacted </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['impacted']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['impacted'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($missing == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Missing </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['missing']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['unerupted'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($acrcr == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Acrylic Crown </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['acrylic_crown']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['acrylic_crown'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($metcr == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Metal Crown </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['metal_crown']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['metal_crown'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}


					//echo "</tr>";
				//}
				echo "</table>";
			}
		?>
		<tr>
			<td> &nbsp;
		<tr>
		<?php 	
		$servicematch = false;
		if ($class1 == "Yes" ||  $class2 == "Yes" || $class3 == "Yes" || $class4 == "Yes" || $class5 == "Yes" || $onlay == "Yes" || $extraction == "Yes" || $odon == "Yes" || $specclass == "Yes" || $pedodontics == "Yes" || $orthodontics == "Yes" || $pulpsed == "Yes" || $roc == "Yes" || $temfill == "Yes" || $moai == "Yes" || $moti == "Yes" || $lamented == "Yes" || $completedenture == "Yes" || $anterior == "Yes" || $singlecrown == "Yes" || $posterior == "Yes" || $bridge == "Yes" || $singledenture == "Yes" || $removablepartialdenture  == "Yes") $servicematch = true;

		if($servicematch){
		echo "<table frame='box' class='frame alttable' style='width:98%; left:1%;'><tr class='header'>
			<td colspan=6> Needed Services Queries
		</tr>
		<tr style='text-align: center;'>
			<td>
			<td> <b>Id</b>
			<td> <b>Name</b>
			<td> <b>Tooth Number(s)</b>
		</tr>";
		
				//foreach($servicematch as $row){
					if($class1 == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Class I</tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['class1']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class1'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($class2 == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Class II </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['class2']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class2'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($class3 == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Class III</tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['class3']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class3'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($class4 == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Class IV </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['class4']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class4'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($class5 == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Class V </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['class5']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class5'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($onlay == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Onlay </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['onlay']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['onlay'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($extraction == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Extraction </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['extraction']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extraction'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($odon == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Odontectomy </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['odontectomy']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['odontectomy'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($specclass == "Yes"){
						$ctr=0;
						echo "<tr><td style='text-align:center;'> Special Case </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['special_case']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['special_case'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					/*if($pedodontics == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Pedodontics </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['pedodontics']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['pedodontics'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br></tr>";
					}
					if($orthodontics == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Orthodontics </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['orthodontics']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['orthodontics'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br></tr>";
					}*/
					if($pulpsed == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Pulp Sedation </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['pulp_sedation']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['pulp_sedation'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($roc == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Recementation of Crown </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['crown_recementation']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['crown_recementation'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($temfill == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Temporary Fillings </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['filling_service']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['filling_service'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					/*if($moai == "Yes"){
						echo "<tr><td style='text-align:center;'> Management of Acute Infections";
						foreach($patientmatch as $row2){
							if($row2['extraction']) {
								echo "<td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extraction'];
							}
						}
					}
					if($moti == "Yes"){
						echo "<tr><td style='text-align:center;'> Management of Temporary Injuries";
						foreach($patientmatch as $row2){
							if($row2['extraction']) {
								echo "<td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extraction'];
							}
						}
					}*/
					if($lamented == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Laminated </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['laminated']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['laminated'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($singlecrown == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Single Crown </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['single_crown']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['single_crown'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($bridge == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Bridge";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['bridge_service']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['bridge_service'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($anterior == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Anterior </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['anterior']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['anterior'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					if($posterior == "Yes"){
						$ctr = 0;
						echo "<tr><td style='text-align:center;'> Posterior </tr>";
						foreach($patientmatch as $row2){
							$tok = str_replace(' ', '', $row2['posterior']);
							if($tok != '') {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['posterior'];
								echo "</tr>";
								$ctr++;
							}
						}
						echo "<tr><td colspan=6 style='text-align: right;'> <br>".$ctr." record/s found.<br><hr width='98%'></tr>";
					}
					echo "</tr>";
				//}
				echo "</table>";
			}
		?>
	<br>

	</form>	
</div><br><br>

 </body>
</html>


