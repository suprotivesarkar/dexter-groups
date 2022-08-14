<?php debug_backtrace() || header("Location: 404");?>
<div class="wrapper">
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-left navbar-brand-wrapper">
<a class="navbar-brand brand-logo" href="dashboard"><img src="assets/img/logo_big.png" alt=""></a>
<a class="navbar-brand brand-logo-mini" href="dashboard"><img src="assets/img/logo.png" alt=""></a>
</div>
<ul class="nav navbar-nav mr-auto">
<li class="nav-item"> <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a></li>
</ul>
<ul class="nav navbar-nav ml-auto">
<li class="nav-item" id="time"></li>
<li class="nav-item fullscreen"> <a id="btnFullscreen" href="javascript:void(0);" class="nav-link"><i class="ti-fullscreen"></i></a>
</li>
<li class="nav-item dropdown mr-30">
<a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo MemberAvtar($memdet['member_id']); ?>" alt="avatar"></a>
<div class="dropdown-menu dropdown-menu-right">
<div class="dropdown-header">
<div class="media">
<div class="media-body">
<h5 class="mt-0 mb-0"><?php echo $memdet['member_name']; ?></h5><span><?php echo $memdet['member_email']; ?></span>
</div>
</div>
</div>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="settings"><i class="text-info ti-settings"></i>Settings</a>
<a class="dropdown-item" href="logout"><i class="text-danger ti-unlock"></i>Logout</a>
</div>
</li>
</ul>
</nav>
<div class="container-fluid">
<div class="row">
<div class="side-menu-fixed">
<div class="scrollbar side-menu-bg">
<ul class="nav navbar-nav side-menu" id="sidebarnav">
<li><a href="dashboard"><i class="ti-clipboard"></i><span class="right-nav-text">Dashboard</span></a></li>
<li><a href="quick-quote"><i class="ti-comments"></i><span class="right-nav-text">Quotation</span></a></li>
<li><a href="quick-inquiry"><i class="ti-mobile"></i><span class="right-nav-text">Contact</span></a></li>
<li><a href="projects"><i class="ti-layers-alt"></i><span class="right-nav-text">Projects</span></a></li>
<li><a href="products"><i class="ti-tag"></i><span class="right-nav-text">Products</span></a></li>
<li><a href="technical-services"><i class="ti-light-bulb"></i><span class="right-nav-text">Technical Services</span></a></li>
<li><a href="commercial-services"><i class="ti-panel"></i><span class="right-nav-text">Commercial Services</span></a></li>
<li><a href="testimonials"><i class="ti-comments-smiley"></i><span class="right-nav-text">Testimonials</span></a></li>
<li><a href="about-us"><i class="ti-medall-alt"></i><span class="right-nav-text">About Us</span></a></li>
</ul>
</div>
</div>
<div class="content-wrapper">
<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
  document.getElementById("time").innerHTML = d.toLocaleTimeString();
}
</script>