		<div class="header"><h3 class="text-muted">Patient Registration & Triage Queuing</h3>
		<!-- end header -->
		</div>
		<?php echo form_open('patientregistration'); ?>
		<div class="form" role="form">
		<?php echo validation_errors(); ?>
		<?php echo form_error('get_patient'); ?>
			
		<div class="form-group">
			<label for="inputRAMQ">Please enter patient's RAMQ number</label>
			<input type="text" class="form-control" name="ramq" id="ramq" placeholder="Enter Patient's RAMQ Number" <?php echo isset($RAMQ_ID) ? "value=$RAMQ_ID" : "" ; ?>>
		</div>
			
			
		 <div class="form-group">
		 <button type="submit" class="btn" value="Submit">Submit</button>
		 </div>
		 </div
		 
		<?php if (isset($RAMQ_ID)) {
			
		echo form_open('test');
		echo '<div class="form" role="form">';
		echo validation_errors();

			
			// show other fields.
		
			echo "<form class='form-inline' role='form'>";
			echo "<div class='row'><label for='inputFirstName' class='col-sm-2 control-label'>First Name</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputFirstName' placeholder='First name'";
			echo isset($FIRST_NAME) ? "value=$FIRST_NAME>" : ">";
			echo '</div></div>';

			echo "<div class='row'><label for='inputLastName' class='col-sm-2 control-label'>Last Name</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputLastName' placeholder='Last name'";
			echo isset($FIRST_NAME) ? "value=$LAST_NAME>" : ">";
			echo '</div></div>';
			
			echo "<div class='row'><label for='inputHomePhone' class='col-sm-2 control-label'>Home Phone</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputHomePhone' placeholder='Home phone'";
			echo isset($HOME_PHONE) ? "value=$HOME_PHONE>" : ">";
			echo '</div></div>';
			
			echo "<div class='row'><label for='inputEmergency' class='col-sm-2 control-label'>Emergency Contact</label>";
			echo "<div class='col-sm-4'>";
			echo "<input type='text' class='form-control' id='inputEmergencyPhone' placeholder='Emergency Contact'";
			echo isset($EMERGENCY_PHONE) ? "value=$EMERGENCY_PHONE>" : ">";
			echo '</div></div>';

		
		
		
		
		
		}

		?>

			
			
			
	
			
 
		 
 
		
		

	
