	<?php debug_backtrace() || header("Location: 404");?>
	<div class="layer"></div><!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header>
		<div id="top_line">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 hidden-xs">
						<span id="tag_line">"Experts since 1997"</span>
					</div>
					<div class="col-sm-8">
						<ul id="top_links">
							<li>
								<?php 
									$stmt = $PDO->prepare("SELECT * FROM socials WHERE social_id=1");
									$stmt->execute(); 
									$data = $stmt->fetch(PDO::FETCH_OBJ);
								?>
								<a href="https://api.whatsapp.com/send?phone=91<?php echo $data->facebook; ?>&amp;text=" target="_blank" id="phone_top"><i class="fa fa-whatsapp"></i>+91 <?php echo $data->facebook; ?></a>

								<span id="opening"><i class="fa fa-globe"></i>Mon - Sat 9:00/21:00</span></li>
							<li class="hidden-xs"><a href="quotation">Request A Proposal</a></li>
						</ul>
					</div>
				</div><!-- End row -->
			</div><!-- End container-->
		</div><!-- End top line-->

		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<div id="logo">
						<a href="./"><img src="img/logo.png" width="190" height="44" alt="Dexter Groups" data-retina="true"></a>
					</div>
				</div>
				<nav class="col-xs-9">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
					<div class="main-menu">
						<div id="header_menu">
							<img src="img/logo.png" width="190" height="44" alt="Dexter Groups" data-retina="true">
						</div>
						<a href="javascript:void(0)" class="open_close" id="close_in"><i class="fa fa-times"></i></a>
						<ul>
							<li class="submenu">
								<a href="./" class="show-submenu">Home</a>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Services <i class="fa fa-chevron-down"></i></a>
								<ul>
									<li><a href="javascript:void(0);" class="show-submenu">Technical Services <i class="fa fa-chevron-right"></i></a>
										<ul>
										<?php 
							            $stmt ="SELECT * FROM tech_service WHERE tech_status=1";
										$res = $PDO->prepare($stmt);
										$res->execute();    
										$catlist = $res->fetchAll(); 
										foreach($catlist as $eachcat){ ?>
									<li><a href="<?php echo $eachcat['tech_slug']; ?>"><?php echo $eachcat['tech_name']; ?></a></li>
									<?php }?>
										</ul>
									</li>
									<li><a href="javascript:void(0);" class="show-submenu">Commercial Services <i class="fa fa-chevron-right"></i></a>
										<ul>
										<?php 
							            $stmt ="SELECT * FROM com_service WHERE com_status=1";
										$res = $PDO->prepare($stmt);
										$res->execute();    
										$catlist = $res->fetchAll(); 
										foreach($catlist as $eachcat){ ?>
									<li><a href="<?php echo $eachcat['com_slug']; ?>"><?php echo $eachcat['com_name']; ?></a></li>
									<?php }?>

										</ul>
									</li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Products <i class="fa fa-chevron-down"></i></a>
								<ul>
									<?php 
							            $stmt ="SELECT * FROM product WHERE pro_status=1";
										$res = $PDO->prepare($stmt);
										$res->execute();    
										$catlist = $res->fetchAll(); 
										foreach($catlist as $eachcat){ ?>
									<li><a href="<?php echo $eachcat['pro_slug']; ?>"><?php echo $eachcat['pro_name']; ?></a></li>
									<?php }?>

									
								</ul>
							</li>
							<li><a href="about">About us</a></li>

							<li><a href="contact">Contact us</a></li>

							<li><a href="quotation" id="quote-li">Get A Quote</a></li>
						</ul>
					</div><!-- End main-menu -->
				</nav>
			</div>
		</div><!-- container -->
	</header><!-- End Header -->