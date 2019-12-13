<?php
require_once "admin/object.php";
    if(isset($_POST['btnlogin'])){
    $err=[];
    if(isset($_POST['username'])&&!empty($_POST['username'])&&trim($_POST['username'])!=''){
        $user->set('username',$_POST['username']);
    }else{
        $err['username']="Enter username";
    }
     if(isset($_POST['password'])&&!empty($_POST['password'])&&trim($_POST['password'])!=''){
         $user->set('password',$_POST['password']);
    }else{
        $err['password']="Enter your password";
    }
    print_r($err);
    if (count($err)==0) {
        $login_err = $user->login();
    }
}

?>

<!DOCTYPE html>
<html>
<head>	<title> hw</title>
	<link rel="stylesheet" type="text/css" href="assets/css/form2.css">
	<link rel="stylesheet" type="text/css" href="assets/css/form.css">
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="main-form">
	<br>

<h1>First Log In Here For Our Service</h1>

<caption><h1>Login Form</h1></caption>
			<?php if(isset($login_err)){?>
                 <div class="alert alert-danger"> <?php echo $login_err; ?></div>
            <?php   } ?>
            <?php if(isset($_GET['msg']) && $_GET['msg']==1){?>
                <div class="alert alert-danger"> Login to Access Dashboard</div>
            <?php   } ?>
            <form role="form" action="" method="post" id="login_form">
				<label for='uname'>User Name :</label>
				<input type='text' id='uname' name='username' placeholder='Enter your user name' />
				<br>
				<label for='password'>Password :</label>
				<input type='password' id='password' name='password' placeholder='Enter your password' />
			<br>
			<input type='submit' id='submit' value='save' name="btnlogin" />
        </form>

</div>


</body>
</html>
