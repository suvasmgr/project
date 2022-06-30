<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
     <form action="signup-check.php" method="post" onsubmit="return submitUserForm();">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="email" 
                      name="email" 
                      placeholder="email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="email" 
                      name="email" 
                      placeholder="Enter your email"><br>
          <?php }?>

     	<label>Password</label>
     	<input type="password"
                 id="pws"
                 name="password" 
                 placeholder="Password"><br>
          <div id="message">
               <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirm your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br>

         <!-- captcha -->
         <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Lfw0rAgAAAAAJn-epfQXyy2mn5cxDXN-SThRP8A" data-callback="verifyCaptcha"></div>
                        <div id="g-recaptcha-error"></div>
                    </div>
           <!-- captcha end -->
     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
          
          <!-- captcha script  -->
          <script src="captcha.js"></script>
    <!-- Google Captcha Script end -->
       <script src="passwordChecker.js"></script>

     </form>
     
</body>
</html>