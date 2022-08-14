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
  
  
if ($operation=="fetchPro"){
	$stmt = $PDO->prepare("SELECT * FROM com_service WHERE com_status<>2 ORDER BY com_id ASC");
	$stmt->execute(); 
	if($stmt->rowCount()>0){ ?>
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="entry_table_room">
	<thead>
	<tr>
	<th>#</th>
	<th>NAME</th>
	<th>BANNER</th>
	<th>STATUS</th>
	<th>ACTIONS</th>
	</tr>
	</thead>
	<tbody> 
	<?php   
	$i=1;
	while ($row=$stmt->fetch()){
	extract($row);	?> 
	<tr id="<?php echo $com_id; ?>">
	<td><?php echo $i++; ?></td>
	<td><a href="commercial-brief?id=<?php echo $com_id; ?>" title="View" class="text-info"><?php echo $com_name; ?></a></td>
	<td><img src = "../assets/images/com_services/banner/<?php echo $com_banner; ?>" height = "30"></td>
	<td><?php echo StatusReport($com_status);  ?></td>
	<td>
	<a href="commercial-brief?id=<?php echo $com_id; ?>" title="View" class="text-info"><i class="fa fa-eye"></i></a> ||
	<?php  
    if ($com_status==0) { ?>
    <a href="javascript:void(0);" title="Make Active" class="text-success statusup" data-id="<?php echo htmlspecialchars($com_id); ?>" data-operation="activeroom"><i class="fa fa-check"></i> || </a>
    <?php }else if($com_status==1) { ?>
    <a href="javascript:void(0);" title="Make Dective" class="text-danger statusup" data-id="<?php echo $com_id; ?>" data-operation="deactiveroom"><i class="fa fa-lock"></i> || </a>
    <?php } ?>
	<a href="commercial_update?id=<?php echo htmlspecialchars($com_id); ?>" class="editbtn" title="Update"><i class="fa fa-edit"></i></a> || 
	<a href="javascript:void(0);" class="statusup" title="Delete" data-id="<?php echo htmlspecialchars($com_id); ?>" data-operation="deleteroom"><i class="fa fa-trash"></i></a>
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
    </div>
	<?php }else{echo '<div class="alert alert-warning"><p>No Data Found</p></div>'; }
}
elseif ($operation=="addPro") {
	$proname      = (!empty($_POST['proname']))?FilterInput($_POST['proname']):null; 
	$prourl       = (!empty($_POST['prourl']))?FilterInput($_POST['prourl']):null;  

	if(empty($proname) OR empty($prourl)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Field is Empty"
		));
		die();
	} 

		$chk_slug = CheckExists("com_service","(com_slug = '$prourl' OR com_name = '$proname') AND com_status<>2");
	if (!empty($chk_slug)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "This Tech Service Name Already Exists"
		));
		die();
	}
	
	$sql = "INSERT INTO com_service SET
	        com_name               = :com_name,
	        com_slug               = :com_slug";
	        $insert = $PDO->prepare($sql);
	        $insert->bindParam(':com_name',$proname);
	        $insert->bindParam(':com_slug',$prourl);
	        $insert->execute();
	        if($insert->rowCount() > 0){
	        	echo $response = json_encode(array(
					"status" => true, 
					"msg"	 => "Successfully Added"
				));
	        }else {
	        	echo $response = json_encode(array(
					"status" =>false,
					"msg"	 =>"Something Wrong"
				));
			}
}

elseif ($operation=="updateRoom") {

	$acmrid        = (!empty($_POST['acmrid']))?FilterInput($_POST['acmrid']):null; 
	$roomurl       = (!empty($_POST['roomurl']))?FilterInput($_POST['roomurl']):null;
	$roomname      = (!empty($_POST['roomname']))?FilterInput($_POST['roomname']):null; 
	$smalldesc     = (!empty($_POST['smalldesc']))?$_POST['smalldesc']:NULL;
	$fulldesc      = (!empty($_POST['fulldesc']))?$_POST['fulldesc']:NULL;

	if(empty($acmrid) OR empty($roomname) OR empty($roomurl)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Field is Empty"
		));
		die();
	} 

	$pro_det = CheckExists("com_service","com_id = '$acmrid' AND com_status<>2");
	if (empty($pro_det)) {
		echo $response = json_encode(array(
					"status" => false,
					"msg"	 => "Tech Service Not Found"
		));
		die();
	}


	$thumb = $pro_det['com_img'];
	if(!empty($_FILES['timage']['name'])){

		$valid_ext   = array('jpeg', 'jpg'); 
		$MimeFilter  = array('image/jpeg', 'image/jpg');
		$MaxSize     = 5 * 1024 * 1024;
		$FileName    = FilterInput($_FILES['timage']['name']);
		$tmpName     = $_FILES['timage']['tmp_name'];
		$FileTyp     = $_FILES['timage']['type'];
		$FileSize    = $_FILES['timage']['size']; 
		$MimeType    = mime_content_type($_FILES['timage']['tmp_name']);

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
		$dir          = "../../../assets/images/com_services/img/";
		$thumb        = FileName($roomname).'_'.time().rand(10000,999999).'.'.$ext;
		$width        = 400;
	    $height       = 485;
		$img_file_fu  = ImageProperResize($height,$width,$dir,$thumb,$_FILES["timage"]["tmp_name"]);

		if (!empty($pro_det->com_img) AND file_exists("../../../assets/images/com_services/img/".$pro_det->com_img)){
			@unlink("../../../assets/images/com_services/img/".$pro_det->com_img);
		}
	}
		$coverimg = $pro_det['com_banner'];
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
		$dir          = "../../../assets/images/com_services/banner/";
		$coverimg        = FileName($roomname).'_'.time().rand(10000,999999).'.'.$ext;
		$width        = 1350;
	    $height       = 250;
		$img_file_fu  = ImageProperResize($height,$width,$dir,$coverimg,$_FILES["image"]["tmp_name"]);

		if (!empty($pro_det->room_banner) AND file_exists("../../../assets/images/com_services/banner/".$pro_det->com_banner)){
			@unlink("../../../assets/images/com_services/banner/".$pro_det->com_banner);
		}
	}
	$sql = "UPDATE com_service SET
	        com_name           = :com_name,
	        com_slug           = :com_slug,
	        com_img            = :com_img,
	        com_banner         = :com_banner,
	        com_small_desc     = :com_small_desc,
	        com_full_desc      = :com_full_desc
	        WHERE com_id=:com_id";
	        $insert = $PDO->prepare($sql);
	        $insert->bindParam(':com_name',$roomname);
	        $insert->bindParam(':com_slug',$roomurl);
	        $insert->bindParam(':com_img',$thumb);
	        $insert->bindParam(':com_banner',$coverimg);
	        $insert->bindParam(':com_small_desc',$smalldesc);
	        $insert->bindParam(':com_full_desc',$fulldesc);
	        $insert->bindParam(':com_id',$acmrid);
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

elseif ($operation=="activeroom" OR $operation=="deactiveroom" OR $operation=="deleteroom") {


	$id = (!empty($_POST['id']))?FilterInput($_POST['id']):null; 
	if(empty($id) AND !is_numeric($id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Something Wrong"
		));
		die();
	}
	switch ($operation) {
		case 'activeroom':
			$up = 1;
			$msg="Successfully Activated";
			break;
		case 'deactiveroom':
			$up = 0;
			$msg="Successfully Deactivated";
			break;
		case 'deleteroom':
			$up = 2;
			$msg="Successfully Deleted";
			break;
		default:
			$up=1;
			$msg="Something Wrong";
			break;
	}
	$chk_id = CheckExists("com_service","com_id = '$id' AND com_status<>2");
	if (empty($chk_id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Cant Find this Entry"
		));
		die();
	}
	if($operation=="deletepro"){
		$sql = "UPDATE  com_service SET com_status = 2 , com_delete_at='$nowTime' WHERE com_id = '$id'";
		$insert = $PDO->prepare($sql);
		$insert->execute();
	}
	$ad  = ($operation=='deletepro')?", com_delete_at='$nowTime'":null;
	$sql = "UPDATE  com_service SET com_status= {$up} ".$ad. " WHERE com_id= '$id'";
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
