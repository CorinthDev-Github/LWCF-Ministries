	<?php include 'links/_css.php'; ?>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="signup.php" style="margin-top: -50px;">
					<span class="login100-form-title">
						Information
					</span>

					<?php include 'logreg_function.php'; ?>
                      <!-- notification message -->
                        <?php if (isset($_SESSION['success'])) : ?>
                          <div class="error success" >
                            <h5>
	                            <center>	
	                              <?php 
	                                echo $_SESSION['success']; 
	                                unset($_SESSION['success']);
	                              ?>
	                             </center>
                            </h5>
                          </div>
                        <?php endif ?>
                        <!-- logged in user information -->
                        <?php  if (isset($_SESSION['fname'])) : ?>
                          <h6 class="alert alert-info text-center">Name:&nbsp <?php echo $_SESSION['fname']; ?></h6>
                        <?php endif ?>

					<div class="text-center p-t-12">
						<a class="txt2" href="logout.php">
							Sign in
						</a><br>
					</div>
				</form>
				<div class="login100-pic js-tilt" data-tilt style="margin-top: -100px;">
					<img src="images/img-01.png" alt="IMG">
				</div>
			</div>
		</div>
	</div>
	<?php include 'links/_js.php'; ?>