<?php include '_css.php'; ?>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="" alt="logo">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <p>LWCF Ministry - Sign UP</p>
                    </div>
                </div>
                <?php include '../logreg_function.php'; ?>
                <div class="signup-form">
                    <form method="POST" action="index.php" class="register-form" id="register-form" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="hidden" name="group_id" value="1">
                                <div class="label-flex">
                                    <label for="meal_preference">Personal Information</label>
                                    <a href="#" class="form-link">Personal Details</a>
                                </div>
                                <div class="form-input">
                                    <label for="fullname" class="required">Fullname</label>
                                    <input type="text" name="fname" id="fullname" required/>
                                </div>
                                <div class="form-input">
                                    <label for="age" class="required">Age</label>
                                    <input type="number" name="age" id="age" required/>
                                </div>
                                <div class="form-input">
                                    <label for="birthday" class="required">Birthday</label>
                                    <input type="date" name="bday" id="birthday" required/>
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" required/>
                                </div>
                                <div class="form-input">
                                    <label for="tof" class="required">Testimony of Faith</label>
                                    <textarea style="height: 50px;" cols="50" name="tof" id="tof" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-flex">
                                    <label for="meal_preference">Credentials</label>
                                    <a href="#" class="form-link">User Details</a>
                                </div>
                                <div class="form-input">
                                    <label class="required">Username</label>
                                    <input type="text" name="uname" id="username" required/>
                                </div>
                                <div class="form-input">
                                    <label class="required">Password</label>
                                    <input type="password" name="pass" id="pass1" onkeyup="checkPass(); return false;" required/>
                                </div>
                                <div class="form-input">
                                    <label class="required">Confirm Password</label>
                                    <input type="password" name="cpass" id="pass2" onkeyup="checkPass(); return false;" required/>
                                </div>
                                <center><div id="error-nwl"></div></center>
                                <div class="form-select">
                                    <input type="submit" value="Submit" class="btn btn-primary" id="submit" name="signup" />
                                </div>
                                <div class="form-input">
                                    <span>
                                        Already have an account?
                                    </span>
                                    <a style = "text-decoration: none;" href="../">
                                        Sign in
                                    </a><br>
                                    <a style = "text-decoration: none;" href="../">
                                        Back to Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php include '_js.php'; ?>
<script type="text/javascript">
function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    
    if(pass1.value.length > 5)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Enter atleast 6 characters"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password match!"
    }
    else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Password doesn't match!"
    }
}  
</script>
