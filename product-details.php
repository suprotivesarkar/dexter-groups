<?php 
include '_top.php'; 
$link=$_SERVER['REQUEST_URI']; 
$link_array=explode('/',$link);
$proslug=FilterInput(strval(end($link_array)));
if(empty($proslug) OR $proslug=="products"){include '404.php';die();} 


$stmt = $PDO->prepare("SELECT * FROM product WHERE pro_slug='$proslug' AND pro_status=1");
$stmt->execute(); 
$datap = $stmt->fetch(PDO::FETCH_OBJ);
if(empty($datap)){include '404.php';die();}
if(!empty($datap->pro_banner) AND file_exists("assets/images/products/banner/".$datap->pro_banner)){
      $coverimg = "assets/images/products/banner/".$datap->pro_banner;}
else  $coverimg = "assets/images/products/banner/placeholder.jpg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dexter Groups">
	<meta name="author" content="Ansonika">
	<title>DEXTER GROUPS - <?php echo $datap->pro_name?></title>
	<link href="css/shop.css" rel="stylesheet">
	<?php include '_header.php'; ?>
	
</head>
<body>
<?php include '_menu.php'; ?>	

<section class="parallax_window_in short" data-parallax="scroll" data-image-src="<?php echo $coverimg;?>" data-natural-width="1400" data-natural-height="350">
		<div id="sub_content_in">
			<div class="container">
				<h1><?php echo $datap->pro_name?></h1>
				<p>"<?php echo $datap->pro_small_desc?>"</p>
			</div>
		</div>
	</section><!-- End section -->
        
	 <main>
        <div class="container margin_60_35">
    	<div class="row">
            <div class="col-md-9">
                <div class="shop-section">
                    
                        <div class="row">

                        	<?php 
							$gallist = $PDO->prepare("SELECT * FROM product_gallery WHERE pg_pro_id_ref='$datap->pro_id' AND pg_img_status=1");
							$gallist->execute(); 
							$galdet=$gallist->fetchAll();
							if (empty($galdet)) {
							echo '<img src="assets/images/products/images/placeholder.jpg" alt="">';
							}else{
							?>
							<?php $count=1; foreach($galdet as $eachgal) {
							extract($eachgal);
							$mainimg="assets/images/products/images/".$pg_img_lg;

							?>
                            <div class="shop-item col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="javascript:void(0);"><img src="<?php echo $mainimg;?>" alt=""></a></figure>
                                    </div>
                                    <div class="product_description">
                                        <h3><a href="javascript:void(0);"><?php echo $eachgal['pg_img_name']; ?></a></h3>
                                    </div>
                                </div>
                            </div><!--End Shop Item-->
                            	   <?php  $count++;} ?>
									<?php } ?>
                        </div><!--End Shop Item-->
                        
                </div><!-- End row -->
            </div><!-- End col -->
            
            <!--Sidebar-->
       <?php include '_side_bar.php'; ?>
        </div><!--/row-->
    </div><!--/container--> 
			
	</main><!-- End main -->

<?php include '_footer.php'; ?>
</body>
</html>