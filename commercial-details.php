<?php 
include '_top.php'; 
$link=$_SERVER['REQUEST_URI']; 
$link_array=explode('/',$link);
$comslug=FilterInput(strval(end($link_array)));
if(empty($comslug) OR $comslug=="commercial-services"){include '404.php';die();} 


$stmt = $PDO->prepare("SELECT * FROM com_service WHERE com_slug='$comslug' AND com_status=1");
$stmt->execute(); 
$datac = $stmt->fetch(PDO::FETCH_OBJ);
if(empty($datac)){include '404.php';die();}
if(!empty($datac->com_banner) AND file_exists("assets/images/com_services/banner/".$datac->com_banner)){
      $coverimg = "assets/images/com_services/banner/".$datac->com_banner;}
else  $coverimg = "assets/images/com_services/banner/placeholder.jpg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dexter Groups">
	<meta name="author" content="Ansonika">
	<title>DEXTER GROUPS - <?php echo $datac->com_name?></title>
	<link href="css/shop.css" rel="stylesheet">
	<?php include '_header.php'; ?>
	
</head>
<body>
<?php include '_menu.php'; ?>	

<section class="parallax_window_in short" data-parallax="scroll" data-image-src="<?php echo $coverimg;?>" data-natural-width="1400" data-natural-height="350">
		<div id="sub_content_in">
			<div class="container">
				<h1><?php echo $datac->com_name?></h1>
				<p>"<?php echo $datac->com_small_desc?>"</p>
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
							$gallist = $PDO->prepare("SELECT * FROM com_gallery WHERE cg_com_id_ref='$datac->com_id' AND cg_img_status=1");
							$gallist->execute(); 
							$galdet=$gallist->fetchAll();
							if (empty($galdet)) {
							echo '<img src="assets/images/com_services/images/placeholder.jpg" alt="">';
							}else{
							?>
							<?php $count=1; foreach($galdet as $eachgal) {
							extract($eachgal);
							$mainimg="assets/images/com_services/images/".$cg_img_lg;

							?>
                            <div class="shop-item col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="javascript:void(0);"><img src="<?php echo $mainimg;?>" alt=""></a></figure>
                                    </div>
                                    <?php if(!empty($eachgal['cg_img_name'])){
                                    echo '<div class="product_description">
                                        <h3><a href="javascript:void(0);">'.$eachgal['cg_img_name'].'</a></h3>
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