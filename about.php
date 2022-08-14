<?php 
include '_top.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="HOMEALARMS - Alarms and security systems site template">
	<meta name="author" content="Ansonika">
	<title>DEXTER GROUPS - About Us</title>

	<?php include '_header.php'; ?>
</head>
<body>
<?php include '_menu.php'; ?>	

<section class="parallax_window_in short" data-parallax="scroll" data-image-src="img/subheader_in_3.jpg" data-natural-width="1400" data-natural-height="350">
		<div id="sub_content_in">
			<div class="container">
				<h1>About Us</h1>
				<p>"We, on behalf of the Dexter family, take this opportunity to introduce ourselves as one of the leading Fire Contractors, dealing in consultation and erection of “FIRE PROTECTION & DETECTION SYSTEM”."</p>
			</div>
		</div>
	</section><!-- End section -->

	<main>
		<div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="intro">
                        <p><img src="img/about_1.jpg" alt="" class="img-responsive"></p>
                        <h2>"experts since 1997"</h2>
                        <p class="lead">
                            The company is engaged in expanding its services under the able management of Mr. Kajal Sinha, a Mechanical Engineer, who possesses more than 35 years of experience in the field of 'Fire Protection Management' and 'Facility Management Services. We provide services to our clients through our highly qualified and dedicated team of professionals, which includes consultants, engineers, architects, fabricators, and contractors. Backed by such an experienced and motivated workforce, we excel in constantly working towards maximizing our clients' satisfaction. Experience being our main strength, we offer you our best services with a touch of professionalism.
                        </p>
                    </div>
                </div>
            </div><!-- End row -->

			<hr>

			<div class="row">
				<div class="col-sm-4">
					<h3>WE ASSURE QUALITY</h3>
					<p>
						We at Dexter confirm that <strong>Client Satisfaction</strong>, <strong>In-Time Service</strong>, and <strong>Commitment to Quality</strong> are the mottos of our organization.
					</p>
					<p>
						In order to ensure the best results, we use quality equipment and materials. We have a checklist system and procedures that ensure the quality and efficiency of our service.
					</p>
					<h4>MISSION</h4>
					<p>
						We aim to provide the best fire-fighting solutions to our esteemed clients. In addition to this, we also provide periodical training to our employees that make them serve you in the best possible way. 
					</p>
					<p>
						Our commitment and concern are reflected in our quick turnaround time on complaints.
					</p>
				</div>
				<div class="col-sm-7 col-sm-offset-1">
					<ul class="feat" id="about">
						<?php 
									$stmt ="SELECT *
									            FROM about
									            WHERE abo_status=1 LIMIT 4 ";
									$res = $PDO->prepare($stmt);
									$res->execute();    
									$teslist = $res->fetchAll();
									foreach ($teslist  as $pkges){extract($pkges); 
									if(!empty($abo_img) AND file_exists('assets/images/about/'.$abo_img)){
									  $img =  $abo_img;       
									}else{
									  $img = "placeholder.png";
									}
									?>
						<li>
							<i class="fa fa-check-square-o"></i>
							<!-- <img src="assets/images/about/<?php echo $img ?>"> -->
							<h4><?php echo $abo_name; ?></h4>
							<p>
								<?php echo $abo_text; ?>
							</p>
						</li>
						<?php } ?>
<!-- 						<li>
							<i class="fa fa-check-square-o"></i>
							<h4>Affordable Prices</h4>
							<p>
								Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has. Sit ullum latine ei. Ius id adhuc iriure torquatos. Justo prompta senserit eos cu, omnesque posidonium liberavisse pri in.
							</p>
						</li>
						<li>
							<i class="fa fa-check-square-o"></i>
							<h4>Great Support</h4>
							<p>
								Eum purto epicurei cotidieque at, ius luptatum invidunt no, vim at sint pertinacia repudiandae. Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has. Sit ullum latine ei. Justo prompta senserit eos cu, omnesque posidonium liberavisse pri in.
							</p>
						</li> -->
					</ul>
				</div>
			</div><!-- End row -->

			<hr>

			<div class="text-center">
				<h2>An ISO 9001:2008' Certified Co.</h2>
				<p class="lead">
					Dexter Equipments Co. Pvt. Ltd. is an ISO 9001:2008, ISO 14001:2004 & OSHAS 18001:2007' Certified Company.<br> Registered in 1997, the Company has developed the concept of 'Fire Protection Systems' with the ambition to offer our clients a single-window solution to all Fire Fighting Solutions.
				</p>
			</div>
			
			<!--Team Carousel -->
			<div class="row">
				<div class="owl-carousel team-carousel">

					<div class="team-item">
						<div class="team-item-img">
							<img src="img/certificate/certi-1.jpg" alt="">
						</div>
					</div>

					<div class="team-item">
						<div class="team-item-img">
							<img src="img/certificate/certi-2.jpg" alt="">
						</div>
					</div>

					<div class="team-item">
						<div class="team-item-img">
							<img src="img/certificate/certi-3.jpg" alt="">
						</div>
					</div>

					<div class="team-item">
						<div class="team-item-img">
							<img src="img/certificate/certi-4.jpg" alt="">
						</div>
					</div>
				</div>
			</div><!--End Team Carousel-->
		</div><!-- End container -->

		<section class="promo_full">
			<div class="promo_full_wp">
				<div>
					<h3>What Clients say<span>Testimonials</span></h3>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="carousel_testimonials">
									<?php 
									$stmt ="SELECT *
									            FROM testimonials
									            WHERE testi_status=1 ORDER BY RAND() LIMIT 6 ";
									$res = $PDO->prepare($stmt);
									$res->execute();    
									$teslist = $res->fetchAll();
									foreach ($teslist  as $pkges){extract($pkges); 
									if(!empty($testi_img) AND file_exists('assets/images/testimonials/'.$testi_img)){
									  $img =  $testi_img;       
									}else{
									  $img = "user.png";
									}
									?>
									<div>
										<div class="box_overlay">
											<div class="pic">
												<figure><img src="assets/images/testimonials/<?php echo $img; ?>" alt="" class="img-circle">
												</figure>
												<h4><?php echo $testi_name; ?><!-- <small>12 October 2015</small> --></h4>
											</div>
											<div class="comment">
												" <?php echo $testi_text; ?> "
											</div>
										</div><!-- End box_overlay -->
									</div>
									<?php } ?>

								</div><!-- End carousel_testimonials -->
								
							</div><!-- End col-md-8 -->
						</div><!-- End row -->
					</div><!-- End container -->
				</div><!-- End promo_full_wp -->
			</div><!-- End promo_full -->
		</section><!-- End section -->
	</main><!-- End main -->

<?php include '_footer.php'; ?>
	<script>
		'use strict';
		$(".team-carousel").owlCarousel({
			items: 1,
			loop: true,
			margin: 10,
			autoplay: false,
			smartSpeed: 300,
			responsiveClass: false,
			responsive: {
				320: {
					items: 1,
				},
				768: {
					items: 2,
				},
				1000: {
					items: 3,
				}
			}
		});
	</script>

</body>
</html>