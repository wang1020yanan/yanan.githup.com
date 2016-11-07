<?php
require_once('crop.php');

//$src = 'http://localhost/beself/public/user/upload/2014/06/07/14021146715797.jpg';
$username = $_GET['username'];
$src = $_GET['src'];
$src = substr($src,34);
$rs = explode(".",$src);
$ext = strtolower($rs[count($rs)-1]);
$type = array('jpg', 'jpeg', 'png');
$path = sprintf('%s/%s/%s/', date('Y'), date('m'), date('d'));

$fileName = time() . rand(1000, 9999) . '.' . $ext;
$fullName = $path . $fileName;	
$path = rtrim('upload', DIRECTORY_SEPARATOR) . '/' . $fullName;

$crop = new App_Util_Crop();
$crop->initialize($src, $path, $_GET['x'], $_GET['y'], 200, 200, $_GET['w'], $_GET['h']);
$success = $crop->generate_shot();
//print_r($success);
$msg = $success ? '裁剪成功' : '裁剪失败';

$xxx = "http://www.25to75.com/public/user/".$path;
$con = mysql_connect("localhost","root","403a2e9e76");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("beself", $con);
//$abc = mysql_query("SELECT * FROM gy_users WHERE username = $username");
//while($row = mysql_fetch_array($abc))
//{
//    echo $row['username'] . " " . $row['password'];
//    echo "<br />";
//}
mysql_query("UPDATE gy_users SET avatar = '".$fullName."' WHERE username = '".$username."'");

echo json_encode(array('result' => $success, 'msg' => $msg, 'xxx'=>$xxx));
//print_r($success);