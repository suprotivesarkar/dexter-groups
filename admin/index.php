<?php 
require_once("config/config.php");
if(isset($_SESSION['islogin'])){header("Location:dashboard");}
if(isset($_POST['loginbtn'])){
$username     = htmlspecialchars(strip_tags(stripslashes(trim($_POST['username']))));
$password     = htmlspecialchars(strip_tags(stripslashes(trim($_POST['password']))));
$username_err=$password_err=$err=null;
if(empty($username)){
    $username_err = 'Please Enter Your Username.';
} 
if(empty(trim($password))){
    $password_err = 'Please enter your password.';
}
if(empty($username_err) && empty($password_err)){
  $stmt = $PDO->prepare("SELECT * FROM admin WHERE member_username=:username AND member_password=:pass");
  $stmt->execute(array(
    ':username'  => $username,
    ':pass'      => $password,
    )
  );
  $row = $stmt->fetch();
  if($row){
    $_SESSION['islogin'] ="Yes"; 
    $_SESSION['adminid'] = $row['member_id']; 
    $msg = '<div class="alert alert-success">Success</div>';
    header("Location:dashboard");
  }
  else {
    $msg='<div class="alert alert-danger" role="alert">Your Login Username or Password is invalid</div>';
  }
}
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Dexter Groups</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<style type="text/css">
.lodingimg{display:block;margin: 0 auto;display:none;}
</style>
</head>
<body>
<div class="wrapper">
<section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(assets/images/login-bg.jpg);">
<div class="container">
<div class="row justify-content-center no-gutters vertical-align">
<div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(assets/images/login-inner-bg.jpg);">
<div class="login-fancy">
<h2 class="text-white mb-20">Dexter Groups</h2>
<p class="mb-20 text-white"></p>
<ul class="list-unstyled pos-bot pb-30">
<li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a></li>
<li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-6 bg-white">
<div class="login-fancy pb-40 clearfix">
<h3 class="mb-30">Welcome</h3>
<form method="post" action="">
<div class="section-field mb-20">
<label class="mb-10" for="username">User name*</label>
<input id="username" class="web form-control" type="text" placeholder="User name" name="username" required="">
<span class="help-block error"><?php if(isset($username_err)) {echo $username_err;}?></span> 
</div>
<div class="section-field mb-20">
<label class="mb-10" for="Password">Password*</label>
<input id="password" class="Password form-control" type="password" placeholder="Password" name="password" required="">
<span class="help-block error"><?php if(isset($password_err)) {echo $password_err;}?></span> 
</div>
<div class="section-field">
<div class="remember-checkbox mb-30">
<input type="checkbox" class="form-control" name="two" id="two" />
<label for="two">Remember Me</label> <a href="javascript:void(0);" class="float-right">Forgot Password?</a>
</div>
</div>
<button type="submit" class="button btn-block mb-10" name="loginbtn"> <span>Log in</span></button>
<span class="help-block error"><?php if(isset($msg)) {echo $msg;}?></span> 
</form>
</div>
</div>
</div>
</div>
</section>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/notify.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
</body>
</html>