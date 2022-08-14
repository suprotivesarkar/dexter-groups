<?php 
require_once("config/config.php");
require_once("config/function.php");
if(empty($_SESSION['islogin'])){header("Location:index");}
$memdet=MemberDetails($_SESSION['adminid']);
?>