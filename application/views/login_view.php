
		<div class="header"><h3 class="text-muted">Client Queuing System</h3>

		<!-- end header -->
		</div>
		<div class="jumbotron specialjum">
            <h1>Hello.</h1>
			<h2> <small class="text-muted">Please enter your credentials below</small></h2>
				   <?php echo validation_errors(); ?>
				   <?php echo form_open('login'); ?>

				<div class="form-horizontal" role="form">
					
					<div class="form-group">
						<label for="inputUser" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="username" placeholder="Enter username">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputPass" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
					</div>

					<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" id="connectButton" value="Submit"></input>
                        </div>
                    </div>

				<!-- end form -->
				</div>
		<!-- end jumbotron-->
		</div>
		
