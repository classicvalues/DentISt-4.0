<?php 
	include('header.php'); 
	include('navigation.php');
	echo "<link rel=\"stylesheet\" type=\"text/css\" href='".base_url()."css/style.css'>";
	echo "<script type\"text/javascript\" src=\"".base_url()."js/dynamic.js\"></script>"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>

   <title>Add User - System Administrator</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/upcd-20140224-favicon.ico">
 </head>
<?php 
	$session_data = $this->session->userdata('logged_in');
     	$usernamelog = $session_data['username'];

?>
 <body>

<div class="maindiv">
 <h3 align="center">Add New User</h3>
<div class="validation" style="display:<?if(validation_errors() == true) echo 'block'; else echo 'none'?>">
   <?php if(form_error('firstname')) echo form_error('firstname');
		elseif(form_error('midname')) echo form_error('midname');
		elseif(form_error('lastname')) echo form_error('lastname');
		elseif(form_error('role')) echo form_error('role');
		elseif(form_error('section')) echo form_error('section');
		elseif(form_error('username')) echo form_error('username');
		elseif(form_error('password')) echo form_error('password');
		elseif(form_error('password2')) echo form_error('password2');
 ?>
</div>
<form id="ADDUSER" name="ADDUSER" action="verifyadduser" method="post">
	<table align="center">
	<tr>
		<td><label for="firstname">First Name:</label>  
		<td><input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>">
	</tr>
	<tr>
		<td><label for="midname">Middle Name:</label> 
		<td><input type="text" name="midname" value="<?php echo set_value('midname'); ?>">
	</tr>
	<tr>
		<td><label for="lastname">Last Name:</label> 
		<td><input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>">
	</tr>
	<tr>
		<td>Section: 
		<td><select name="section" id="section" onChange="restrict(this.selectedIndex)">
		<option value="Select one.." <?php if(set_value('section') == "Select one..") echo 'selected' ?>> Select one.. </option>		
		<option value="Oral Diagnosis" <?php if(set_value('section') == "Oral Diagnosis") echo 'selected' ?>> Oral Diagnosis </option>
		<option value="Oral Medicine" <?php if(set_value('section') == "Oral Medicine") echo 'selected' ?>> Oral Medicine </option>
		<option value="Prosthodontrics" <?php if(set_value('section') == "Prosthodontrics") echo 'selected' ?>> Prosthodontrics </option>
		<option value="Operative Dentistry" <?php if(set_value('section') == "Operative Dentistry") echo 'selected' ?>> Operative Dentistry </option>
		<option value="General Query" <?php if(set_value('section') == "General Query") echo 'selected' ?>> General Query </option>
		<option value="System Maintenance" <?php if(set_value('section') == "System Maintenance") echo 'selected' ?>> System Maintenance </option>
		</select></td>
	</tr>
	<tr>
		<td>Role:
		<td><select name="role" id="role">
		<option value = "Select one.." selected> Select a section first.. </option>
		<?php if(set_value('section') == "Oral Diagnosis"){
				echo "<option value = 'Faculty'";
				if(set_value('role') == "Faculty"){
					echo "selected";
				}
				echo "> Faculty </option>";  
				echo "<option value = 'Student'";
				if(set_value('role') == "Student"){
					echo "selected";
				}
				echo "> Student </option>"; 
			}
			elseif(set_value('section') == "Oral Medicine"){
				echo "<option value = 'Faculty'";
				if(set_value('role') == "Faculty"){
					echo "selected";
				}
				echo "> Faculty </option>";  
				echo "<option value = 'Student'";
				if(set_value('role') == "Student"){
					echo "selected";
				}
				echo "> Student </option>";  
			}
			elseif(set_value('section') == "Prosthodontrics"){
				echo "<option value = 'Faculty'";
				if(set_value('role') == "Faculty"){
					echo "selected";
				}
				echo "> Faculty </option>";  
				echo "<option value = 'Student'";
				if(set_value('role') == "Student"){
					echo "selected";
				}
				echo "> Student </option>";  
			}
			elseif(set_value('section') == "Operative Dentistry"){
				echo "<option value = 'Faculty'";
				if(set_value('role') == "Faculty"){
					echo "selected";
				}
				echo "> Faculty </option>";  
				echo "<option value = 'Student'";
				if(set_value('role') == "Student"){
					echo "selected";
				}
				echo "> Student </option>"; 
			}
			elseif(set_value('section') == "General Query"){
				echo "<option value = 'Faculty'";
				if(set_value('role') == "Faculty"){
					echo "selected";
				}
				echo "> Faculty </option>";  
				echo "<option value = 'Student'";
				if(set_value('role') == "Student"){
					echo "selected";
				}
				echo "> Student </option>"; 
			}
			elseif(set_value('section') == "System Maintenance"){
				echo "<option value = 'System Administrator'";
				if(set_value('role') == "System Administrator"){
					echo "selected";
				}
				echo "> System Administrator </option>";  
			}
		?>
		</select></td>
	</tr>
	<tr>
		<td><label for="username">Username:</label>
     		<td><input type="text" size="20" id="username" name="username" value="<?php echo set_value('username'); ?>">
     	</tr>
     	<tr>
		<td><label for="password">Password:</label>
     		<td><input type="password" size="20" id="password" name="password" value="<?php echo set_value('password'); ?>">
     	</tr>
	<tr>
		<td><label for="password2">Retype password:</label>
     		<td><input type="password" size="20" id="password2" name="password2" value="<?php echo set_value('password2'); ?>">
     	</tr>
	</table><br>
     <input type="submit" value="Add User"/> <input type="reset" value="Clear entries"/>
   </form>
</div>
 </body>
</html>


