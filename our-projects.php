<?php 
include '_top.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dexter Groups">
	<meta name="author" content="Ansonika">
	<title>DEXTER GROUPS - Our Projects</title>

	<?php include '_header.php'; ?>
</head>
<body>
<?php include '_menu.php'; ?>	

<section class="parallax_window_in short" data-parallax="scroll" data-image-src="img/subheader_in_3.jpg" data-natural-width="1400" data-natural-height="350">
		<div id="sub_content_in">
			<div class="container">
				<h1>Our Projects</h1>
				<p>"With precision, our products have become the benchmark for several companies, which are in their respective pursuit of excellence"</p>
			</div>
		</div>
	</section>
	
	<!-- End section -->
		<main>
		<section>
			<div class="container margin_60_35">

			<div class="row">
				<?php 
									$stmt ="SELECT *
									            FROM projects
									            WHERE proj_status=1";
									$res = $PDO->prepare($stmt);
									$res->execute();    
									$teslist = $res->fetchAll();
									foreach ($teslist  as $pkges){extract($pkges); 
									if(!empty($proj_img) AND file_exists('assets/images/projects/'.$proj_img)){
									  $img =  $proj_img;       
									}else{
									  $img = "placeholder.jpg";
									}
									?>
				<div class="col-sm-4 sub-head-af">
					<a href="javascript:void(0);"><img src="assets/images/projects/<?php echo $img; ?>" alt="" class="img-responsive"></a>
					<h3><?php echo $proj_name; ?></h3>
					<p>
						<?php echo $proj_text; ?>
					</p>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	</main>

	<?php include '_footer.php'; ?>
</body>
</html>