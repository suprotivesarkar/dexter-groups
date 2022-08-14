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
	<title>DEXTER GROUPS - Contact Us</title>

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
				<h1>Contact us</h1>
				<p>"We work to provide you with the best Fire safety consulting services available. If you have any further inquiries or questions, we are happy to provide you with more information"</p>
			</div>
		</div>
	</section><!-- End section -->
	
      <main>
        <div class="container margin_60_35">
        	<div class="row">
                
            <div class="col-md-9">
                	
              <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29464.37175011727!2d88.40960821814636!3d22.61473985457081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0276fec4a8b0d7%3A0x4c355ed5a19d288d!2sDexter%20Fire%20Industries!5e0!3m2!1sen!2sin!4v1629574489502!5m2!1sen!2sin"style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
              
               <hr>
                    
              <div id="message-contact"></div>
                <form method="post" id="contactForm">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" id="emailid" name="emailid">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Your message</label>
                                <textarea rows="5" id="message" name="message" class="form-control" style="height:100px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="Submit" class="btn_1 green medium add_bottom_30" id="submit-contact"/>
                        </div>
                        <div class="rh col-xs-12 outmsg">
                        </div>
                    </div>
                </form>                    
           </div><!-- End col-md-9 -->
           <?php include '_side_bar.php'; ?>

            </div><!-- End row -->
        </div><!-- End container -->
	</main><!-- End main -->

<?php include '_footer.php'; ?>
	<script src="assets/validate.js"></script>
    <script>
$(document).ready(function(){
    $("#contactForm").on('submit',(function(e){
    e.preventDefault();
    var url="_check_contact";
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
        if(res.status){$("#contactForm").trigger('reset');}
      }
    })
  }));
});
</script>
</body>
</html>