<?php
function CheckExists($table_name,$Where_contion){
	global $PDO;$rowdet=null;
	$where = (!empty($Where_contion)?"WHERE ".$Where_contion :null); 
	$stmt  = "SELECT * FROM $table_name ".$where;
	$res   = $PDO->prepare($stmt);
	$res->execute();
	if($res->rowCount()>0){
		$rowdet=$res->fetch();
	}
	return $rowdet;
}
 
function SocialInfo(){
	global $PDO;$rowdet=null;
	$rowdet =null;
	$stmt  = "SELECT * FROM socials WHERE social_id=1";
	$res   = $PDO->prepare($stmt);
	$res->execute();
	if($res->rowCount()>0){
		$rowdet=$res->fetch(PDO::FETCH_OBJ);
	}
	return $rowdet;
}

function VehicalList($id){
	$html = null;
	switch($id){
		case 1: $html = 'WagnoR/Indica/Alto';break;
		case 2: $html = 'Swift Dzire/Indigo';break;
		case 3: $html = 'Sumo/Bolero/Maxx';break;
		case 4: $html = 'Innova/Xylo';break;
	}
	return $html;
}

function gettotalCar($x,$y){
    $req=null;
    switch ($y) {
    	case '1':
    		$req = ceil($x/4);
    		break;
    	case '2':
    		$req = ceil($x/4);
    		break;
    	case '3':
    		$req = ceil($x/8);
    		break;
    	case '4':
    		$req = ceil($x/7);
    		break;
    }
    return $req;
}


function LocationParentDetails($locid){
	global $PDO;$row=null;
	if (empty($locid) OR !is_numeric($locid)) {
		return null;
		die();
	}
	$str = "SELECT * FROM locations WHERE loc_id={$locid}";
	$res = $PDO->prepare($str);
	$res->execute();
	if($res->rowCount()>0){
		$row=$res->fetch();
	}
	return $row;
} 
function LocationName($locid){
	global $PDO;$name=null;
	if (empty($locid) OR !is_numeric($locid)) {
		return null;
		die();
	}
	$str = "SELECT * FROM locations WHERE loc_id={$locid}";
	$res = $PDO->prepare($str);
	$res->execute();
	if($res->rowCount()>0){
		$row  = $res->fetch();
		$name = $row['loc_name']; 
	}
	return $name;
}
function ServiceList($id){
	$html = null;
	switch($id){
		case 1: $html = 'One Way Transfer';break;
		case 2: $html = 'Return Only';break;
		case 3: $html = 'Tour Package';break;
	}
	return $html;
}
function MemberDetails($memid){
	global $PDO;$memberdet=null;
	$str = "SELECT * FROM `admin` WHERE member_id={$memid}";
	$res = $PDO->prepare($str);
	$res->execute();
	if($res->rowCount()>0){
		$row=$res->fetch();
	}
	return $row;
}

function MemberAvtar($memid){
	global $PDO;$img=null;
	$str = "SELECT * FROM `admin` WHERE member_id={$memid}";
	$res = $PDO->prepare($str);
	$res->execute();
	if($res->rowCount()>0){
		$row=$res->fetch();
		extract($row);
		if(empty($member_avtar)){
            if ($member_gender=='Male') {
				$img="assets/img/icon/muser.png";
			}elseif ($member_gender=='Feale') {
				$img="assets/img/icon/fuser.png";
			}else{
				$img="assets/img/icon/default.png";
			}
		}
		else {
			if(file_exists("../assets/img/icon/".$member_avtar)) {
				$img="assets/img/icon/".$member_avtar;
			}
			elseif ($member_gender=='Male') {
				$img="assets/img/icon/muser.png";
			}
			elseif ($member_gender=='Feale') {
				$img="assets/img/icon/fuser.png";
			}
			else{
				$img="assets/img/icon/default.png";
			}
		}
	}
	return $img;
}

function StatusReport($id){
	switch ($id) {
		case '0':
			$msg="<i class='fa fa-times' style='color:red;'></i>";
			break;
		case '1':
			$msg="<i class='fa fa-check-circle' style='color:green;'></i>";
			break;
		default:
			$msg="-";
			break;
	}
	return $msg;
}

function FilterInput($input){
	$input = strip_tags(stripslashes(trim($input)));
	return $input;
}
function ImageProperResize($height,$width,$dir,$name,$imgfile,$quality=0){

	$image_info                     = getimagesize($imgfile);
	list($width_orig, $height_orig) = getimagesize($imgfile);

	$ratio       = max($width/$width_orig, $height/$height_orig);
	$height_orig = ceil($height / $ratio);
	$x           = ($width_orig - $width / $ratio) / 2;
	$width_orig  = ceil($width / $ratio);

	$fullpath    = $dir.$name;

	$imgString   = file_get_contents($imgfile);
	$image       = imagecreatefromstring($imgString);
	$tmp         = imagecreatetruecolor($width, $height);
	switch ($image_info['mime'])
	{
	    case 'image/jpeg':
	        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	        $r = @imagejpeg($tmp,$fullpath,60);
	        break;
	    case 'image/png':
	    	$srcimage = imagecreatefrompng($imgfile);
		    $img      = imagecreatetruecolor($width, $height);
		    $bga      = imagecolorallocatealpha($img, 0, 0, 0, 127);
		    imagecolortransparent($img, $bga);
		    imagefill($img,0,0,$bga);
		    imagetruecolortopalette($img, false, 255);
		    imagealphablending($img, FALSE);
		    imagesavealpha($img, TRUE);
		    imagecopyresampled($img, $srcimage, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		    $r = @imagepng($img, $fullpath,9.9);
		    imagedestroy($srcimage);
			imagedestroy($img);
	        break;
	    case 'image/gif':
	        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	        $background = imagecolorallocate($tmp, 0, 0, 0); 
	        imagecolortransparent($tmp, $background);
	        $r = @imagegif($tmp,$fullpath);
	        break;
	    default:
			exit;
			break;
	}
	chmod($fullpath,0644);
	return $name;
	imagedestroy($image);
	imagedestroy($tmp);
	die();

}

function resize($width,$height,$dir,$name){
	  list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	  $ratio = max($width/$w, $height/$h);
	  $h = ceil($height / $ratio);
	  $x = ($w - $width / $ratio) / 2;
	  $w = ceil($width / $ratio);
	  $path = $dir.$name;
	  $imgString = file_get_contents($_FILES['image']['tmp_name']);
	  $image     = imagecreatefromstring($imgString);
	  $tmp       = imagecreatetruecolor($width, $height);
	  imagecopyresampled($tmp, $image,
	    0, 0,
	    $x, 0,
	    $width, $height,
	    $w, $h);
	  switch ($_FILES['image']['type']) {
	    case 'image/jpeg':
		      imagejpeg($tmp, $path, 100);
		      break;
	    case 'image/png':
		      imagepng($tmp, $path, 0);
		      break;
	    case 'image/gif':
		      imagegif($tmp, $path);
		      break;
	    default:
		      exit;
		      break;
	  }
	  chmod($path,0644);
	  return $name;
	  imagedestroy($image);
	  imagedestroy($tmp);
} 

function Saluation($id){
	switch($id){
		case 1: $html  = 'Mr';break;
		case 2: $html  = 'Ms';break;
		case 3: $html  = 'Dr';break;
		default: $html = null;break;
	}
	return $html;
}
function FileName($original){
    $slug = str_replace(" ", "_", $original);
    $slug = preg_replace('/[^\w\d\-\_]/i', '', $slug);
    return strtolower($slug);
}