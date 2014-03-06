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

	print_r($patientmatch);

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
			<td colspan=6 style="text-align: right;"> <?php echo "<br>".(sizeof($patientmatch)-1)?> record/s found.
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
						echo "<tr><td style='text-align:center;'> Periodontics";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['perio'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($rpd == "Yes"){
						echo "<tr><td style='text-align:center;'> Removable Prosthodontics </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['rpd'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($ortho == "Yes"){
						echo "<tr><td style='text-align:center;'> Orthodontics </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['ortho'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}					
					if($os == "Yes"){
						echo "<tr><td style='text-align:center;'> Oral Surgery </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['os'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($fpd == "Yes"){
						echo "<tr><td style='text-align:center;'> Fixed Partial Prosthodontics </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['fpd'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($pedo == "Yes"){
						echo "<tr><td style='text-align:center;'> Pedodontics </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['pedo'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($endo == "Yes"){
						echo "<tr><td style='text-align:center;'> Endodontics </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['endo'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($cd == "Yes"){
						echo "<tr><td style='text-align:center;'> Complete Denture </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['cd'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
					//echo "<td>";
					//echo "</tr>";
					}
					if($resto == "Yes"){
						echo "<tr><td style='text-align:center;'> Restorative Dentistry </tr>";
						echo "<td>";
						foreach($patientmatch as $row){
							echo "<table style='text-align: center;' width=100%;>";
							if($row['resto'] == "Yes") {
								echo "<tr><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row['UPCD_ID'].">".$row['UPCD_ID']."</a>"; 
								echo "</tr>";
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
						echo "<tr><td style='text-align:center;'> Caries</tr>";
						foreach($patientmatch as $row2){
							if($row2['distal_caries'] != "" || $row2['buccal_caries'] != "" || $row2['mesial_caries'] != "" || $row2['occlusal_caries'] != "" || $row2['lingual_caries'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['distal_caries']." ".$row2['buccal_caries']." ".$row2['mesial_caries']." ".$row2['occlusal_caries']." ".$row2['lingual_caries'];
								echo "</tr>";
							}
						}
					}
					if($recurrent == "Yes"){
						echo "<tr><td style='text-align:center;'> Recurrent Caries </tr>";
						foreach($patientmatch as $row2){
							if($row2['distal_recurrent'] != "" || $row2['buccal_recurrent'] != "" || $row2['mesial_recurrent'] != "" || $row2['occlusal_recurrent'] != "" || $row2['lingual_recurrent'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['distal_recurrent']." ".$row2['buccal_recurrent']." ".$row2['mesial_recurrent']." ".$row2['occlusal_recurrent']." ".$row2['lingual_recurrent'];
								echo "</tr>";
							}
							else echo "<td colspan='3'>No results found";
						}
					}
					if($restoration == "Yes"){
						echo "<tr><td style='text-align:center;'> Restoration </tr>";
						foreach($patientmatch as $row2){
							if($row2['distal_restoration'] != "" || $row2['buccal_restoration'] != "" || $row2['mesial_restoration'] != "" || $row2['occlusal_restoration'] != "" || $row2['lingual_restoration'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['distal_restoration']." ".$row2['buccal_restoration']." ".$row2['mesial_restoration']." ".$row2['occlusal_restoration']." ".$row2['lingual_restoration'];
								echo "</tr>";
							}
						}
					}
					if($pftm == "Yes"){
						echo "<tr><td style='text-align:center;'> Porcelain Fused to Metal </tr>";
						foreach($patientmatch as $row2){
							if($row2['porcelain_fused'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['porcelain_fused'];
								echo "</tr>";
							}
						}
					}
					if($rot == "Yes"){
						echo "<tr><td style='text-align:center;'> Rotation </tr>";
						foreach($patientmatch as $row2){
							if($row2['rotation'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['rotation'];
								echo "</tr>";
							}
						}
					}
					if($extracted == "Yes"){
						echo "<tr><td style='text-align:center;'> Extracted </tr>";
						foreach($patientmatch as $row2){
							if($row2['extracted'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extracted'];
								echo "</tr>";
							}
						}
					}
					if($extrusion == "Yes"){
						echo "<tr><td style='text-align:center;'> Extrusion </tr>";
						foreach($patientmatch as $row2){
							if($row2['extrusion'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extrusion'];
								echo "</tr>";
							}
						}
					}
					if($intrusion == "Yes"){
						echo "<tr><td style='text-align:center;'> Intrusion </tr>";
						foreach($patientmatch as $row2){
							if($row2['extracted'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['intrusion'];
								echo "</tr>";
							}
						}
					}
					if($mdr == "Yes"){
						echo "<tr><td style='text-align:center;'> Mesial Drifting Rotation </tr>";
						foreach($patientmatch as $row2){
							if($row2['mesial_rotation'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['mesial_rotation'];
								echo "</tr>";
							}
						}
					}
					if($ddr == "Yes"){
						echo "<tr><td style='text-align:center;'> Distal Drift Rotation </tr>";
						foreach($patientmatch as $row2){
							if($row2['distal_rotation'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['distal_rotation'];
								echo "</tr>";
							}
						}
					}
					if($rct == "Yes"){
						echo "<tr><td style='text-align:center;'> Root Canal Treatment </tr>";
						foreach($patientmatch as $row2){
							if($row2['rootcanal_treatment'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['rootcanal_treatment'];
								echo "</tr>";
							}
						}
					}
					if($unerupted == "Yes"){
						echo "<tr><td style='text-align:center;'> Unerupted </tr>";
						foreach($patientmatch as $row2){
							if($row2['unerupted'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['unerupted'];
								echo "</tr>";
							}
						}
					}
					/*if($compdent == "Yes"){
						echo "<tr><td style='text-align:center;'> Complete Denture";
						foreach($patientmatch as $row2){
							if($row2['unerupted'] != "") {
								echo "<td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['unerupted'];
							}
						}
					}
					if($singdent == "Yes"){
						echo "<tr><td style='text-align:center;'> Single Denture";
						foreach($patientmatch as $row2){
							if($row2['unerupted'] != "") {
								echo "<td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['unerupted'];
							}
						}
					}*/
					if($rempardent == "Yes"){
						echo "<tr><td style='text-align:center;'> Removable Partial Denture </tr>";
						foreach($patientmatch as $row2){
							if($row2['removable_partial_denture'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['removable_partial_denture'];
								echo "</tr>";
							}
						}
					}
					if($pafs == "Yes"){
						echo "<tr><td style='text-align:center;'> Pit and Fissure Sealants </tr>";
						foreach($patientmatch as $row2){
							if($row2['pitfissure_sealants'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['pitfissure_sealants'];
								echo "</tr>";
							}
						}
					}
					if($pcc == "Yes"){
						echo "<tr><td style='text-align:center;'> Postcore Crown </tr>";
						foreach($patientmatch as $row2){
							if($row2['postcore_crown'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['postcore_crown'];
								echo "</tr>";
							}
						}
					}
					if($porcr == "Yes"){
						echo "<tr><td style='text-align:center;'> Porcelain Crown </tr>";
						foreach($patientmatch as $row2){
							if($row2['porcelain_crown'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['porcelain_crown'];
								echo "</tr>";
							}
						}
					}
					if($impacted == "Yes"){
						echo "<tr><td style='text-align:center;'> Impacted </tr>";
						foreach($patientmatch as $row2){
							if($row2['impacted'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['impacted'];
								echo "</tr>";
							}
						}
					}
					if($missing == "Yes"){
						echo "<tr><td style='text-align:center;'> Missing </tr>";
						foreach($patientmatch as $row2){
							if($row2['unerupted'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['unerupted'];
								echo "</tr>";
							}
						}
					}
					if($acrcr == "Yes"){
						echo "<tr><td style='text-align:center;'> Acrylic Crown </tr>";
						foreach($patientmatch as $row2){
							if($row2['acrylic_crown'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['acrylic_crown'];
								echo "</tr>";
							}
						}
					}
					if($metcr == "Yes"){
						echo "<tr><td style='text-align:center;'> Metal Crown </tr>";
						foreach($patientmatch as $row2){
							if($row2['metal_crown'] != "") {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['metal_crown'];
								echo "</tr>";
							}
						}
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
		<tr>
			<td>
			<td> <b>Id</b>
			<td> <b>Name</b>
			<td> <b>Tooth Number(s)</b>
		</tr>";
		
				//foreach($servicematch as $row){
					if($class1 == "Yes"){
						echo "<tr><td style='text-align:center;'> Class I</tr>";
						foreach($patientmatch as $row2){
							if($row2['class1']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class1'];
								echo "</tr>";
							}
						}
					}
					if($class2 == "Yes"){
						echo "<tr><td style='text-align:center;'> Class II </tr>";
						foreach($patientmatch as $row2){
							if($row2['class2']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class2'];
								echo "</tr>";
							}
						}
					}
					if($class3 == "Yes"){
						echo "<tr><td style='text-align:center;'> Class III</tr>";
						foreach($patientmatch as $row2){
							if($row2['class3']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class3'];
								echo "</tr>";
							}
						}
					}
					if($class4 == "Yes"){
						echo "<tr><td style='text-align:center;'> Class IV </tr>";
						foreach($patientmatch as $row2){
							if($row2['class4']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class4'];
								echo "</tr>";
							}
						}
					}
					if($class5 == "Yes"){
						echo "<tr><td style='text-align:center;'> Class V </tr>";
						foreach($patientmatch as $row2){
							if($row2['class5']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['class5'];
								echo "</tr>";
							}
						}
					}
					if($onlay == "Yes"){
						echo "<tr><td style='text-align:center;'> Onlay </tr>";
						foreach($patientmatch as $row2){
							if($row2['onlay']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['onlay'];
								echo "</tr>";
							}
						}
					}
					if($extraction == "Yes"){
						echo "<tr><td style='text-align:center;'> Extraction </tr>";
						foreach($patientmatch as $row2){
							if($row2['extraction']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['extraction'];
								echo "</tr>";
							}
						}
					}
					if($odon == "Yes"){
						echo "<tr><td style='text-align:center;'> Odontectomy </tr>";
						foreach($patientmatch as $row2){
							if($row2['odontectomy']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['odontectomy'];
								echo "</tr>";
							}
						}
					}
					if($specclass == "Yes"){
						echo "<tr><td style='text-align:center;'> Special Case </tr>";
						foreach($patientmatch as $row2){
							if($row2['special_case']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['special_case'];
								echo "</tr>";
							}
						}
					}
					if($pedodontics == "Yes"){
						echo "<tr><td style='text-align:center;'> Pedodontics </tr>";
						foreach($patientmatch as $row2){
							if($row2['pedodontics']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['pedodontics'];
								echo "</tr>";
							}
						}
					}
					if($orthodontics == "Yes"){
						echo "<tr><td style='text-align:center;'> Orthodontics </tr>";
						foreach($patientmatch as $row2){
							if($row2['orthodontics']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['orthodontics'];
								echo "</tr>";
							}
						}
					}
					if($pulpsed == "Yes"){
						echo "<tr><td style='text-align:center;'> Pulp Sedation </tr>";
						foreach($patientmatch as $row2){
							if($row2['pulp_sedation']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['pulp_sedation'];
								echo "</tr>";
							}
						}
					}
					if($roc == "Yes"){
						echo "<tr><td style='text-align:center;'> Recementation of Crown </tr>";
						foreach($patientmatch as $row2){
							if($row2['crown_recementation']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['crown_recementation'];
								echo "</tr>";
							}
						}
					}
					if($temfill == "Yes"){
						echo "<tr><td style='text-align:center;'> Temporary Fillings </tr>";
						foreach($patientmatch as $row2){
							if($row2['filling_service']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['filling_service'];
								echo "</tr>";
							}
						}
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
						echo "<tr><td style='text-align:center;'> Lamented </tr>";
						foreach($patientmatch as $row2){
							if($row2['lamented']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['lamented'];
								echo "</tr>";
							}
						}
					}
					if($singlecrown == "Yes"){
						echo "<tr><td style='text-align:center;'> Single Crown </tr>";
						foreach($patientmatch as $row2){
							if($row2['single_crown']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['single_crown'];
								echo "</tr>";
							}
						}
					}
					if($bridge == "Yes"){
						echo "<tr><td style='text-align:center;'> Bridge";
						foreach($servicematch as $row2){
							if($row2['bridge_service']) {
								echo "<td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['bridge_service'];
								echo "</tr>";
							}
						}
					}
					if($anterior == "Yes"){
						echo "<tr><td style='text-align:center;'> Anterior </tr>";
						foreach($patientmatch as $row2){
							if($row2['anterior']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['anterior'];
								echo "</tr>";
							}
						}
					}
					if($posterior == "Yes"){
						echo "<tr><td style='text-align:center;'> Posterior </tr>";
						foreach($patientmatch as $row2){
							if($row2['posterior']) {
								echo "<tr><td><td style='text-align:center;'><a href=".base_url()."index.php/loaddashboard/patientdb/".$row2['UPCD_ID'].">".$row2['UPCD_ID']."</a>"; 
								echo "<td style='text-align:center;'>".$row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
								echo "<td style='text-align:center;'>".$row2['posterior'];
								echo "</tr>";
							}
						}
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


