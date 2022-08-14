<?php require_once("_top.php");
$name     = (!empty($_POST['name']))?FilterInput(strval($_POST['name'])):null; 
$emailid  = (!empty($_POST['emailid']))?FilterInput(strval($_POST['emailid'])):null;
$phone    = (!empty($_POST['phone']))?FilterInput(strval($_POST['phone'])):null; 
$comname  = (!empty($_POST['comname']))?FilterInput(strval($_POST['comname'])):null;
$comadd  = (!empty($_POST['comadd']))?FilterInput(strval($_POST['comadd'])):null;
$message  = (!empty($_POST['message']))?FilterInput(strval($_POST['message'])):null;



if (empty($name) OR empty($phone) OR empty($emailid) OR empty($comname)) {
    echo $response = json_encode(array(
            "status" => false,
            "msg"    => "<div class='alert alert-danger'><strong>Enter the Details!</strong></div>" 
    ));
    die();
}
if (!ctype_digit($phone) OR strlen($phone)!=10) {
    echo $response = json_encode(array(
            "status" => false,
            "msg"    => "<div class='alert alert-danger'><strong>Enter 10 Digit Mobile Number!</strong></div>" 
    ));
    die();
}
if(!preg_match('/^[6-9][0-9]{9}$/',$phone)) {
    echo $response = json_encode(array(
            "status" => false,
            "msg"    => "<div class='alert alert-danger'><strong>Phone Number is Not Valid!</strong></div>" 
    ));
    die();
}
if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
    echo $response = json_encode(array(
            "status" => false,
            "msg"    => "<div class='alert alert-danger'><strong>Email ID is Not in Valid form!</strong></div>" 
    ));
    die();
} 

$time= Date('Y-m-d H:i:s');

$FileName = null;
if(!empty($_FILES['comimg']['name'])){

$valid_ext   = array('jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx');
$mime_filter = array('image/jpeg', 'image/jpg', 'image/png', 'application/pdf', 'application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document');
$maxsize     = 10 * 1024 * 1024;

$FileName    = FilterInput($_FILES['comimg']['name']);
$tmpName     = $_FILES['comimg']['tmp_name'];
$FileTyp     = $_FILES['comimg']['type'];
$FileSize    = $_FILES['comimg']['size'];
$MimeType    = mime_content_type($_FILES['comimg']['tmp_name']);

$ext      = strtolower(pathinfo($FileName, PATHINFO_EXTENSION));
$FileName = FileName($name).'_'.time().rand(10000,999999999).'.'.$ext;

if(!in_array($ext, $valid_ext)) {
  echo $response = json_encode(array(
        "status" => false,
        "msg"    => '<div class="alert alert-danger">File Extension is Not Allowed!</div>'
    ));
}
if($FileSize>$maxsize){
  echo $response = json_encode(array(
        "status" => false,
        "msg"    => '<div class="alert alert-danger">Max File Size Must Be 10MB!</div>'
    ));
}
if(!in_array($FileTyp, $mime_filter)) {
  echo $response = json_encode(array(
        "status" => false,
        "msg"    => '<div class="alert alert-danger">File Format Not Supported!</div>'
    ));
}
if(!in_array($MimeType, $mime_filter)) {
 echo $response = json_encode(array(
        "status" => false,
        "msg"    => '<div class="alert alert-danger">File Format Not Supported!</div>'
    ));
}

$path = "assets/quote_doc/".$FileName;
if (!move_uploaded_file($_FILES["comimg"]["tmp_name"],$path)) {
  echo $response = json_encode(array(
        "status" => false,
        "msg"    => '<div class="alert alert-danger">Cant Upload File!</div>'
    ));
}
chmod($path,0644);
}

$time= Date('Y-m-d H:i:s');

$sql = "INSERT INTO quick_quote SET
            quote_name           = :quote_name,
            quote_email          = :quote_email,
            quote_phone          = :quote_phone,
            quote_company_name   = :quote_company_name,
            quote_company_address = :quote_company_address,
            quote_doc            = :quote_doc,
            quote_req            = :quote_req,
            quote_date           = :quote_date,
            quote_ip             = :quote_ip";
            $insert = $PDO->prepare($sql);
            $insert->bindParam(':quote_name',$name);
            $insert->bindParam(':quote_email',$emailid);
            $insert->bindParam(':quote_phone',$phone);
            $insert->bindParam(':quote_company_name',$comname);
            $insert->bindParam(':quote_company_address',$comadd);
            $insert->bindParam(':quote_doc',$FileName);
            $insert->bindParam(':quote_req',$message);
            $insert->bindParam(':quote_date',$time);
            $insert->bindParam(':quote_ip',$ip);
            $insert->execute();
            if($insert->rowCount() > 0){
                echo $response = json_encode(array(
                    "status" => true,
                    "msg"    => "<div class='alert alert-success'><strong>Thank You! Will Contact You Soon!</strong></div>" 
            ));
            }
            else {
                echo $response = json_encode(array(
                    "status" => false,
                    "msg"    => "<div class='alert alert-danger'><strong>Something is wrong</strong></div>" 
            ));
            }