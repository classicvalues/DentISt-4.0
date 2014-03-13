<?php 
	include('header.php'); 
	include('navigation.php');
	
	echo "<link rel=\"stylesheet\" type=\"text/css\" href='".base_url()."css/style.css'>";
	echo "<script type\"text/javascript\" src=\"".base_url()."js/dynamic.js\"></script>";
	echo "<script type\"text/javascript\" src=\"".base_url()."js/patientdb.js\"></script>"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.custom.js"></script>

   <title>Services Rendered - Oral Diagnosis</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/upcd-20140224-favicon.ico">	
<script type="text/javascript">

var fieldNum3;
var k=0;
var year = new Date().getFullYear();

	$(function() {	
		$('#servicedate_0').datepicker({
			dateFormat: 'yy-mm-dd',
			showAnim: 'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange: '1910:' + year
	    	});
	});

function addService(tableID){
	fieldNum3= k+1;
			
	var table = document.getElementById(tableID);
	var numRows = table.rows.length;
	var row = table.insertRow(numRows);
	row.align = "center";

	var cellA = row.insertCell(0);
	cellA.innerHTML ="<input type='checkbox' name='"+fieldNum3+"' id='ck"+fieldNum3+"'>";
	var cellB = row.insertCell(1);
	cellB.innerHTML ="<input type='text' name='servicedate[]' class='datepicker' id='servicedate_" + fieldNum3 +"'>";
	var cellC = row.insertCell(2);
	cellC.innerHTML ="<textarea name='rendered[]' id='rendered_" + fieldNum3 +"' cols=50></textarea>";
	var cellD = row.insertCell(3);
	cellD.innerHTML ="<input type='text' name='fees[]' id='fees_" + fieldNum3 +"'>";
	

	k++;

	var str = '#servicedate_'+fieldNum3;
	$(str).datepicker({
		dateFormat: 'yy-mm-dd',
		showAnim: 'slideDown',
		changeMonth: true,
		changeYear: true,
		yearRange: '1910:' + year
    	});
}

function deleteService(tableID){
	
	var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 2) {
                        	alert("Cannot delete all the rows.");
                        	break;
                    	}
                    	table.deleteRow(i);
                    	rowCount--;
                    	i--;
                }
	}
}

	
	
</script>
 </head>
<?php 
	$session_data = $this->session->userdata('logged_in');
     	$usernamelog = $session_data['username'];

	$session_data2 = $this->session->userdata('has_error');
	$invalid_input = $session_data2['invalid_input'];

	if($invalid_input){
		$servicedate2[] = $session_data2['servicedate'];
		$rendered2[] = $session_data2['rendered'];
		$fees2[] = $session_data2['fees'];

		
	}

	if($recordexist){
		foreach($info as $row){
			$servicedatetxt = $row['date'];
			$renderedtxt = $row['services'];
			$feestxt = $row['fees'];
		}

		$servicedate = explode("|", $servicedatetxt);
		$rendered = explode("|", $renderedtxt);
		$fees = explode("|", $feestxt);

		
	}
?>
 <body>
  
<div class="maindiv">
	<?php include('patient_header.php'); ?>

<div id="Content_Area">

	<form id="ADDCONSULTATIONFINDINGS" name="ADDCONSULTATIONFINDINGS" action="<?php echo base_url();?>index.php/verifyaddservicerendered" method="post">

<br><a href="<?php echo base_url();?>index.php/loaddashboard/patientdb/<?php echo $id; ?>"> Dashboard </a> &nbsp; <a href="<?php echo base_url();?>index.php/viewconsultationversions"> View Versions </a><br><br>

<div class="validationexc" style="display: <?php if($this->session->userdata('has_error')) echo 'block'; else 'none' ?>;">
   		<?php $session_data = $this->session->userdata('has_error');
     		echo $session_data['error'];
	?>
</div>
<div style="position: relative; text-align:right; color: red; right: 5%;"><i>* means required</i></div>
		<table id="service" frame="box" class="frame">
		<tr class=header>
			<td colspan=4>Services Rendered
		</tr>
		<tr>
			<td>
			<td>Date
			<td>Services Rendered
			<td>Fees
		</tr>
		<?php
		if($invalid_input){
			$size = sizeof($servicedate2[0]);
			for($i=0; $i<$size; $i++){
				echo "<tr>
					<td><input type='checkbox' name='$i' id='ck$i' checked>
					<td><input type='text' name='servicedate[]' class='datepicker' id='servicedate_$i' value='".$servicedate2[0][$i]."'>
					<td><textarea name='rendered[]' id='rendered_$i' cols=50>".$rendered2[0][$i]."</textarea>
					<td><input type='text' name='fees[]' id='fees_$i' value='".$fees2[0][$i]."'>
				</tr>";
			}
		}
		elseif($recordexist){
			$size = sizeof($servicedate);
			for($i=0; $i<$size; $i++){
				echo "<tr>
					<td><input type='checkbox' name='$i' id='ck$i' checked>
					<td><input type='text' name='servicedate[]' class='datepicker' id='servicedate_$i' value='".$servicedate[$i]."'>
					<td><textarea name='rendered[]' id='rendered_$i' cols=50>".$rendered[$i]."</textarea>
					<td><input type='text' name='fees[]' id='fees_$i' value='".$fees[$i]."'>
				</tr>";
			}
		}
		else{
			echo "<tr>
				<td><input type='checkbox' name='0' id='ck0'>
				<td><input type='text' name='servicedate[]' class='datepicker' id='servicedate_0'>
				<td><textarea name='rendered[]' id='rendered_0' cols=50></textarea>
				<td><input type='text' name='fees[]' id='fees_0'>
			</tr>";
		}
		?>
		</table><br><br>
		<input type="button" onClick="addService('service')" value="Add Row">
		<input type="button" onClick="deleteService('service')" value="Delete Row/s"><br><br>
		<input type="submit" value="Save"/> <input type="reset" value="Clear entries"/>
</form>

</div>

 </body>
</html>


