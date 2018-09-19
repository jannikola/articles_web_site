<form action="" method="post">
	Username: <input type="text" name="tbUsername"> <br>
	Password: <input type="text" name="tbPassword"> <br>
	<input type="submit" name="btnRegister" value="Registruj se">
</form> 

<?php
//require("../config.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\php_primjer_web_sajta\moj_sajt\config.php');



if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
	die("Polja ne smiju biti prazna");
} 

$username = $_POST['tbUsername'];
$password = $_POST['tbPassword'];


$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);


$q = mysqli_query($conn,"insert into users (id, username, password,status) values(null,'{$username}','{$password}',1)"); 
