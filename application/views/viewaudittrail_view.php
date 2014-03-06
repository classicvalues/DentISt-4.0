<?php 
	include('header.php'); 
	echo "<link rel=\"stylesheet\" type=\"text/css\" href='".base_url()."css/style.css'>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Users - System Administrator </title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/upcd-20140224-favicon.ico">
	<script type="text/javascript">
		function confirmDelete(choice){
			var conf = confirm("Delete this user?");
			if(conf == true){
				var url = "http://localhost/DentISt/index.php/deleteuser/delete/" + choice;
				window.location = url;			
			}
		}

	</script>
 </head>
 <body>
<?php include('navigation.php'); ?>
<div class="maindiv">
<h3 align=center>Audit Trail </h3>

<form action="<?php echo base_url().'index.php/searchuser'?>" method=post>

<input type="text" name="searchuser" id="searchuser" class="search"> <input type="submit" value="Search" name="searchbtn"><br><br>

	<center>
		<table class="tab" border=1px color="violet" cellpadding=5px width="90%" align="center">
			<tr class="header">
				<td class="tab" align="center"> Name
				<td class="tab" align="center"> Action
				<td class="tab" align="center"> Form
				<td class="tab" align="center"> Action Performed To
				<td class="tab"align="center"> Action Date
			</tr>
			<?php if($audit){
				$count = sizeof($audit);
				$ctr = 1;
				$patientname = "";
				foreach($audit as $row){
					$user = $this->user->getUserInfo($row['committedBy']);
					foreach($user as $row2){
						$username = $row2['userFName']." ".substr($row2['userMName'], 0, 1).". ".$row2['userLName'];
						$uname = $row2 ['username'];
					}

					$patient = $this->patient->getPatient($row['committedTo']);
					foreach($patient as $row2){
						$patientname = $row2['patientFName']." ".substr($row2['patientMName'], 0, 1).". ".$row2['patientLName'];
					}					
					echo "<tr><td>".$ctr;
					echo "<td> $username <br> ($uname)";
					echo "<td> ".$row['action'];
					echo "<td> ".$row['form'];
					echo "<td> $patientname";
					echo "<td> ".$row['committedOn'];						
					echo "</tr>";
					$ctr++;
				}
			}
				
			?>
		</table>
		
	</center>	
</form>
</div>
 </body>
</html>


