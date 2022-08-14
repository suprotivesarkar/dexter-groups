<?php 
include '_top.php'; 
$link=$_SERVER['REQUEST_URI']; 
$link_array=explode('/',$link);
$techslug=FilterInput(strval(end($link_array)));
if(empty($techslug) OR $techslug=="technical-services"){include '404.php';die();} 


$stmt = $PDO->prepare("SELECT * FROM tech_service WHERE tech_slug='$techslug' AND tech_status=1");
$stmt->execute(); 
$datat = $stmt->fetch(PDO::FETCH_OBJ);
if(empty($datat)){include '404.php';die();}
if(!empty($datat->tech_banner) AND file_exists("assets/images/tech_services/banner/".$datat->tech_banner)){
      $coverimg = "assets/images/tech_services/banner/".$datat->tech_banner;}
else  $coverimg = "assets/images/tech_services/banner/placeholder.jpg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dexter Groups">
	<meta name="author" content="Ansonika">
	<title>DEXTER GROUPS - <?php echo $datat->tech_name?></title>
	<link href="css/shop.css" rel="stylesheet">
	<?php include '_header.php'; ?>
	
</head>
<body>
<?php include '_menu.php'; ?>	

<section class="parallax_window_in short" data-parallax="scroll" data-image-src="<?php echo $coverimg;?>" data-natural-width="1400" data-natural-height="350">
		<div id="sub_content_in">
			<div class="container">
				<h1><?php echo $datat->tech_name?></h1>
				<p>"<?php echo $datat->tech_small_desc?>"</p>
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
							$gallist = $PDO->prepare("SELECT * FROM tech_gallery WHERE tg_tech_id_ref='$datat->tech_id' AND tg_img_status=1");
							$gallist->execute(); 
							$galdet=$gallist->fetchAll();
							if (empty($galdet)) {
							echo '<img src="assets/images/tech_services/images/placeholder.jpg" alt="">';
							}else{
							?>
							<?php $count=1; foreach($galdet as $eachgal) {
							extract($eachgal);
							$mainimg="assets/images/tech_services/images/".$tg_img_lg;

							?>
                            <div class="shop-item col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="javascript:void(0);"><img src="<?php echo $mainimg;?>" alt=""></a></figure>
                                    </div>
<!--                                     <div class="product_description">
                                        <h3><a href="javascript:void(0);"><?php echo $eachgal['tg_img_name']; ?></a></h3>
                                    </div> -->
                                    <?php if(!empty($eachgal['tg_img_name'])){
                                    echo '<div class="product_description">
                                        <h3><a href="javascript:void(0);">'.$eachgal['tg_img_name'].'</a></h3>
                                    </div>';
                                }else{
                                    echo '<div class="product_description" style="display: none;">
                                        <h3><a href="javascript:void(0);"></a></h3>
                                    </div>';
                                    }?>
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