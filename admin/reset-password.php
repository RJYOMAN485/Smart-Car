<?php 
session_start();
include('db.php');
include('msgbox.php');
if(!isset($_SESSION['email']))
{
		header('location:forgotpassword.php');
}
if(isset($_POST['recover-submit'])) {
	$pwd=$_POST['pwd'];
	$pwd2=$_POST['pwd2'];
	$newmail=$_SESSION['email'];
	if($pwd==$pwd2) {
			$sql=mysqli_query($connection,"UPDATE tbladmin SET password='$pwd' WHERE email='$newmail'");
			if(!$sql) {
					echo "Error in ".mysqli_error($connection);
			}
			$_SESSION['success']="Success! Login to continue";
			header( "refresh:3;url=admin_login.php" );
			
	}
	else {
		$_SESSION['error']="Both Password should match";
		header('location:reset-password.php');
		
		//header( "refresh:5;url=admin_login.php" );
		
	}
}
if(isset($_POST['cancel']))
  {
	  header('location:admin_login.php');
  }

?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
 
 
  <div class="sufee-login d-flex align-content-center flex-wrap">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Reset Password</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="pwd" name="pwd" placeholder=" New Password" class="form-control"  type="password">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="pwd2" name="pwd2" placeholder="Confirm Password" class="form-control"  type="password">
                        </div>
                      </div>
					  
		
					  
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Confirm" type="submit">
                      </div>
                      
					  <div class="form-group">
                        <input name="cancel" class="btn-default" value="Cancel" type="submit">
                      </div>
					  
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>