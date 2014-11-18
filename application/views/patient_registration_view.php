		<div class="header"><h3 class="text-muted">Patient Registration & Triage Queuing</h3>
		<!-- end header -->
		</div>
		<?php echo form_open('patientregistration'); ?>
		<div class="form" role="form">
				<?php echo validation_errors(); ?>
		<?php echo form_error('get_patient'); ?>
			<div class="form-group">
				<label for="inputRAMQ">Please enter patient's RAMQ number</label>
				<input type="text" class="form-control" name="ramq" id="ramq" placeholder="Enter Patient's RAMQ Number">
				
			</div>

			<!--
			<div class="form-group">
				<label for="selectMedication">Medication 1</label>
						<select class="form-control" id="select1">
							<option>Medication 1</option>
							<option>Medication 2</option>
							<option>Medication 3</option>
							<option>Medication 4</option>
							<option>Medication 5</option>
						</select>
			</div>
			
			<div class="form-group">
				<label for="selectMedication">Medication 2</label>
						<select class="form-control" id="select2">
							<option>Medication 1</option>
							<option>Medication 2</option>
							<option>Medication 3</option>
							<option>Medication 4</option>
							<option>Medication 5</option>
						</select>
			</div>
			
			<div class="form-group">
				<label for="selectMedication">Medication 3</label>
						<select class="form-control" id="select3">
							<option>Medication 1</option>
							<option>Medication 2</option>
							<option>Medication 3</option>
							<option>Medication 4</option>
							<option>Medication 5</option>
						</select>
			</div>
			
			<div class="form group">
				<label for="inputConditions">Existing Conditions</label>
						<textarea class="form-control" id="conditions" placeholder="Existing conditions"></textarea>
			</div>
		-->
			  <div class="form-group">
					<button type="submit" class="btn" value="Submit">Submit</button>
				</div>

		
		
						If not in DB, show registration form / else display info and can edit.

	
