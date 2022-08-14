<?php 
require_once("../../config/config.php");require_once("../../config/function.php");header("cache-control:no-cache");
if(empty($_SESSION['islogin'])){
	echo $response = json_encode(array(
			"status" =>false,
			"msg"	 => "Unauthorized Access"
	));
	die(); 
}
$operation  = (!empty($_POST['operation']))?FilterInput($_POST['operation']):null; 
if (empty($operation)){
	echo $response = json_encode(array(
			"status" => false,
			"msg"	 => "Something Wrong"
	));
	die();
}
elseif ($operation=="fetchGal"){

	$id = (!empty($_POST['acmrid']))?FilterInput($_POST['acmrid']):null; 
	if(empty($id) OR !(filter_var($id,FILTER_VALIDATE_INT))) {
		echo '<div class="alert alert-warning"><p>No Data Found</p></div>';
		die();
	}
	$data = CheckExists("com_service","com_id ='$id' AND com_status<>2");
	if (empty($data)) {
		echo '<div class="alert alert-warning"><p>No Data Found</p></div>';
		die();
	}
	$stmt = $PDO->prepare("SELECT * FROM com_gallery WHERE cg_com_id_ref='$id' AND cg_img_status<>2 ORDER BY cg_img_order ASC");
	$stmt->execute(); 
	if($stmt->rowCount()>0){ ?>
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="entry_table_thumb">
	<thead>
	<tr>
	<th>#</th>
	<th>LG</th>
	<th>MD</th>
	<th>NAME</th>
	<th>ALT</th>
	<th>STATUS</th>
	<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody> 
	<?php   
	$i=1;
	while ($row=$stmt->fetch()){
	extract($row);	?> 
	<tr id="<?php echo $cg_id; ?>">
	<td><?php echo $i++; ?></td>
	<td><img height="30" src="../assets/images/com_services/images/<?php echo $cg_img_lg;  ?>"></td>
	<td><img height="30" src="../assets/images/com_services/images/<?php echo $cg_img_md;  ?>"></td>
	<td><?php echo $cg_img_name; ?></td>
	<td><?php echo $cg_img_alt; ?></td>
	<td><?php echo StatusReport($cg_img_status);  ?></td>
	<td>
	<?php  
	if ($cg_img_status==0) { ?> 
	<a href="javascript:void(0);" title="Make Active" class="text-success statusup" data-id="<?php echo htmlspecialchars($cg_id); ?>" data-operation="activethumb"><i class="fa fa-check"></i></a> ||
	<?php }else if($cg_img_status==1) { ?>
	<a href="javascript:void(0);" title="Make Dective" class="text-danger statusup" data-id="<?php echo $cg_id; ?>" data-operation="deactivethumb"><i class="fa fa-lock"></i></a> ||
	<?php } ?>
	<a href="" data-toggle="modal" data-target="#upThumb" data-id="<?php echo htmlspecialchars($cg_id); ?>" data-name="<?php echo htmlspecialchars($cg_img_name); ?>" data-alt="<?php echo htmlspecialchars($cg_img_alt); ?>" class="editbtn" title="Update"><i class="fa fa-edit"></i></a> ||
	<a href="javascript:void(0);" class="statusup" title="Delete" data-id="<?php echo htmlspecialchars($cg_id); ?>" data-operation="deletethumb"><i class="fa fa-trash"></i></a> 
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
    </div>
	<?php }else{echo '<div class="alert alert-warning"><p>No Commercial Service Found</p></div>'; }
}
elseif ($operation=="addGal") {
	$id        = (!empty($_POST['id']))?FilterInput($_POST['id']):null; 
	$imgname   = (!empty($_POST['thumbimgname']))?FilterInput($_POST['thumbimgname']):NULL; 
	$imgalt    = (!empty($_POST['thumbimgalt']))?FilterInput($_POST['thumbimgalt']):NULL; 
	if(empty($id) OR !(filter_var($id,FILTER_VALIDATE_INT))) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "No data Found"
		));
		die();
	}
	$data = CheckExists("com_service","com_id ='$id' AND com_status<>2");
	if (empty($data)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "No data Found"
		));
		die();
	}
	if(empty($_FILES['image']['name'])){
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Select a Image"
		));
		die();
	} 
	
	$valid_ext   = array('jpeg', 'jpg'); 
	$MimeFilter  = array('image/jpeg', 'image/jpg');
	$MaxSize     = 5 * 1024 * 1024;

	$FileName    = FilterInput($_FILES['image']['name']);
	$tmpName     = $_FILES['image']['tmp_name'];
	$FileTyp     = $_FILES['image']['type'];
	$FileSize    = $_FILES['image']['size']; 
	$MimeType    = mime_content_type($_FILES['image']['tmp_name']);

	$ext         = strtolower(pathinfo($FileName, PATHINFO_EXTENSION));
	if(!in_array($ext, $valid_ext)) {
		echo $response = json_encode(array(
			"status" =>false, 
			"msg"	 =>"File Extention Not Allowed"
		));
		die();
	}
	if($FileSize>$MaxSize){
		echo $response = json_encode(array(
			"status" =>false, 
			"msg"	 =>"Max file Size: 5MB"
		));
		die();
	}
	if($FileTyp!='image/jpeg' && $FileTyp!='image/jpg'){
		echo $response = json_encode(array(
			"status" =>false, 
			"msg"	 =>"Image Type Shoud be JPG OR JPEG"
		));
		die();
	}
	if(!in_array($MimeType, $MimeFilter)) {
		echo $response = json_encode(array(
			"status" =>false, 
			"msg"	 =>"File Not Supported"
		));
		die();
	}

	$dir          = "../../../assets/images/com_services/images/";

	$filename_lg  = FileName(!empty($imgalt)?$imgalt:$data->com_name).'_'.time().rand(10000,9999999).'_lg'.'.'.$ext;
	$width        = 400;
	$height       = 485;
	$img_file_lg  = ImageProperResize($height,$width,$dir,$filename_lg,$_FILES["image"]["tmp_name"]);

	$filename_md  = FileName(!empty($imgalt)?$imgalt:$data->com_name).'_'.time().rand(10000,9999999).'_md'.'.'.$ext;
	$width        = 300;
	$height       = 385;
	$img_file_md  = ImageProperResize($height,$width,$dir,$filename_md,$_FILES["image"]["tmp_name"]);

	if(empty($img_file_lg) OR empty($img_file_md)){
		echo $response = json_encode(array(
			"status" =>false, 
			"msg"	 =>"Something wrong While Uploading"
		));
		die();
	}
	$sql = "INSERT INTO com_gallery SET
		        cg_com_id_ref    = :cg_com_id_ref,
		        cg_img_lg        = :cg_img_lg,
		        cg_img_md        = :cg_img_md,
		        cg_img_name      = :cg_img_name,
		        cg_img_alt       = :cg_img_alt,
		        cg_update_at     = :cg_update_at,
		        cg_create_at     = :cg_create_at";
		        $insert   = $PDO->prepare($sql);;
		        $insert->bindParam(':cg_com_id_ref',$data['com_id']);
		        $insert->bindParam(':cg_img_lg',$filename_lg);
		        $insert->bindParam(':cg_img_md',$img_file_md);
		        $insert->bindParam(':cg_img_name',$imgname);
		        $insert->bindParam(':cg_img_alt',$imgalt);
		        $insert->bindParam(':cg_update_at',$nowTime);
		        $insert->bindParam(':cg_create_at',$nowTime);
		        $insert->execute();
		        if($insert->rowCount() > 0){
		        	echo $response = json_encode(array(
						"status" => true, 
						"msg"	 => "Successfully Added"
					));
		        }else {
		        	echo $response = json_encode(array(
						"status" =>false,
						"msg"	 =>"No Changes Done"
					));
				}
}
elseif ($operation=="upGal"){
	$uptid     = (!empty($_POST['uptid']))?FilterInput($_POST['uptid']):null; 
	$entry_id  = (!empty($_POST['id']))?FilterInput($_POST['id']):null; 
	$imgname   = (!empty($_POST['upthumbimgname']))?FilterInput($_POST['upthumbimgname']):NULL; 
	$imgalt    = (!empty($_POST['upthumbimgalt']))?FilterInput($_POST['upthumbimgalt']):NULL; 
	if(empty($uptid) OR empty($entry_id) OR !(filter_var($uptid,FILTER_VALIDATE_INT)) OR !(filter_var($entry_id,FILTER_VALIDATE_INT))) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "No data Found"
		));
		die();
	}
	$acm_chk = CheckExists("com_service","com_id ='$entry_id' AND com_status<>2");
	if (empty($acm_chk)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "No Room Found"
		));
		die();
	}
	$data = CheckExists("com_gallery","cg_id ='$uptid' AND cg_img_status<>2");
	if (empty($data)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "No data Found"
		));
		die();
	}
	$img_file_lg = $data['cg_img_lg'];
	$img_file_md = $data['cg_img_md'];
	if(!empty($_FILES['image']['name'])){

		$valid_ext   = array('jpeg', 'jpg'); 
		$MimeFilter  = array('image/jpeg', 'image/jpg');
		$MaxSize     = 5 * 1024 * 1024;

		$FileName    = FilterInput($_FILES['image']['name']);
		$tmpName     = $_FILES['image']['tmp_name'];
		$FileTyp     = $_FILES['image']['type'];
		$FileSize    = $_FILES['image']['size']; 
		$MimeType    = mime_content_type($_FILES['image']['tmp_name']);

		$ext         = strtolower(pathinfo($FileName, PATHINFO_EXTENSION));
		if(!in_array($ext, $valid_ext)) {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"File Extention Not Allowed"
			));
			die();
		}
		if($FileSize>$MaxSize){
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Max file Size: 10MB"
			));
			die();
		}
		if($FileTyp!='image/jpeg' && $FileTyp!='image/jpg'){
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Image Type Shoud be JPG OR JPEG"
			));
			die();
		}
		if(!in_array($MimeType, $MimeFilter)) {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"File Not Supported"
			));
			die();
		}
		$dir          = "../../../assets/images/com_services/images/";

		$filename_lg  = FileName(!empty($imgalt)?$imgalt:$acm_chk->com_name).'_'.time().rand(10000,9999999).'_lg'.'.'.$ext;
		$width        = 400;
		$height       = 485;
		$img_file_lg  = ImageProperResize($height,$width,$dir,$filename_lg,$_FILES["image"]["tmp_name"]);

		$filename_md  = FileName(!empty($imgalt)?$imgalt:$acm_chk->com_name).'_'.time().rand(10000,9999999).'_md'.'.'.$ext;
		$width        = 300;
		$height       = 385;
		$img_file_md  = ImageProperResize($height,$width,$dir,$filename_md,$_FILES["image"]["tmp_name"]);

		if(empty($img_file_lg) OR empty($img_file_md)){
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Something wrong While Uploading"
			));
			die();
		}
		if (!empty($data->cg_img_lg) AND file_exists("../../../assets/images/com_services/images/".$data->cg_img_lg)){
			@unlink("../../../assets/images/com_services/images/".$data->cg_img_lg);
		}
		if (!empty($data->cg_img_md) AND file_exists("../../../assets/images/com_services/images/".$data->cg_img_md)){
			@unlink("../../../assets/images/com_services/images/".$data->cg_img_md);
		}
	}
	$sql = "UPDATE com_gallery SET
	        cg_img_lg     = :cg_img_lg,
	        cg_img_md     = :cg_img_md,
	        cg_img_name   = :cg_img_name,
	        cg_img_alt    = :cg_img_alt,
	        cg_update_at  = :cg_update_at
	        WHERE cg_id = :cg_id";
	        $insert   = $PDO->prepare($sql);;
	        $insert->bindParam(':cg_img_lg',$img_file_lg);
	        $insert->bindParam(':cg_img_md',$img_file_md);
	        $insert->bindParam(':cg_img_name',$imgname);
	        $insert->bindParam(':cg_img_alt',$imgalt);
	        $insert->bindParam(':cg_update_at',$nowTime);
	        $insert->bindParam(':cg_id',$uptid);
	        $insert->execute();
	        if($insert->rowCount() > 0){
	        	echo $response = json_encode(array(
					"status" => true, 
					"msg"	 => "Successfully Updated"
				));
	        }else {
	        	echo $response = json_encode(array(
					"status" =>false,
					"msg"	 =>"No Changes Done"
				));
			}
}
elseif ($operation=="activethumb" OR $operation=="deactivethumb" OR $operation=="deletethumb") {


	$id = (!empty($_POST['id']))?FilterInput($_POST['id']):null; 
	if(empty($id) OR !(filter_var($id,FILTER_VALIDATE_INT))) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Something Wrong"
		));
		die();
	}
	switch ($operation) {
		case 'activethumb':
			$up = 1;
			$msg="Successfully Activated";
			break;
		case 'deactivethumb':
			$up = 0;
			$msg="Successfully Deactivated";
			break;
		case 'deletethumb':
			$up = 2;
			$msg="Successfully Deleted";
			break;
		default:
			$up=1;
			$msg="Something Wrong";
			break;
	}
	$chk_id = CheckExists("com_gallery","cg_id = '$id' AND cg_img_status<>2");
	if (empty($chk_id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Cant Find this Image"
		));
		die();
	}
	$ad  = ($operation=='deletethumb')?", cg_delete_at='$nowTime'":null;
	$sql = "UPDATE com_gallery SET cg_img_status = {$up} ".$ad. " WHERE cg_id = '$id'";
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
elseif ($operation=="orderThumb") {
	$res  = (!empty($_POST['data']))?$_POST['data']:null;
	if (empty($res)) {
		echo $response = json_encode(array(
			"status" => false, 
			"msg"	 => "No Changes Done"
		));   
		die();
	}
	$i=1;
	foreach ($res as $value) {
	    $sql = "UPDATE com_gallery SET
		            cg_img_order ='$i'
		            WHERE cg_id ='$value'";
		            $update = $PDO->prepare($sql);
			        $update->execute();
		$i++;
	}
	echo $response = json_encode(array(
			"status" => true, 
			"msg"	 => "Success"
	));   
	die();
}