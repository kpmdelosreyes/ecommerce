<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trendy | Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap-responsive.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui-1.7.3.custom.css" media="screen, projection, handheld" />

    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui-1.7.3.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/login.js"></script> 
</head>

<body> 
    <!--- Login ---->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">            
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?php echo substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>"> <h1>kpmdelosreyes.com </h1></a>
                <div class="nav-collapse">   
                    <form class="form-inline" id="loginForm" method="POST" action="<?php echo site_url(); ?>admin/login">
                        <div class="pull-right">
                            <input type="text" class="input-medium" id="login_email" name="login_email" value="" placeholder="Email">
                            <input type="password" class="input-medium" id="login_password" name="login_password" value=""  placeholder="Password">
                            <label class="checkbox">
                                <input type="checkbox"> <b style="color:#D4CFD1">Remember me</b>
                            </label>
                            <input type="button" class="btn-small btn-warning" id="login_submit" name="login_submit" value="Log In" >
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </div>
    <!--- registration ---->
    <div class="hero-unit">
        <div class="offset9 pull-right">
            <form class="form-horizontal" id="registrationForm" method="POST" action="<?php echo site_url(); ?>admin/registration">
                <fieldset>
                    <legend>Sign Up </legend>
                    <h4><p> It's free and anyone can join </p></h4>
                    <div class="control-group" id="fname">
                        <label class="control-label" for="input01">First Name:</label>
                        <div class="controls">
                            <input type="text" class="input-large" id="input01 reg_fname" name="reg_fname" value="" />
                            <span class="help-inline" id="fname_verify"></span>
                        </div>
                    </div>
                    <div class="control-group" id="lname">
                        <label class="control-label" for="input01">Last Name:</label>
                        <div class="controls">
                            <input type="text" class="input-large" id="input01 reg_lname" name="reg_lname" value="" />
                            <span class="help-inline" id="lname_verify"></span>
                        </div>
                    </div>
                    <div class="control-group" id="email">
                        <label class="control-label" for="input01">Your Email:</label>
                        <div class="controls">
                            <input type="text" class="input-large" id="input01 reg_email" name="reg_email" value="" />
                            <span class="help-inline" id="email_verify"></span>
                        </div>
                    </div>
                    <div class="control-group" id="email2">
                        <label class="control-label" for="input01">Re-enter Email:</label>
                        <div class="controls">
                            <input type="text" class="input-large" id="input01 reg_email2" name="reg_email2" value="" />
                            <span class="help-inline" id="email2_verify"></span>
                        </div>
                    </div>
                    <div class="control-group" id="password">
                        <label class="control-label" for="input01">New Password:</label>
                        <div class="controls">
                            <input type="password" class="input-large" id="input01 reg_password" name="reg_password" value="" />
                            <span class="help-inline" id="password_verify"></span>
                        </div>
                    </div>
                    <div class="control-group" id="gender">
                        <label class="control-label" for="input01">I am:</label>
                        <div class="controls">
                            <select class="span2" id="reg_gender" name="reg_gender" style="width:-2px">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="help-inline" id="gender_verify"></span>
                        </div> 
                    </div>
                    <div class="control-group" id="birthday">
                        <label class="control-label" for="input01">Birthday:</label>
                        <div class="controls">
                            <select class="span1" name="reg_dob_day" id="reg_dob_day">
                                
                                <?php 
                                    for($i=1; $i<=31; $i++)
                                    {
                                        echo "<option value=".$i.">".$i."</option>\n";
                                    }
                                ?>
                            </select>
                            <select class="input-medium" name="reg_dob_month" id="reg_dob_month">
                                
                                <option value="jan">January</option>
                                <option value="feb">February</option>
                                <option value="mar">March</option>
                                <option value="apr">April</option>
                                <option value="may">May</option>
                                <option value="jun">June</option>
                                <option value="july">July</option>
                                <option value="aug">August</option>
                                <option value="sept">September</option>
                                <option value="oct">October</option>
                                <option value="nov">November</option>
                                <option value="dec">December</option>
                            </select>
                            <select class="span1" style="width:-2px" name="reg_dob_year" id="reg_dob_year">
                                
                                <?php 
                                    for($i=2012; $i>=1900; $i--)
                                    {
                                        echo "<option value=".$i.">".$i."</option>";
                                    }
                                ?>
                            </select>
                            <span class="help-inline" id="birthday_verify"></span>
                        </div>  
                       </div> 
                        <br />
                       
                        <p><h5>By clicking Sign Up, you agree to our Terms and that you have <br />read and understand our Data Use Policy, including our Cookie Use. </h5></p>
                                               
                        <div class="form-actions">
                            <input type="button" class="btn btn-success" value="Sign Up" id="submit_reg" name="submit_reg" /> 
                        </div>
                    </div>
                </fieldset>
             </form>
        </div>
    </div>
</body>
</html>
 