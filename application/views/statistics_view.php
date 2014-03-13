<?php 
	include('header.php'); 
	//include('navigation.php');
	
	echo "<link rel=\"stylesheet\" type=\"text/css\" href='".base_url()."css/style.css'>";
	//echo "<script type=\"text/javascript\" src=\"".base_url()."js/dynamic.js\"></script>";
	echo "<script type=\"text/javascript\" src=\"".base_url()."js/patientdb.js\"></script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>

<meta charset="utf-8">
<link href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.custom.js"></script>

   <title>Statistics - Oral Diagnosis</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/upcd-20140224-favicon.ico">	

<script>
	/*$(function() {
		$('.datepicker').each(function(){
    			$(this).datepicker({
				dateFormat: 'yy-mm-dd',
				showAnim: 'slideDown',
				changeMonth: true,
				changeYear: true,
				yearRange: '1910:'+year,
			});
		});

	});*/
	
	$(function() {
		$("#datefrom").datepicker({
			dateFormat: 'yy-mm-dd',
			showAnim: 'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange: '1910:2014',
			onClose: function( selectedDate ) {
				$( "#dateto" ).datepicker( "option", "minDate", selectedDate );
	      		}
	    	});
	});
	
	$(function() {
		$("#dateto").datepicker({
			dateFormat: 'yy-mm-dd',
			showAnim: 'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange: '1910:2014',
			onClose: function( selectedDate ) {
				$( "#datefrom" ).datepicker( "option", "maxDate", selectedDate );
	      		}
	    	});
	});
	
</script>

<script type="text/javascript">
	
	function goBack(){
		 window.history.back()
	}

	function visible(element){
		if(element == "sasections"){
			if(document.getElementById(element).checked){
				document.getElementById('perio').checked = true;
				document.getElementById('ortho').checked = true;
				document.getElementById('pedo').checked = true;
				document.getElementById('cd').checked = true;
				document.getElementById('fpd').checked = true;
				document.getElementById('rpd').checked = true;
				document.getElementById('os').checked = true;
				document.getElementById('endo').checked = true;
				document.getElementById('resto').checked = true;
			} 
			else{
				document.getElementById('perio').checked = false;
				document.getElementById('ortho').checked = false;
				document.getElementById('pedo').checked = false;
				document.getElementById('cd').checked = false;
				document.getElementById('fpd').checked = false;
				document.getElementById('rpd').checked = false;
				document.getElementById('os').checked = false;
				document.getElementById('endo').checked = false;
				document.getElementById('resto').checked = false;
			}
		}
		else if(element == "sadentcond"){
			if(document.getElementById(element).checked){
				document.getElementById('caries').checked = true;
				document.getElementById('extrusion').checked = true;
				document.getElementById('compdent').checked = true;
				document.getElementById('impacted').checked = true;
				document.getElementById('recurrent').checked = true;
				document.getElementById('intrusion').checked = true;
				document.getElementById('singdent').checked = true;
				document.getElementById('missing').checked = true;
				document.getElementById('restoration').checked = true;
				document.getElementById('mdr').checked = true;
				document.getElementById('rempardent').checked = true;
				document.getElementById('acrcr').checked = true;
				document.getElementById('pftm').checked = true;
				document.getElementById('ddr').checked = true;
				document.getElementById('pafs').checked = true;
				document.getElementById('metcr').checked = true;
				document.getElementById('rot').checked = true;
				document.getElementById('rct').checked = true;
				document.getElementById('pcc').checked = true;
				document.getElementById('extracted').checked = true;
				document.getElementById('unerupted').checked = true;
				document.getElementById('porcr').checked = true;
			} 
			else{
				document.getElementById('caries').checked = false;
				document.getElementById('extrusion').checked = false;
				document.getElementById('compdent').checked = false;
				document.getElementById('impacted').checked = false;
				document.getElementById('recurrent').checked = false;
				document.getElementById('intrusion').checked = false;
				document.getElementById('singdent').checked = false;
				document.getElementById('missing').checked = false;
				document.getElementById('restoration').checked = false;
				document.getElementById('mdr').checked = false;
				document.getElementById('rempardent').checked = false;
				document.getElementById('acrcr').checked = false;
				document.getElementById('pftm').checked = false;
				document.getElementById('ddr').checked = false;
				document.getElementById('pafs').checked = false;
				document.getElementById('metcr').checked = false;
				document.getElementById('rot').checked = false;
				document.getElementById('rct').checked = false;
				document.getElementById('pcc').checked = false;
				document.getElementById('extracted').checked = false;
				document.getElementById('unerupted').checked = false;
				document.getElementById('porcr').checked = false;
			}
		}
		else if(element == "saservneed"){
			if(document.getElementById(element).checked){
				document.getElementById('mopd').checked = true;
				document.getElementById('class1').checked = true;
				document.getElementById('extraction').checked = true;
				document.getElementById('pulpsed').checked = true;
				document.getElementById('class2').checked = true;
				document.getElementById('odon').checked = true;
				document.getElementById('roc').checked = true;
				document.getElementById('class3').checked = true;
				document.getElementById('specclass').checked = true;
				document.getElementById('temfill').checked = true;
				document.getElementById('class4').checked = true;
				document.getElementById('pedodontics').checked = true;
				document.getElementById('moai').checked = true;
				document.getElementById('class5').checked = true;
				document.getElementById('orthodontics').checked = true;
				document.getElementById('moti').checked = true;
				document.getElementById('onlay').checked = true;
				document.getElementById('lamented').checked = true;
				document.getElementById('completedenture').checked = true;
				document.getElementById('anterior').checked = true;
				document.getElementById('singlecrown').checked = true;
				document.getElementById('singledenture').checked = true;
				document.getElementById('posterior').checked = true;
				document.getElementById('bridge').checked = true;
				document.getElementById('removablepartialdenture').checked = true;
			} 
			else{
				document.getElementById('mopd').checked = false;
				document.getElementById('class1').checked = false;
				document.getElementById('extraction').checked = false;
				document.getElementById('pulpsed').checked = false;
				document.getElementById('class2').checked = false;
				document.getElementById('odon').checked = false;
				document.getElementById('roc').checked = false;
				document.getElementById('class3').checked = false;
				document.getElementById('specclass').checked = false;
				document.getElementById('temfill').checked = false;
				document.getElementById('class4').checked = false;
				document.getElementById('pedodontics').checked = false;
				document.getElementById('moai').checked = false;
				document.getElementById('class5').checked = false;
				document.getElementById('orthodontics').checked = false;
				document.getElementById('moti').checked = false;
				document.getElementById('onlay').checked = false;
				document.getElementById('lamented').checked = false;
				document.getElementById('completedenture').checked = false;
				document.getElementById('anterior').checked = false;
				document.getElementById('singlecrown').checked = false;
				document.getElementById('singledenture').checked = false;
				document.getElementById('posterior').checked = false;
				document.getElementById('bridge').checked = false;
				document.getElementById('removablepartialdenture').checked = false;
			}
		}
		/**/
	}

	function makeRadio(element){
		if(element == "demo1Or") document.getElementById('demo1And').checked = false;
		if(element == "demo1And") document.getElementById('demo1Or').checked = false;
		if(element == "demo2Or") document.getElementById('demo2And').checked = false;
		if(element == "demo2And") document.getElementById('demo2Or').checked = false;
		if(element == "demo3Or") document.getElementById('demo3And').checked = false;
		if(element == "demo3And") document.getElementById('demo3Or').checked = false;
	}

</script>
 </head>
<?php 
	$session_data = $this->session->userdata('logged_in');
     	$usernamelog = $session_data['username'];

?>
 <body>
  
<br><br>
<div style="border: 2px #7F00FF solid; text-align: center; -moz-border-radius: 12px; border-radius: 12px;">
<h3 align="left" style="left: 1%;position: relative;">Statistics</h3>

  	<form id="SEARCHPATIENT" name="SEARCHPATIENT" action="<?php echo base_url();?>index.php/statisticsreport" method="post">
	
	<div class="validation" style="display:<?if(validation_errors() == true) echo 'block'; else echo 'none'?>">
   <?php if(form_error('datefrom')) echo form_error('datefrom');
	elseif(form_error('dateto')) echo form_error('dateto'); ?>
</div>

<div style="position: relative; text-align:right; color: red; right: 1%;"><i>* means required</i></div>

	<table frame="box" class="frame" style="width:98%; left:1%;">
		<tr class="header">
			<td colspan=4> Demographics
		</tr>
		<tr>
			<td colspan=4>&nbsp;
		</tr>
		<tr>
			<td>Specify range of date <font color='red'>*</font>
			<td colspan=2>
				<input type="text" class="datepicker" name="datefrom" id="datefrom" placeholder="From" value="<?php echo set_value('datefrom'); ?>"> - 
				<input type="text" name="dateto" id="dateto" class="datepicker" placeholder="To" value="<?php echo set_value('dateto'); ?>">
			<td>
		</tr>
		<tr>
			<td>Age
			<td colspan=2><input type="text" name="agefrom" placeholder="From" value="<?php echo set_value('agefrom'); ?>"> - 
			<input type="text" name="ageto" placeholder="To" value="<?php echo set_value('ageto'); ?>">
			<td>
		</tr>
		<!--<tr>
			<td>Gender
			<td><input type="radio" name="gendersearch" value="Male">M &nbsp; <input type="radio" name="gendersearch" value="Female">F &nbsp; <input type="radio" name="gendersearch" value="">Both &nbsp; 
			<td>
			<td>
		</tr>-->
		<tr>
			<td>City
			<td><input type="text" name="citysearch" value="<?php echo set_value('citysearch'); ?>"> 
			<td>
			<td>
		<!--</tr>
		<tr>
			<td>Occupation
			<td><input type="text" name="occsearch">
			<td>
			<td> 
		</tr>-->
		
</table><br>
<table frame="box" class="frame" style="width:98%; left:1%;">	
		<tr class="header">
			<td>Other Conditions (Using Demographics)</td>
			<td class="noborder" style='text-align:right;'><input type="checkbox" name="demo[]" id="demo1Or" value="or" onClick="makeRadio(this.id)"> Or | <input type="checkbox" name="demo[]" id="demo1And" value="and" onClick="makeRadio(this.id)"> And
		</tr>
		
		</table><br>
<table frame="box" class="frame" style="width:98%; left:1%;">


<?php 
	$session_data = $this->session->userdata('logged_in');
	$section = $session_data['section'];

	//print_r($section);

	$OM = false;
	$PD = false;
	$OD = false;
	$SM = false;

	if(in_array("Oral Medicine", $section)) $OM = true;
	if(in_array("Operative Dentistry", $section)) $OD = true;
	if(in_array("Prosthodontics", $section)) $PD = true;
	if(in_array("System Maintenance", $section)) $SM = true;


	if(!in_array("Oral Diagnosis", $section)){
		echo "<tr class=header>
			<td colspan=3>Sections
			<td>
			<td style='text-align:right;'><input type='checkbox' id='sasections' onClick='visible(this.id)'> Select All
		</tr>
		<tr>";
			if($OD || $SM) echo "<td><b>Operative Dentistry</b>";
			if($OM || $SM) echo "<td><b>Oral Medicine</b>";
			if($PD || $SM) echo "<td><b>Prosthodontics</b>";
			echo "<td>
		</tr>
		<tr>";
			if($OD || $SM) echo "<td><input type='checkbox' name='perio' id='perio' value='Yes'>Periodontics";
			if($OM || $SM) echo "<td><input type='checkbox' name='rpd' id='rpd' value='Yes'>Removable Prosthodontics"; 
			if($PD || $SM) echo "<td><input type='checkbox' name='ortho' id='ortho' value='Yes'>Orthodontics"; 
			echo "<td>
		</tr>
		<tr>";
			if($OD || $SM) echo "<td><input type='checkbox' name='os' id='os' value='Yes'>Oral Surgery";
			if($OM || $SM) echo "<td><input type='checkbox' name='fpd' id='fpd' value='Yes'>Fixed Partial Prosthodontics";
			if($PD || $SM) echo "<td><input type='checkbox' name='pedo' id='pedo' value='Yes'>Pedodontics";
			echo "<td>
		</tr>
		<tr>";
			if($OD || $SM) echo "<td><input type='checkbox' name='endo' id='endo' value='Yes'>Endodontics";
			if($OM || $SM) echo "<td><input type='checkbox' name='cd' id='cd' value='Yes'>Complete Denture"; 
			if($PD || $SM) echo "<td><input type='checkbox' name='resto' id='resto' value='Yes'>Restorative Dentistry"; 
			echo "<td>
		</tr>

		<tr>
			<td colspan=4>&nbsp;
		</tr>
</table>";

}

?>
<br>
<table frame="box" class="frame" style="width:98%; left:1%;">	
		<tr class="header">
			<td colspan=4>Dental Condition
			<td style='text-align:right;'><input type="checkbox" name="dentdemo[]" id="demo2Or" value="or" onClick="makeRadio(this.id)"> Or | <input type="checkbox" name="dentdemo[]" value="and"  id="demo2And" onClick="makeRadio(this.id)"> And | <input type="checkbox" name="sadentcond" id="sadentcond" onClick="visible(this.name)"> Select All
		</tr>
		<tr>
			<td><input type="checkbox" name="caries" id="caries" value="Yes">Caries
			<td><input type="checkbox" name="extrusion" id="extrusion" value="Yes">Extrusion
			<td><input type="checkbox" name="compdent" id="compdent" value="Yes">Complete Denture
			<td><input type="checkbox" name="impacted" id="impacted" value="Yes">Impacted
		</tr>
		<tr>
			<td><input type="checkbox" name="recurrent" id="recurrent" value="Yes">Recurrent Caries
			<td><input type="checkbox" name="intrusion" id="intrusion" value="Yes">Intrusion
			<td><input type="checkbox" name="singdent" id="singdent" value="Yes">Single Denture
			<td><input type="checkbox" name="missing" id="missing" value="Yes">Missing
		</tr>
		<tr>
			<td><input type="checkbox" name="restoration" id="restoration" value="Yes">Restoration
			<td><input type="checkbox" name="mdr" id="mdr" value="Yes">Mesial Drifting Rotation
			<td><input type="checkbox" name="rempardent" id="rempardent" value="Yes">Removable Partial Denture
			<td><input type="checkbox" name="acrcr" id="acrcr" value="Yes">Acrylic Crown
		</tr>
		<tr>
			<td><input type="checkbox" name="pftm" id="pftm" value="Yes">Porcelain Fused To Metal
			<td><input type="checkbox" name="ddr" id="ddr" value="Yes">Distal Drifting Rotation
			<td><input type="checkbox" name="pafs" id="pafs" value="Yes">Pit and Fissure Sealants
			<td><input type="checkbox" name="metcr" id="metcr" value="Yes">Metal Crown
		</tr>
		<tr>
			<td><input type="checkbox" name="rot" id="rot" value="Yes">Rotation
			<td><input type="checkbox" name="rct" id="rct" value="Yes">Root Canal Treatment
			<td><input type="checkbox" name="pcc" id="pcc" value="Yes">Post Core Crown
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="extracted" id="extracted" value="Yes">Extracted
			<td><input type="checkbox" name="unerupted" id="unerupted" value="Yes">Unerupted
			<td><input type="checkbox" name="porcr" id="porcr" value="Yes">Porcelain Crown
			<td>
		</tr>
		<tr>
			<td colspan=4>&nbsp;
		</tr>
</table><br>
<table frame="box" class="frame" style="width:98%; left:1%;">	
		<tr class="header">
			<td colspan=3>Services Needed
			<td>
			<td style='text-align:right;'><input type="checkbox" name="servdemo[]" id="demo3Or" value="or" onClick="makeRadio(this.id)"> Or | <input type="checkbox" name="servdemo[]" value="and"  id="demo3And" onClick="makeRadio(this.id)"> And | <input type="checkbox" name="saservneed" id="saservneed" onClick="visible(this.name)"> Select All
		</tr>
		<tr>
			<td colspan=4><u>Periodontics</u>
		<tr>
		<tr>
			<td colspan=4><input type="checkbox" name="mopd" id="mopd" value="Yes">Management of Periodontal Disease
		</tr>
		<tr>
			<td><br><u>Operative Dentistry</u>
			<td><br><u>Surgery</u>
			<td><br><u>Emergency Treatment</u>
		</tr>
		<tr>
			<td><input type="checkbox" name="class1" id="class1" value="Yes">Class I
			<td><input type="checkbox" name="extraction" id="extraction" value="Yes">Extraction
			<td><input type="checkbox" name="pulpsed" id="pulpsed" value="Yes">Pulp Sedation
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="class2" id="class2" value="Yes">Class II
			<td><input type="checkbox" name="odon" id="odon" value="Yes">Odontectomy
			<td><input type="checkbox" name="roc" id="roc" value="Yes">Recementation of Crowns
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="class3" id="class3" value="Yes">Class III
			<td><input type="checkbox" name="specclass" id="specclass" value="Yes">Special Class
			<td><input type="checkbox" name="temfill" id="temfill" value="Yes">Temporary Fillings
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="class4" id="class4" value="Yes">Class IV
			<td><input type="checkbox" name="pedodontics" id="pedodontics" value="Yes">Pedodontics
			<td><input type="checkbox" name="moai" id="moai" value="Yes">Management of Acute Infections
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="class5" id="class5" value="Yes">Class V
			<td><input type="checkbox" name="orthodontics" id="orthodontics" value="Yes">Orthodontics
			<td><input type="checkbox" name="moti" id="moti" value="Yes">Management of Temporary Injuries
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="onlay" id="onlay" value="Yes">Onlay
			<td>
			<td>
			<td>
		</tr>
		<tr>
			<td colspan=4>&nbsp;
		</tr>
		<tr>
			<td><u>Fixed Partial Denture</u>
			<td><u>Prosthodontics</u>
			<td><u>Endodontics</u>
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="lamented" id="lamented" value="Yes">Laminated
			<td><input type="checkbox" name="completedenture" id="completedenture" value="Yes">Complete Denture
			<td><input type="checkbox" name="anterior" id="anterior" value="Yes">Anterior
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="singlecrown" id="singlecrown" value="Yes">Single Crown
			<td><input type="checkbox" name="singledenture" id="singledenture" value="Yes">Single Denture
			<td><input type="checkbox" name="posterior" id="posterior" value="Yes">Posterior
			<td>
		</tr>
		<tr>
			<td><input type="checkbox" name="bridge" id="bridge" value="Yes">Bridge
			<td><input type="checkbox" name="removablepartialdenture" id="removablepartialdenture" value="Yes">Removable Partial Denture
			<td>
			<td>
		</tr>
	</table>

	<br><input type="submit" value="Generate Report"/> <input type="reset" value="Clear entries"/> <input type="button" value="Go Back" onClick="goBack()"><br>
	</form>	
</div><br><br>

 </body>
</html>


