		<div class="header"><h3 class="text-muted">Patient Registration & Triage Queuing</h3>
		<!-- end header -->
		</div>
		 
		<?php 
		
		if (isset($RAMQ_ID)) {
			
		echo form_open('registerpatient');
		echo '<div class="form" role="form">';
		echo validation_errors();

			// show other fields.

			echo "<div class='form-group'><div class='row'><label for='ramq' class='col-sm-2 control-label'>RAMQ</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='ramq' placeholder='Ramq' value=$RAMQ_ID>";
			echo '</div></div></div>';
			
			echo "<div class='form-group'><div class='row'><label for='inputFirstName' class='col-sm-2 control-label'>First Name</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='firstName' name='firstName' placeholder='First name'";
			echo isset($FIRST_NAME) ? "value=$FIRST_NAME>" : ">";
			echo '</div></div></div>';

			echo "<div class='form-group'><div class='row'><label for='inputLastName' class='col-sm-2 control-label'>Last Name</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputLastName' placeholder='Last name'";
			echo isset($LAST_NAME) ? "value=$LAST_NAME>" : ">";
			echo '</div></div></div>';
			
			echo "<div class='form-group'><div class='row'><label for='inputHomePhone' class='col-sm-2 control-label'>Home Phone</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputHomePhone' placeholder='Home phone'";
			echo isset($HOME_PHONE) ? "value=$HOME_PHONE>" : ">";
			echo '</div></div></div>';
			
			echo "<div class='form-group'><div class='row'><label for='inputEmergency' class='col-sm-2 control-label'>Emergency Contact</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputEmergencyPhone' placeholder='Emergency Contact'";
			echo isset($EMERGENCY_PHONE) ? "value=$EMERGENCY_PHONE>" : ">";
			echo '</div></div></div>';
			
			echo "<div class='form group'><div class='row'><label for='conditions' class='col-sm-2 control-label'>Existing Conditions</label>";
			echo "<div class='col-lg-8 col-md-4 col-sm-4'><textarea class='form-control' name='conditions' placeholder='Existing conditions'>";
			echo isset($EXISTING_CONDITIONS) ? "$EXISTING_CONDITIONS</textarea>" : "</textarea>";
			echo "</div></div></div>";

			
			echo "<div class='form-group'><div class='row'><div class='col-sm-2'>";
			echo "<button type='submit' class='btn' value='Submit'>Submit</button></div></div></div>";
			
			}

			else {
				echo form_open('patientregistration');
				echo "<div class='form' role='form'>";
				echo validation_errors();
				echo form_error('get_patient');
				echo "<div class='form-group'>";
				echo "<label for='inputRAMQ'>Please enter patient's RAMQ number</label>";
				echo "<input type='text' class='form-control' name='ramq' id='ramq' placeholder='Enter Patient's RAMQ Number'>";
				echo "</div><div class='form-group'>";
				echo "<button type='submit' class='btn' value='Submit'>Submit</button></div></div>";
			}
		
		
		
		


		?>

			
			
			
	
			
 
		 
 
		
		

	
