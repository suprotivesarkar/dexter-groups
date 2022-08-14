<?php debug_backtrace() || header("Location: 404");?>
<footer>
		<div class="container">
			<div class="row ">
				<div class="col-md-4 col-sm-8">
					<img src="img/logo-footer.png" width="190" height="44" alt="Home Alarms" data-retina="true" id="logo_footer">
					<p>Dexter Equipments Company (P) Ltd & Dexter Fire Industries registered in 1997, the Company has developed the concept of ‘Fire Protection & Detection Systems’ with the ambition to offer our clients a single-window solution to all Fire Fighting Solutions.</p>
				</div>
				<div class="col-md-3 col-md-offset-1 col-sm-4">
					<h3>Discover</h3>
					<ul>
						<li><a href="./">Home</a></li>
						<li><a href="about">About Us</a></li>
						<li><a href="quotation">Quotation</a></li>
						<li><a href="contact">Contact Us</a></li>
						<li><a href="our-projects">Our Projects</a></li>
						<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2">SiteMap</a></li>
						<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Terms and condition</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-12" id="contact_bg">
					<h3>Contacts</h3>
					<ul id="contact_details_footer">
						<?php 
									$stmt = $PDO->prepare("SELECT * FROM socials WHERE social_id=1");
									$stmt->execute(); 
									$dta = $stmt->fetch(PDO::FETCH_OBJ);
								?>
						<li id="address_footer"><i class="fa fa-home"></i>1D, Motijheel Lane, Kolkata - 700 015, West Bengal, India</li>
						<li id="phone_footer"><i class="fa fa-phone"></i><a href="tel:<?php echo $dta->twitter; ?>"><?php echo $dta->twitter; ?></a> / <a href="tel:<?php echo $dta->youtube; ?>"><?php echo $dta->youtube; ?></a></li>
						<li id="email_footer"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $dta->instagram; ?>"><?php echo $dta->instagram; ?></a>
						</li>

					</ul>
				</div>
			</div><!-- End row -->	
			<div id="social_footer">
				<ul>
					<li><a href="mailto:dextergroup1965@gmail.com"><i class="fa fa-google"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>
		</div><!-- End container -->
		<div id="copy">
			<div class="container">
				© <a href="./">Dexter Groups</a> (1997-<?php echo date('Y'); ?>) - All rights reserved.
			</div>			
			<div class="container">
				Designed and Developed By <a href="https://tranzposing-gradient.com/" target="./">Tranzposing Gradient</a>
			</div>
		</div><!-- End copy -->
	</footer><!-- End footer -->

	<div id="toTop"><i class="fa fa-chevron-up"></i></div><!-- Back to top button -->
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Terms and conditions</h4>
		  </div>
		  <div class="modal-body">
			<h5>Ei aliquip regione</h5>
			<p>Lorem ipsum dolor sit amet, nibh omnium in eum, ne per omittam eligendi efficiantur. Eos at mundi dolorem, ad cum omnes utroque fastidii, est fastidii apeirian ea. Ne duo diceret partiendo voluptatum, vel at iudico civibus. Purto erant aliquando ex eos, at vel odio modo. In mel tollit reprehendunt, ut usu praesent posidonium cotidieque. Clita assentior maiestatis sea in, at electram voluptaria mel. Tale nusquam adipisci ad mel, partem civibus no vix, sea no accusata dignissim.</p>
			<h5>Altera vocibus eleifend</h5>
			<p>No dico agam error qui, adhuc dicat argumentum sit in. Munere virtute ea ius. Mei an graeco repudiandae disputationi, ex per animal invidunt, probo civibus ne duo. Mea ad officiis temporibus, vim ne idque probatus phaedrum, elit delectus indoctum te has. No sea reprimique necessitatibus, ut usu quas falli.</p>
		  </div>
		</div>
	  </div>
	</div>
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">SiteMap</h4>
		  </div>
		  <div class="modal-body">
		  	<ul>
		  		<li><a href="./" style="color: #d40101;">Home</a></li>
		  		<li>Services
		  		<ul>
		  		<li>Technical Services
		  			<ul>
		  				<li><a href="tmaintainance" style="color: #d40101;">Maintainance</a></li>
		  				<li><a href="tinstallation" style="color: #d40101;">Installation</a></li>
		  				<li><a href="tcommitioning" style="color: #d40101;">Commitioning</a></li>
		  				<li><a href="trectification" style="color: #d40101;">Rectification</a></li>
		  				<li><a href="tfire-extinguisher-supply-refil" style="color: #d40101;">Fire Extinguisher - Supply & Refil</a></li>
		  			</ul>
		  		</li>		
		  		<li>Commercial Services
		  			<ul>
		  				<li><a href="cfire-safety-training" style="color: #d40101;">Fire Safety Training</a></li>
		  				<li><a href="caudit" style="color: #d40101;">Audit</a></li>
		  				<li><a href="cconsultation" style="color: #d40101;">Consultation</a></li>
		  				<li><a href="csurvey" style="color: #d40101;">Survey</a></li>
		  				<li><a href="cnoc-consultation" style="color: #d40101;">NOC Consultation</a></li>
		  			</ul>
		  		</li>		
		  		</ul>
		  		</li>
		  		<li>Products
		  			<ul>
		  				<li><a href="pextinguishers-and-refil" style="color: #d40101;">Extinguishers and Refil</a></li>
		  				<li><a href="pindustrial-safety" style="color: #d40101;">Industrial Safety</a></li>
		  				<li><a href="psystem-jobs" style="color: #d40101;">System Jobs</a></li>
		  				<li><a href="psystem-accessories" style="color: #d40101;">System Accessories</a></li>
		  			</ul>
		  		</li>
		  		<li><a href="about" style="color: #d40101;">About Us</a></li>
		  		<li><a href="contact" style="color: #d40101;">Contact Us</a></li>
		  		<li><a href="quotation" style="color: #d40101;">Request A Proposal</a></li>
		  	</ul>
		  </div>
		</div>
	  </div>
	</div>

	<!-- Common scripts -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- LayerSlider script files -->
	<script src="layerslider/js/greensock.js"></script>
	<script src="layerslider/js/layerslider.transitions.js"></script>
	<script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
	<script src="js/slider_func.js"></script>
	
	<!-- Specific scripts -->
	<script src="js/jquery.validate.js"></script>
	<script src="js/jquery.stepy.min.js"></script>
	<script src="js/quotation-validate.js"></script>