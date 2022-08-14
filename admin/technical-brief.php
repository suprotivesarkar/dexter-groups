<?php include '_auth.php'; ?>
<?php
$id=FilterInput($_GET['id']);
if(!is_numeric($id)){include '404.php';die();}
$stmt = $PDO->prepare("SELECT * FROM tech_service WHERE tech_id='$id' AND tech_status<>2");
$stmt->execute(); 
$data = $stmt->fetch(PDO::FETCH_OBJ);
if(empty($data)){include '404.php';die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Technical Service Type Details</title>
<?php  include '_header.php'; ?>
<style type="text/css">
table.text-left thead tr th, table.text-left tbody tr td {text-align: left!important;}
.faclist li{display: inline-block;background: #1f7da0;margin: 10px 2px;padding: 4px 11px;border-radius: 24px;color: #fff;font-weight: 600;}
</style>
</head>
<body>
<?php  include '_menu.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card card-statistics h-100">
<div class="card-title">
<h5>Technical Service Type - <?= $data->tech_name; ?> <a href="technical-services" class="button x-small pull-right"><i class="fa fa-long-arrow-left"></i> Back</a> <a href="technical_update?id=<?php echo $id; ?>" class="button x-small pull-right mx-2"><i class="fa fa-pencil"></i> Update</a></h5></div>
<div class="card-body">
<ul class="nav nav-tabs thmnavtab">
<li class="nav-item"><a class="nav-link active" href="technical-brief?id=<?= $data->tech_id; ?>">Brief Info</a></li>
<li class="nav-item"><a class="nav-link" href="technical-gallery?id=<?= $data->tech_id; ?>">Technical Services</a></li>
</ul>
<div class="table-responsive">          
<table class="table table-hover table-bordered text-left">
<tbody>
<tr>
<td>NAME</td>
<td><?php echo $data->tech_name; ?></td>
</tr>
<tr>
<td>BANNER</td>
<td><img src="../assets/images/tech_services/banner/<?php echo $data->tech_banner; ?>" height="50" width="300"></td>
</tr>
<tr>
<td>Small-Description</td>
<td colspan="3"><?php echo $data->tech_small_desc; ?></td>
</tr>
<!-- <tr>
<td>Full-Description</td>
<td colspan="3"><?php echo $data->tech_full_desc; ?></td>
</tr> -->
</tbody>
</table>
</div>
</div>
</div>
</div>        
</div>
<?php  include '_footer.php'; ?>
<script type="text/javascript">
</script>
</body>
</html>