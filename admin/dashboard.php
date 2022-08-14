<?php include '_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dexter Groups</title>
<?php  include '_header.php'; ?>
<style type="text/css">
canvas{-moz-user-select: none;-webkit-user-select: none;-ms-user-select: none;}
.carepanmain{
margin-top:40px;
box-shadow:0 0 12px rgba(119, 119, 119, 0.212);
background: rgba(226, 224, 224, 0.534);
border:none;
transition:0.6s;
}
.carepanmain:hover{
background: rgba(156, 203, 214, 0.534);
box-shadow: 0 0 12px rgba(84, 138, 150, 0.534);
}
.carepanmain img{
	padding-top: 0px;
height: 110px;
width:auto!important;
margin: 12px auto;
}
.carepan{
padding: 20px;
text-align: center;
}
.carepan p{
	font-size: 40px;
	font-weight: 600;
	margin-bottom: 10px;
}
.carepan h4{
font-size: 30px;
}
.content-wrapper{
	min-height:unset;
}

</style>
</head>
<body>
<?php  include '_menu.php'; ?>
<div class="row">
<div class="col-md-4">
<a href="quick-inquiry">
<div class="card carepanmain">
<img class="card-image-top" src="assets/img/email.png">
<div class="carepan">
<?php
$totalsql = $PDO->prepare("SELECT * FROM quick_contact WHERE qstatus=1");
$totalsql->execute(); 
$count = $totalsql->rowCount();
?>
<p><?php echo $count; ?></p>
<h4>Contact</h4>
</div>
</div></a>
</div>
<div class="col-md-4">
<a href="quick-quote">
<div class="card carepanmain">
<img class="card-image-top" src="assets/img/phone.png">
<div class="carepan">
<?php
$totalsql = $PDO->prepare("SELECT * FROM quick_quote WHERE quote_status=1");
$totalsql->execute(); 
$count = $totalsql->rowCount();
?>
<p><?php echo $count; ?></p>
<h4>Quotation</h4>
</div>
</div></a>
</div>
<div class="col-md-4">
<a href="testimonials">
<div class="card carepanmain">
<img class="card-image-top" src="assets/img/testimonials.png">
<div class="carepan"><?php
$totalsql = $PDO->prepare("SELECT * FROM testimonials WHERE testi_status=1");
$totalsql->execute(); 
$count = $totalsql->rowCount();
?>
<p><?php echo $count; ?></p>
<h4>Testimonials</h4>
</div>
</div></a>
</div>
</div>
<?php  include '_footer.php'; ?>
</body>
</html>