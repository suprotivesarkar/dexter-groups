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
	$stmt = $PDO->prepare("SELECT * FROM about WHERE abo_status<>2 ORDER BY abo_id DESC");
	$stmt->execute(); 
	if($stmt->rowCount()>0){ ?>
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="entry_table">
	<thead>
	<tr>
	<th>#</th>
	<th>ICON</th>
	<th>HEADING</th>
	<th>STATUS</th>
	<th>ACTION</th>
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
	<td>
	<?php
	if((!empty($abo_img)) AND file_exists("../../../assets/images/about/".$abo_img)) {
		echo '<img src="../assets/images/about/'.$abo_img.'" height="20">';
	}else{
		echo '<img src="../assets/images/about/user.png" height="20">';
	}
	?>		
	</td>
	<td><?php echo $abo_name; ?></td>
	<td><?php echo StatusReport($abo_status);  ?></td>
	<td>
	<?php  
    if ($abo_status==0) { ?>
    <a href="javascript:void(0);" title="Make Active" class="text-success statusup" data-id="<?php echo htmlspecialchars($abo_id); ?>" data-operation="active"><i class="fa fa-check"></i> || </a>
    <?php }else if($abo_status==1) { ?>
    <a href="javascript:void(0);" title="Make Dective" class="text-danger statusup" data-id="<?php echo $row['abo_id']; ?>" data-operation="deactive"><i class="fa fa-lock"></i> || </a>
    <?php } ?>
	<a href="" data-toggle="modal" data-target="#upMod" data-id="<?php echo htmlspecialchars($abo_id); ?>" data-name="<?php echo htmlspecialchars($abo_name); ?>" data-txt="<?php echo htmlspecialchars($abo_text); ?>"><i class="fa fa-edit"> || </i></a> ||  
	<a href="javascript:void(0);" class="statusup" title="Delete" data-id="<?php echo htmlspecialchars($abo_id); ?>" data-operation="delete"><i class="fa fa-trash"></i></a>
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
    </div>
	<?php }else{echo '<div class="alert alert-warning"><p>No Data Found</p></div>'; }
}
elseif ($operation=="addnew") {
	$name     = (!empty($_POST['name']))?FilterInput($_POST['name']):null; 
	$msg      = (!empty($_POST['msg']))?FilterInput($_POST['msg']):null; 
	if(empty($name)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Enter Name"
		));
		die();
	}
	if(empty($msg)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Enter Message"
		));
		die();
	}
	$img_thumb=NULL;
	if(!empty($_FILES['image']['name'])){
		$valid_ext = array('jpeg', 'jpg', 'png'); 
		$maxsize   = 2 * 1024 * 1024;

		$imgFile  = stripslashes($_FILES['image']['name']);
		$tmpName  = $_FILES['image']['tmp_name'];
		$imgType  = $_FILES['image']['type'];
		$imgSize  = $_FILES['image']['size'];

		$ext = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
		if($imgType!='image/jpeg' && $imgType!='image/jpg' && $imgType!='image/png') {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Image Type Shoud be JPG OR PNG OR JPEG"
			));
			die();
		}
		if ($imgSize>$maxsize) {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Max file Size: 2MB"
			));
			die();
		}
		if(!in_array($ext, $valid_ext)) {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Image Extention Should be jpg or png or jpeg"
			));
			die();
		}
		$width=50;$height=50;
		$dir="../../../assets/images/about/"; 
		$img_thumb = FileName($name).'_'.time().rand(10000,999999999).'.'.$ext;
		$img_file  = resize($width,$height,$dir,$img_thumb);
	}

	$sql = "INSERT INTO about SET
	        abo_name   = :abo_name,
	        abo_text    = :abo_text,
	        abo_img    = :abo_img";
	        $insert = $PDO->prepare($sql);
	        $insert->bindParam(':abo_name',$name);
	        $insert->bindParam(':abo_text',$msg);
	        $insert->bindParam(':abo_img',$img_thumb);
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
elseif($operation=="update") {
	$uptid    = (!empty($_POST['uptid']))?FilterInput($_POST['uptid']):null; 
    $upname   = (!empty($_POST['upname']))?FilterInput($_POST['upname']):null; 
	$upmsg    = (!empty($_POST['upmsg']))?FilterInput($_POST['upmsg']):null; 

	if(empty($uptid) OR empty($upname) OR empty($upmsg)){
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Fields is Empty"
		));
		die();
	}
	$chk_id = CheckExists("about","abo_id = '$uptid' AND abo_status<>2");
	if (empty($chk_id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Cant Find this Entry"
		));
		die();
	}
	
	$img_thumb=$chk_id['abo_img'];
	if(!empty($_FILES['image']['name'])){
		$valid_ext = array('jpeg', 'jpg', 'png'); 
		$maxsize   = 2 * 1024 * 1024;

		$imgFile  = stripslashes($_FILES['image']['name']);
		$tmpName  = $_FILES['image']['tmp_name'];
		$imgType  = $_FILES['image']['type'];
		$imgSize  = $_FILES['image']['size'];

		$ext = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
		if($imgType!='image/jpeg' && $imgType!='image/jpg' && $imgType!='image/png') {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Image Type Shoud be JPG OR PNG OR JPEG"
			));
			die();
		}
		if ($imgSize>$maxsize) {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Max file Size: 2MB"
			));
			die();
		}
		if(!in_array($ext, $valid_ext)) {
			echo $response = json_encode(array(
				"status" =>false, 
				"msg"	 =>"Image Extention Should be jpg or png or jpeg"
			));
			die();
		}
		$width=50;$height=50;
		$dir="../../../assets/images/about/"; 
		$img_thumb = FileName($upname).'_'.time().rand(10000,999999999).'.'.$ext;
		$img_file  = resize($width,$height,$dir,$img_thumb);
		if ((!empty($chk_id->abo_img)) AND file_exists("../../../assets/images/about/".$chk_id->abo_img)) {
			@unlink("../../../assets/images/about/".$chk_id->abo_img);
		}
	}

	$sql = "UPDATE about SET
	            abo_name     = :abo_name,
		        abo_text      = :abo_text,
		        abo_img      = :abo_img
	            WHERE abo_id=:abo_id";
	            $insert = $PDO->prepare($sql);
	            $insert->bindParam(':abo_name',$upname);
		        $insert->bindParam(':abo_text',$upmsg);
		        $insert->bindParam(':abo_img',$img_thumb);
	            $insert->bindParam(':abo_id',$uptid);
		        $insert->execute();
	            if($insert->rowCount() > 0){
	            	echo $response = json_encode(array(
						"status" =>true, 
						"msg"	 => "Successfully Updated"
					));
	            }else {
	            	echo $response = json_encode(array(
						"status" =>false,
						"msg"	 =>"No Change Done"
					));
	   			}
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
	$chk_id = CheckExists("about","abo_id = '$id' AND abo_status<>2");
	if (empty($chk_id)) {
		echo $response = json_encode(array(
				"status" => false,
				"msg"	 => "Cant Find this Entry"
		));
		die();
	}
	$ad = ($operation=='delete')?", abo_delete_at=NOW()":null;
	$sql = "UPDATE about SET abo_status= {$up} ".$ad. " WHERE abo_id= {$id}";
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