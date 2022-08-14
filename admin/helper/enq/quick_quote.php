<?php 
require_once("../../config/config.php");require_once("../../config/function.php");header("cache-control:no-cache");
if(empty($_SESSION['islogin'])){
	echo $response = json_encode(array(
			"status" =>false,
			"msg"	 => "Unauthorized Access"
	));
	die(); 
}
$operation =trim($_REQUEST['operation']);
if (empty($operation)){
	echo $response = json_encode(array(
			"status" => false,
			"msg"	 => "Something Wrong"
	));
	die();
}
if ($operation=="fetch"){
	$stmt = $PDO->prepare("SELECT * FROM quick_quote WHERE quote_status<>2 ORDER BY quote_id DESC");
	$stmt->execute(); 
	if($stmt->rowCount()>0){ ?>
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="entry_table">
	<thead>
	<tr>
	<th>#</th>
	<th>Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>Company Name</th>
	<th>Date</th>
	<th>&nbsp</th>
	</tr>
	</thead>
	<tbody> 
	<?php   
	$i=1;
	while ($row=$stmt->fetch()){
	extract($row);
	?>
	<tr>
	<td><?php echo $i++; ?></td>
	<td><?php echo $quote_name; ?></td>
	<td><?php echo $quote_email; ?></td>
	<td><?php echo $quote_phone; ?></td>
	<td><?php echo $quote_company_name; ?></td>
	<td><?php echo(date ("d-M-y h:i A",strtotime("$quote_date")));?></td>
	<td>
	<a href="" data-toggle="modal" data-target="#viewMod" data-id="<?php echo htmlspecialchars($quote_id); ?>" title="View More"><i class="fa fa-eye"></i></a> || 
	<a href="javascript:void(0);" class="statusup" title="Delete" data-id="<?php echo htmlspecialchars($quote_id); ?>" data-operation="delete"><i class="fa fa-trash"></i></a>
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
    </div>
	<?php }else{echo '<div class="alert alert-warning"><p>No Quotation Found</p></div>'; }
}
elseif ($operation=="viewmore") {
	$id    = (!empty($_POST['id']))?FilterInput($_POST['id']):null; 
	$stmt = $PDO->prepare("SELECT * FROM quick_quote WHERE quote_status<>2 AND quote_id='$id'");
	$stmt->execute(); 
	if($stmt->rowCount()!=1){
		echo '<h1>Not Found</h1>';
		die();
	}
	$det = $stmt->fetch();
	extract($det);
	$sighttxtemail = null;
	?>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tbody>
	  <tr>
	    <td>Name</td>
	    <td><?php echo $quote_name; ?></td>
	  </tr>
	  <tr>
	  	<td>Phone</td>
	    <td><?php echo $quote_phone; ?></td>
	  </tr>
	 <tr>
	    <td>Email</td>
	    <td><?php echo $quote_email; ?></td>
	  </tr>
	  <tr>
	  <td>Company Name</td>
	    <td><?php echo $quote_company_name; ?></td>
	  </tr>
	   <tr>
	    <td>Address</td>
	    <td colspan="3"><?php echo $quote_company_address; ?></td>
	  </tr>  
	   <tr>
	    <td>Requirements</td>
	    <td colspan="3"><?php echo $quote_req; ?></td>
	  </tr>
	    <tr>
	    <td>Document</td>
		<td><?php if(!empty($quote_doc)){
		echo '<a href="../assets/quote_doc/'.$quote_doc.'" target="/"><h6 style="color: #005bff; font-weight: 600;">VIEW</h6></a></td>'; } 
		else{echo'-NO DOC-';}
		?></td>
	  </tr>
	  <tr> 
	    <td>IP</td>
	    <td><?php echo $quote_ip; ?></td>
	  </tr> 
	</tbody>
	</table>
	</div>

<?php
}

elseif ($operation=="active" OR $operation=="deactive" OR $operation=="delete") {

	$id =FilterInput($_POST['id']);
	if(empty($id) AND !is_numeric($id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Something Wrong"
		));
		die();
	}
	switch ($operation) {
		case 'active':
			$up = 1;
			$msg="Successfully Activated";
			break;
		case 'deactive':
			$up = 0;
			$msg="Successfully Deactivated";
			break;
		case 'delete':
			$up = 2;
			$msg="Successfully Deleted";
			break;
		default:
			$up=1;
			$msg="Something Wrong";
			break;
	}
	$chk_id = CheckExists("quick_quote","quote_id = '$id' AND quote_status<>2");
	if (empty($chk_id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Cant Find this Entry"
		));
		die();
	}
	$ad = ($operation=='delete')?", quote_delete_at=NOW()":null;
	$sql = "UPDATE quick_quote SET quote_status = {$up} ".$ad. " WHERE quote_id= {$id}";
			$insert = $PDO->prepare($sql);
			$insert->execute();
			if($insert->rowCount() > 0){
					echo $response = json_encode(array(
					"status" => true, 
					"msg"	 => $msg
				));
			}else {
					echo $response = json_encode(array(
					"status" =>false,
					"msg"	 =>"No Change Done"
				));
			}
}
else {
	echo $response = json_encode(array(
			"status" => false,
			"msg"	 =>" Something Wrong"
	));
	die();
}