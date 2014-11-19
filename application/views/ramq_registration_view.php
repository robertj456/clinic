<div class="header"><h3 class="text-muted">Patient Registration & Triage Queuing</h3> <p class='pull-right' style='margin-right:10px;'>Signed in as <?php echo $this->session->userdata('logged_in')['USER_NAME']; ?></p>
<!-- end header -->				
</div>

<div class ="well">


<?php echo form_open('ramqregistration'); ?>
<div class='form' role='form'>
<?php echo validation_errors(); ?>				

	<div class='form-group'>
		<label for='inputRAMQ'>Please enter patient's RAMQ number</label>
		<input type='text' class='form-control' name='ramq' id='ramq' placeholder="Enter Patient's RAMQ Number">
	</div>

	<div class='form-group'>
		<button type='submit' class='btn' value='Submit'>Submit</button>
	</div>

<!-- end form-->
</div>

<!-- end well -->	
</div>
