<?php include '_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Settings</title>
<?php  include '_header.php'; ?>
</head>
<body>
<?php  include '_menu.php'; ?>
<div class="row">
<div class="col-xl-4 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<h5 class="card-title">Change Login</h5>
<form action="" autocomplete="off" id="userfrm">
<div class="row">
<div class="form-group col-sm-12 ui-widget">
<label for="oldid">Enter OLD User ID:<span class="req">*</span></label>
<input type="text" class="form-control" id="oldid" name="oldid" required="">
</div>
<div class="form-group col-sm-12">
<label for="oldpass">Enter OLD Password:<span class="req">*</span></label>
<input type="password" class="form-control" id="oldpass" name="oldpass" required="">
</div>
<div class="form-group col-sm-12">
<label for="newid">Enter New User ID:<span class="req">*</span></label>
<input type="text" class="form-control" id="newid" name="newid" required="">
</div>
<div class="form-group col-sm-12">
<label for="newpass">Enter New Password:<span class="req">*</span></label>
<input type="password" class="form-control" id="newpass" name="newpass" required="">
</div>
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
<div id="sparkline2" class="scrollbar-x text-center"></div>
</div>
</div>
<?php
$sociallinks = CheckExists("socials","social_id=1");
?>
<div class="col-xl-8 mb-30">
<div class="card h-100">
<div class="btn-group info-drop">
<a href="" data-toggle="modal" data-target="#addMod"><i class="fa fa-pencil"></i></a>
</div>
<div class="card-body">
<div class="d-block d-md-flexx justify-content-between">
<div class="d-block">
<h5 class="card-title">Contact Details</h5>
</div>
<div class="table-responsive">          
<table class="table table-hover table-bordered">
<thead>
<tr>
<th>&nbsp;</th>
<th>Phone No. & Email</th>
</tr>
</thead>
<tbody>
<tr>
<td>WhatsApp</td>
<td>
<?php if (!empty($sociallinks['facebook'])) { ?>
<a href="javascript:void(0);"><?php echo $sociallinks['facebook']; ?></a>
<?php }else{echo "-";} ?>
</td>
</tr>
<tr>
<td>Primary No.</td>
<td>
<?php if (!empty($sociallinks['twitter'])) { ?>
<a href="javascript:void(0);" ><?php echo $sociallinks['twitter']; ?></a>
<?php }else{echo "-";} ?>
</td>
</tr>
<tr>
<td>Alternate No.</td>
<td>
<?php if (!empty($sociallinks['youtube'])) { ?>
<a href="javascript:void(0);" ><?php echo $sociallinks['youtube']; ?></a>
<?php }else{echo "-";} ?>
</td>
</tr>
 <tr>
<td>Email Id</td>
<td>
<?php if (!empty($sociallinks['instagram'])) { ?>
<a href="javascript:void(0)"><?php echo $sociallinks['instagram']; ?></a>
<?php }else{echo "-";} ?>
</td>
</tr>
<!-- <tr>
<td>FB OG ID</td>
<td>
<?php if (!empty($sociallinks['fb_og_id'])) { ?>
<a href="<?php echo $sociallinks['fb_og_id']; ?>" target="_blank"><?php echo $sociallinks['fb_og_id']; ?></a>
<?php }else{echo "-";} ?>
</td>
</tr>
<tr>
<td>Twiter Card ID</td>
<td>
<?php if (!empty($sociallinks['tw_card_id'])) { ?>
<a href="<?php echo $sociallinks['tw_card_id']; ?>" target="_blank"><?php echo $sociallinks['tw_card_id']; ?></a>
<?php }else{echo "-";} ?>
</td>
</tr>
<tr>
<td>FB Site Image</td>
<td>
<?php 
if(!empty($sociallinks['fb_site_img']) AND file_exists("../images/social/".$sociallinks['fb_site_img'])) { 
?>
<a href="../images/social/<?php echo $sociallinks['fb_site_img']; ?>" target="_blank">FB Image</a>
<?php }else{echo "-";} ?>
<a href="" class="pull-right" data-toggle="modal" data-target="#fbimgMod"><i class="fa fa-pencil"></i></a>
</td>
</tr>
<tr>
<td>Twitter Site Images</td>
<td>
<?php 
if(!empty($sociallinks['tw_site_img']) AND file_exists("../images/social/".$sociallinks['tw_site_img'])) { 
?>
<a href="../images/social/<?php echo $sociallinks['tw_site_img']; ?>" target="_blank">Twitter Image</a>
<?php }else{echo "-";} ?>
<a href="" class="pull-right" data-toggle="modal" data-target="#twitterimgMod"><i class="fa fa-pencil"></i></a>
</td>
</tr>
<tr>
<td>Sitemap</td>
<td>
<?php 
if(!empty($sociallinks['sitemap']) AND file_exists("../".$sociallinks['sitemap'])) { 
?>
<a href="../<?php echo $sociallinks['sitemap']; ?>" target="_blank">Sitemap</a>
<?php }else{echo "-";} ?>
<a href="" class="pull-right" data-toggle="modal" data-target="#sitemapMod"><i class="fa fa-pencil"></i></a>
</td>
</tr>
<tr>
<td>Googlefile</td>
<td>
<?php if(!empty($sociallinks['google_file']) AND file_exists("../".$sociallinks['google_file'])) { ?>
<a href="../<?php echo $sociallinks['google_file']; ?>" target="_blank">Google</a>
<?php }else{echo "-";} ?>
<a href="" class="pull-right" data-toggle="modal" data-target="#googleMod"><i class="fa fa-pencil"></i></a>
</td>
</tr>
<tr>
<td>Bingfile</td>
<td>
<?php if(!empty($sociallinks['bing_file']) AND file_exists("../".$sociallinks['bing_file'])) { ?>
<a href="../<?php echo $sociallinks['bing_file']; ?>" target="_blank">Bing</a>
<?php }else{echo "-";} ?>
<a href="" class="pull-right" data-toggle="modal" data-target="#bingMod"><i class="fa fa-pencil"></i></a>
</td>
</tr> -->
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="addMod" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title"><h4>Update Social Info</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form action="" autocomplete="off" id="socialfrm">
<div class="row">
<div class="form-group col-sm-6">
<label for="fb">Whats App:</label>
<input type="text" class="form-control" id="fb" name="fb" value="<?php echo $sociallinks['facebook']; ?>">
</div>
<div class="form-group col-sm-6">
<label for="tw">Primary :</label>
<input type="text" class="form-control" id="tw" name="tw" value="<?php echo $sociallinks['twitter']; ?>">
</div>
<div class="form-group col-sm-6">
<label for="yt">Alternate :</label>
<input type="text" class="form-control" id="yt" name="yt" value="<?php echo $sociallinks['youtube']; ?>">
</div>
<div class="form-group col-sm-6">
<label for="ins">Email:</label>
<input type="text" class="form-control" id="ins" name="ins" value="<?php echo $sociallinks['instagram']; ?>">
</div>
<!-- <div class="form-group col-sm-6">
<label for="ogid">Facebook OG ID:</label>
<input type="text" class="form-control" id="ogid" name="ogid" value="<?php echo $sociallinks['fb_og_id']; ?>">
</div>
<div class="form-group col-sm-6">
<label for="cardid">Twitter Card ID:</label>
<input type="text" class="form-control" id="cardid" name="cardid" value="<?php echo $sociallinks['tw_card_id']; ?>">
</div> -->
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div> 
<!-- <div class="modal fade" id="fbimgMod" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title"><h4>Update Facebook Images</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form action="" autocomplete="off" id="fbfrm">
<div class="row">
<div class="form-group col-sm-12">
<label for="fbimage">FB Image:</label>
<input type="file" class="form-control" id="fbimage" name="fbimage">
</div>
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div> 
<div class="modal fade" id="twitterimgMod" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title"><h4>Update Twitter Image</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form action="" autocomplete="off" id="twfrm">
<div class="row">
<div class="form-group col-sm-12">
<label for="twimg">Twitter Image:</label>
<input type="file" class="form-control" id="twimg" name="twimg">
</div>
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div> 
<div class="modal fade" id="sitemapMod" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title"><h4>Update Sitemap</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form action="" autocomplete="off" id="sitefrm">
<div class="row">
<div class="form-group col-sm-12">
<label for="sitemap">Sitemap:</label>
<input type="file" class="form-control" id="sitemap" name="sitemap">
</div>
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div> 
<div class="modal fade" id="googleMod" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title"><h4>Update Google File</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form action="" autocomplete="off" id="gfrm">
<div class="row">
<div class="form-group col-sm-12">
<label for="gfile">Googlefile:</label>
<input type="file" class="form-control" id="gfile" name="gfile">
</div>
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div> 
<div class="modal fade" id="bingMod" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title"><h4>Update Bing</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form action="" autocomplete="off" id="bingfrm">
<div class="row">
<div class="form-group col-sm-12">
<label for="bingfile">Bing File:</label>
<input type="file" class="form-control" id="bingfile" name="bingfile">
</div>
<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Update Now <i class="fa fa-refresh fa-spin loading"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>  -->
<?php  include '_footer.php'; ?>   
<script type="text/javascript">
$(document).ready(function(){

$("#twfrm").on('submit',(function(e){
e.preventDefault();
if($("#twfrm").valid()){
  var url="helper/setting/setting";
  var data = new FormData(this);
  data.append("operation","updatetwimage");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    contentType: false,
    cache: false,
    processData:false, 
    dataType:"json",
    beforeSend: function(){$('.loading').show();},
    error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
    success: function(res)
    {
      $('.loading').hide();
      if(res.status){
        $("#twfrm").trigger('reset');
        showToast(res.msg,"success");
        setTimeout(function(){location.reload();},500);
      }else {showToast(res.msg,"error");}
    }
  }); 
}else{return false;}
}));

$("#fbfrm").on('submit',(function(e){
e.preventDefault();
if($("#fbfrm").valid()){
  var url="helper/setting/setting";
  var data = new FormData(this);
  data.append("operation","updatefbimage");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    contentType: false,
    cache: false,
    processData:false, 
    dataType:"json",
    beforeSend: function(){$('.loading').show();},
    error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
    success: function(res)
    {
      $('.loading').hide();
      if(res.status){
        $("#fbfrm").trigger('reset');
        showToast(res.msg,"success");
        setTimeout(function(){location.reload();},500);
      }else {showToast(res.msg,"error");}
    }
  }); 
}else{return false;}
}));


$("#socialfrm").on('submit',(function(e){
e.preventDefault();
if($("#socialfrm").valid()){
  var url="helper/setting/setting";
  var data = new FormData(this);
  data.append("operation","updatesocial");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    contentType: false,
    cache: false,
    processData:false, 
    dataType:"json",
    beforeSend: function(){$('.loading').show();},
    error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
    success: function(res)
    {
      $('.loading').hide();
      if(res.status){
        $("#socialfrm").trigger('reset');
        showToast(res.msg,"success");
        setTimeout(function(){location.reload();},500);
      }else {showToast(res.msg,"error");}
    }
  }); 
}else{return false;}
})); 

$("#sitefrm").on('submit',(function(e){
e.preventDefault();
if($("#sitefrm").valid()){
  var url="helper/setting/setting";
  var data = new FormData(this);
  data.append("operation","updatesitemap");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    contentType: false,
    cache: false,
    processData:false, 
    dataType:"json",
    beforeSend: function(){$('.loading').show();},
    error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
    success: function(res)
    {
      $('.loading').hide();
      if(res.status){
        $("#sitefrm").trigger('reset');
        showToast(res.msg,"success");
        setTimeout(function(){location.reload();},500);
      }else {showToast(res.msg,"error");}
    }
  }); 
}else{return false;}
})); 

$("#gfrm").on('submit',(function(e){
e.preventDefault();
if($("#gfrm").valid()){
  var url="helper/setting/setting";
  var data = new FormData(this);
  data.append("operation","updategoogle");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    contentType: false,
    cache: false,
    processData:false, 
    dataType:"json",
    beforeSend: function(){$('.loading').show();},
    error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
    success: function(res)
    {
      $('.loading').hide();
      if(res.status){
        $("#gfrm").trigger('reset');
        showToast(res.msg,"success");
        setTimeout(function(){location.reload();},500);
      }else {showToast(res.msg,"error");}
    }
  }); 
}else{return false;}
}));

$("#bingfrm").on('submit',(function(e){
e.preventDefault();
if($("#bingfrm").valid()){
  var url="helper/setting/setting";
  var data = new FormData(this);
  data.append("operation","updatebing");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    contentType: false,
    cache: false,
    processData:false, 
    dataType:"json",
    beforeSend: function(){$('.loading').show();},
    error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
    success: function(res)
    {
      $('.loading').hide();
      if(res.status){
        $("#bingfrm").trigger('reset');
        showToast(res.msg,"success");
        setTimeout(function(){location.reload();},500);
      }else {showToast(res.msg,"error");}
    }
  }); 
}else{return false;}
}));

$("#userfrm").on('submit',(function(e){
e.preventDefault();
if($("#userfrm").valid()){
    var url="helper/setting/setting";
    var data = new FormData(this);
    data.append("operation","updatepass");
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      contentType: false,
      cache: false,
      processData:false, 
      dataType:"json",
      beforeSend: function(){$('.loading').show();},
      error: function(res){$('.loading').hide();showToast("Something Wrong Try Later","error");},
      success: function(res)
      {
        $('.loading').hide();
        if(res.status){
          $("#userfrm").trigger('reset');
          showToast(res.msg,"success"); 
          setTimeout(function(){location.href ="logout";},300);
        }else {showToast(res.msg,"error");}
      }
    }); 
}else{return false;}
})); 
});
</script>       
</body>
</html>