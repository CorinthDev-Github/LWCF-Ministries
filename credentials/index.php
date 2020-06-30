	
	<?php include 'links/_css.php'; ?>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				<?php include 'logreg_function.php'; ?>
				<form class="login100-form validate-form" method="POST" action="index.php">
					<span class="login100-form-title">
						Enter Credentials
					</span>
					<?php if (isset($_SESSION['error'])) : ?>
	                  <div style="font-size: 14px;" class="alert alert-danger">
	                    <p>
	                        <center>	
	                          <?php 
	                            echo $_SESSION['error']; 
	                            unset($_SESSION['error']);
	                          ?>
	  						 <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	                         </center>
	                    </p>
	                  </div>
	                <?php endif ?>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="login" value="Sign In">
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Don't have an Account?
						</span>
						<a class="txt2" href="signup/">
							Create Account
						</a>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="../">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Back to Home
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include 'links/_js.php'; ?>
	