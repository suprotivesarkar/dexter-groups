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
	<title>DEXTER GROUPS - Quotation</title>

	<?php include '_header.php'; ?>
    <style type="text/css">
        .btn_1{
            background: #222!important;
            transition: 0.3s;
        }
        .btn_1:hover{
            background: #F33!important;
        }
    </style>
</head>
<body>
<?php include '_menu.php'; ?>	

<section class="parallax_window_in short" data-parallax="scroll" data-image-src="img/subheader_in_3.jpg" data-natural-width="1400" data-natural-height="350">
		<div id="sub_content_in">
			<div class="container">
				<h1>Quotation</h1>
				<p>"Our proposal for our services provides an overview of our key strengths, especially the tangible and intangible benefits that you will enjoy from this safety offer. A custom proposal will be generated for your project and emailed to you within 1-2 days"</p>
			</div>
		</div>
	</section><!-- End section -->
    
   	<main>    
        <div class="container margin_60_35">
        	<div class="row">
                
                <div class="col-md-9">
                <form id="quotation" method="POST">
                	<div class="form_title">
                        <h3><strong><i class="fa fa-user"></i></strong>Personal Info</h3>
                        <p>
                 
                        </p>
                    </div>
                    <div class="step">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" class="form-control required" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control required" id="emailid" name="emailid">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control required" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                </div><!--End step -->
                
                <div class="form_title">
                        <h3><strong><i class="fa fa-info"></i></strong>Company Details</h3>
                        <p>
                        </p>
                    </div>
               	<div class="step">
				<div class="row">
                    <div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Company Name</label>
							<input type="text" id="comname" name="comname" class="form-control required">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<label>Company Address</label>
							<input type="text" id="comadd" name="comadd" class="form-control">
						</div>
					</div>
				</div>
				 <div class="row">
            		<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Document (jpeg, png, pdf, docx)</label>
							<input type="file" id="comimg" name="comimg" class="form-control">
						</div>
					</div>
            	</div>
			</div><!--End step -->
            
            
            <div class="form_title">
                <h3><strong><i class="fa fa-pencil"></i></strong>What you need</h3>
                <p>
                </p>
            </div>

				<div class="step add_bottom_30">
					<div class="form-group add_bottom_45">
						<label>Write your notes or requirements</label>
						<textarea name="message" id="message" style="height:100px" class="form-control"></textarea>
					</div>

					<button type="submit" class="btn_1 medium">Submit</button>
				</div>
				<!--End step -->
				<div class="rh col-xs-12 outmsg">
				</div>
				</form>
                </div><!-- End col-md-9 -->
                
                <div class="col-md-3">
                    <div class="box_style_2">
                        <h5>Address</h5>
                            <ul>
                                <li><strong>Registered Office</strong>
                                    <br>1D, Motijheel Lane,<br>Kolkata - 700 015<br> West Bengal. India
                                </li>
                                <li><strong>Liaison Office</strong>
                                    <br>51 K /2A Pottery Road, Kolkata - 700 015<br> West Bengal. India
                                </li>
                                
                            </ul>
                             <h5>Contacts</h5>
                            <ul>
                                 <li><strong>Contact Person</strong><br>Mr. Kajal Sinha ( Managing Director )</li>
                                <li><strong>Phone</strong><br><a href="tel:+91 98303 84234">+91 98303 84234</a><br><small>Mon to Sat 9am - 9pm</small></li>
                                <li><strong>General info</strong><br><a href="mailto:admin@dextergroup.in">admin@dextergroup.in</a>
                                <br><a href="mailto:dextergroup1965@gmail.com">dextergroup1965@gmail.com</a></li>
                                <li><strong>Request a callback</strong><p class="nopadding">Leave us a mail at <br><a href="mailto:admin@dextergroup.in">admin@dextergroup.in</a> and our team will contact you within a day.</p></li>
                            </ul>
                    </div>                    
                </div><!-- End col-md-3 -->
                
            </div><!-- End row -->
        </div><!-- End container -->
	</main><!-- End main -->

<?php include '_footer.php'; ?>
	<script>
	  $("#quotation").validate();
	</script>
	<script>
$(document).ready(function(){
	$("#quotation").on('submit',(function(e){
    e.preventDefault();
    var url="_check_quote";
    var data = new FormData(this);
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      contentType: false,
      cache: false,
      processData:false, 
      dataType:"json",
      beforeSend: function(){$('.actionbtn').addClass('is-loading');},
      error: function(res){$('.actionbtn').removeClass('is-loading');},
      success: function(res){
        $('.actionbtn').removeClass('is-loading');
        $(".outmsg").html(res.msg);
        if(res.status){$("#quotation").trigger('reset');}
      }
	})
  }));
});
</script>
</body>
</html>