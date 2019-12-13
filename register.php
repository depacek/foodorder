<?php
require_once "admin/object.php";
    if(isset($_POST['btnlogin'])){
    $err=[];
        if(isset($_POST['name'])&&!empty($_POST['name'])&&trim($_POST['name'])!=''){
            $user->set('name',$_POST['name']);
        }else{
            $err['name']="Enter name";
        }
        if(isset($_POST['username'])&&!empty($_POST['username'])&&trim($_POST['username'])!=''){
            $user->set('username',$_POST['username']);
        }else{
            $err['username']="Enter username";
        }
        if(isset($_POST['address'])&&!empty($_POST['address'])&&trim($_POST['address'])!=''){
            $user->set('address',$_POST['address']);
        }else{
            $err['address']="Enter address";
        }
         if(isset($_POST['password'])&&!empty($_POST['password'])&&trim($_POST['password'])!=''){
             $user->set('password',md5($_POST['password']));
        }else{
            $err['password']="Enter your password";
        }
        print_r($err);
        if (count($err)==0) {
            $res = $user->create();
        }
        if(isset($res) && $res>0){
        	header('location:index.php?msg=5');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Food order</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Register Here !
				</span>
				<?php if(isset($res)){?>
	                 <div class="alert alert-danger"> <?php echo $res; ?></div>
	            <?php   } ?>
	            
				<form role="form" action="" method="post" id="register_form" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" id="name" name="name" placeholder="Name" required="">
						<span class="focus-input100" ></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" id="uname" name="username" placeholder="User name" required="">
						<span class="focus-input100" ></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter address">
						<input class="input100" type="text" id="address" name="address" placeholder="Address" required="">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required="">
						<span class="focus-input100" ></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<input type='submit' class="login100-form-btn" id='submit' value='Register' name="btnlogin" />
						
					</div>

				</form>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>