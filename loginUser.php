<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\php_primjer_web_sajta\moj_sajt\config.php');

if(!isset($_POST['tb_username'])||!isset($_POST['tb_pass'])){
	echo "invalid parameters";
}

$username = $_POST['tb_username'];
$password = $_POST['tb_pass'];
$username = str_replace("'","",$username);
$username = str_replace("-","",$username);
$password = str_replace("'","",$password);
$password = str_replace("-","",$password);

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$q = "select * from users where username='{$username}' and password='{$password}' limit 1 ";
$res = mysqli_query($conn,$q);

$user = mysqli_fetch_object($res);
if($user){
	session_start();
	$_SESSION['status'] = $user->status;
	header("location: loggedUser.php");
}else{
	echo "invalid user";
}
?>