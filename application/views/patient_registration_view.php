		<div class="header"><h3 class="text-muted">Patient Registration & Triage Queuing</h3> <p class='pull-right' style='margin-right:10px;'>Signed in as <?php echo $this->session->userdata('logged_in')['USER_NAME']; ?></p>
		<!-- end header -->				
		</div>

		<div class ="well">
		
		 
		<?php 

		echo form_open('addtoqueue');
		echo '<div class="form" role="form">';
		echo validation_errors();

			// show other fields.

			echo "<div class='form-group'><div class='row'><label for='ramq' class='col-sm-2 control-label'>RAMQ</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' name='ramq' placeholder='Ramq' value=$patient[RAMQ_ID] >";
			echo '</div></div></div>';
			
			echo "<div class='form-group'><div class='row'><label for='inputFirstName' class='col-sm-2 control-label'>First Name</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' name='firstName' placeholder='First name'";
			echo isset($patient['FIRST_NAME']) ? "value=$patient[FIRST_NAME]>" : ">";
			echo '</div></div></div>';

			echo "<div class='form-group'><div class='row'><label for='inputLastName' class='col-sm-2 control-label'>Last Name</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' name='lastName' placeholder='Last name'";
			echo isset($patient['LAST_NAME']) ? "value=$patient[LAST_NAME]>" : ">";
			echo '</div></div></div>';
			
			echo "<div class='form-group'><div class='row'><label for='inputHomePhone' class='col-sm-2 control-label'>Home Phone</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' name='homePhone' placeholder='Home phone'";
			echo isset($patient['HOME_PHONE']) ? "value=$patient[HOME_PHONE]>" : ">";
			echo '</div></div></div>';
			
			echo "<div class='form-group'><div class='row'><label for='inputEmergency' class='col-sm-2 control-label'>Emergency Contact</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' name='emergencyPhone' placeholder='Emergency Contact'";
			echo isset($patient['EMERGENCY_PHONE']) ? "value=$patient[EMERGENCY_PHONE]>" : ">";
			echo '</div></div></div>';
			
			echo "<div class='form group'><div class='row'><label for='conditions' class='col-sm-2 control-label'>Existing Conditions</label>";
			echo "<div class='col-lg-8 col-md-4 col-sm-4'><textarea class='form-control' style='margin-bottom:20px;' name='conditions' placeholder='Existing conditions'>";
			echo isset($patient['EXISTING_CONDITIONS']) ? "$patient[EXISTING_CONDITIONS]</textarea>" : "</textarea>";
			echo "</div></div></div>";
			
			echo "<div class='form-group'><div class='row'><label for='medication1' class='col-sm-2 control-label'>Medication 1</label>";
			echo "<div class='col-sm-4'><select class='form-control' name='select1'>";
			
			foreach($medications as $item => $value) {
				if (isset($patient['MEDICATION_1'])) {
					if ($value == $patient['MEDICATION_1']) {
						echo "<option selected='selected'>$value</option>";
					} else {
						echo "<option>$value</option>";
						}
				}
				else {
					echo "<option>$value</option>";

				}
			}
			echo "</select></div></div></div>";
			
			echo "<div class='form-group'><div class='row'><label for='medication2' class='col-sm-2 control-label'>Medication 2</label>";
			echo "<div class='col-sm-4'><select class='form-control' name='select2'>";
			
			foreach($medications as $item => $value) {
				if (isset($patient['MEDICATION_2'])) {
					if ($value == $patient['MEDICATION_2'])
						echo "<option selected='selected'>$value</option>";
					else {
						echo "<option>$value</option>";
					}
				}
				else {
					echo "<option>$value</option>";
				}
			}
			echo "</select></div></div></div>";
			
			echo "<div class='form-group'><div class='row'><label for='medication3' class='col-sm-2 control-label'>Medication 3</label>";
			echo "<div class='col-sm-4'><select class='form-control' name='select3'>";
			
			foreach($medications as $item => $value) {
				if (isset($patient['MEDICATION_3'])) {
					if ($value == $patient['MEDICATION_3'])
						echo "<option selected='selected'>$value</option>";
					else {
						echo "<option>$value</option>";
					}
				}
				else {
					echo "<option>$value</option>";
				}
			}
			echo "</select></div></div></div>";
			
			
			echo "<div class='form-group'><div class='row'><div class='col-sm-2'>";
			echo "<button type='submit' class='btn' value='Submit'>Add to Queue</button></div>";
			echo "</div></div></div>";

		?>

			
			
	<!-- end well -->	
	</div>
			
 
		 
 
		
		

	
