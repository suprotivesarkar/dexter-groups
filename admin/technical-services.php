<?php include '_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Technical Services</title>
<?php  include '_header.php'; ?>
<style type="text/css">
table.text-left thead tr th, table.text-left tbody tr td {text-align: left!important;}
.text-info {
    color: #084796!important;
}
</style>
</head> 
<body> 
<?php  include '_menu.php'; ?>
<div class="row">
<div class="col-md-12"> 
<div class="card card-statistics h-100">

<div class="card-body">

<div class="row">
<div class="col-xl-12">
<div class="card card-statistics h-100">
<div class="card-title"><h5>Technical Service List<a href="" data-toggle="modal" data-target="#addMod" class="button x-small pull-right">ADD NEW <i class="fa fa-plus"></i></a></h5></div>
<div class="card-body">
<div class="loadroom"></div>
</div>
</div>
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
<div class="modal-title"><h4>Add New Technical Service</h4></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form id="addfrm" autocomplete="off" enctype="multipart/form-data">
<div class="row">
<div class="form-group col-sm-12">
<label for="proname">Enter Technical Service Name:<span class="req">*</span></label>
<input type="text" class="form-control" id="proname" name="proname" required="" autofocus="">
</div>
<div class="form-group col-sm-12">
<label for="prourl">Enter URL:</label>
<input type="text" class="form-control" id="prourl" name="prourl" required="">
</div>

<div class="form-group col-sm-12">
<button type="submit" class="button btn-block btn-lg entrybtn">Add Now</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php  include '_footer.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
fetchPro();
$.validator.messages.required = '';
$('#addfrm').validate({});
$("#addfrm").on('submit',(function(e){
e.preventDefault();
if($("#addfrm").valid()){
    var url="helper/master/technical_service";
    var data = new FormData(this);
    data.append("operation","addPro");
    $.ajax({
      type:"POST",url:url,data:data,contentType:false,cache:false,processData:false,dataType:"json",
      beforeSend: function(){$('.entrybtn').addClass('eventbtn');},
      error: function(res){$('.entrybtn').removeClass('eventbtn');showToast("Something Wrong Try Later","error");},
      success: function(res)
      {
        $('.entrybtn').removeClass('eventbtn');
        if(res.status){
          fetchPro();
          $("#addfrm").trigger('reset');
          showToast(res.msg,"success");
        }else {showToast(res.msg,"error");}
      }
    }); 
}else{return false;}
})); 
$(".loadroom").delegate('.statusup',"click",function(){
  var id=$(this).data("id");
  var operation=$(this).data("operation");
  if (operation=="deletepro"){
      swal({title: "Are you sure?",text: "Once deleted, you will not be able to recover",icon: "warning",buttons: true,dangerMode: true,
      }).then((willDelete)=>{if(willDelete){StatusUpdate(id,operation);}});
  }else {StatusUpdate(id,operation);} 
});
function StatusUpdate(id,type){
  var url = "helper/master/technical_service";
  $.ajax({
    type:"POST",
    url:url,
    dataType:"json",
    data:{"id":id,"operation":type},
    beforeSend:function(){},
    error:function(res){$('.entrybtn').removeClass('eventbtn');showToast("Something Wrong Try Later","error");},
    success:function(res)
    { 
      if(res.status){fetchPro();showToast(res.msg,"success");}
      else{showToast(res.msg,"error");}
    }
  });
}
$("#proname").keyup(function(){$("#prourl").val(convertToSlug($(this).val()));});
$("#proname").keyup(function(){$(this).val();$("#prourl").val(convertToSlug($(this).val()));});
function fetchPro(){
  $.ajax({
    type: "POST",
    url: "helper/master/technical_service",
    data: {"operation":"fetchPro"},
    beforeSend: function(){},
    error: function(res){$('.loadroom').html('Something Wrong Try Later');},
    success: function(res)
    {
      $('.loadroom').html(res);
      $('#entry_table_room').DataTable({stateSave:true});
      $(".loadroom tbody").sortable({
        axis: 'y',
          update:function(event,ui){
          var data =$(".loadroom tbody").sortable('toArray');
          $.ajax({
          data:{data:data,"operation":"orderRoomList"},
          type:'POST',
          dataType:"json",
          url:'helper/master/technical_service',
          success:function(res){if(res.status){fetchPro();showToast(res.msg,"success");}else{showToast(res.msg,"error");}}
          });
        }   
      });
    }
  }); 
}
});
</script>
</body>
</html>