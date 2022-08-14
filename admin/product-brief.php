<?php include '_auth.php'; ?>
<?php
$id=FilterInput($_GET['id']);
if(!is_numeric($id)){include '404.php';die();}
$stmt = $PDO->prepare("SELECT * FROM product WHERE pro_id='$id' AND pro_status<>2");
$stmt->execute(); 
$data = $stmt->fetch(PDO::FETCH_OBJ);
if(empty($data)){include '404.php';die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Product Type Details</title>
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
<h5>Product Type - <?= $data->pro_name; ?> <a href="products" class="button x-small pull-right"><i class="fa fa-long-arrow-left"></i> Back</a> <a href="product-update?id=<?php echo $id; ?>" class="button x-small pull-right mx-2"><i class="fa fa-pencil"></i> Update</a></h5></div>
<div class="card-body">
<ul class="nav nav-tabs thmnavtab">
<li class="nav-item"><a class="nav-link active" href="product-brief?id=<?= $data->pro_id; ?>">Brief Info</a></li>
<li class="nav-item"><a class="nav-link" href="products-gallery?id=<?= $data->pro_id; ?>">Products</a></li>
</ul>
<div class="table-responsive">          
<table class="table table-hover table-bordered text-left">
<tbody>
<tr>
<td>NAME</td>
<td><?php echo $data->pro_name; ?></td>
</tr>
<tr>
<td>BANNER</td>
<td><img src="../assets/images/products/banner/<?php echo $data->pro_banner; ?>" height="50" width="300"></td>
</tr>
<tr>
<td>Small-Description</td>
<td colspan="3"><?php echo $data->pro_small_desc; ?></td>
</tr>
<!-- <tr>
<td>Full-Description</td>
<td colspan="3"><?php echo $data->pro_full_desc; ?></td>
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