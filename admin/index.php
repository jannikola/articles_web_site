<?php
	session_start();
	if(!isset($_SESSION['status'])||$_SESSION['status']!=3){
		header("location: index.html");
	}
?>
<a href="categories.php">Kategorije</a> &nbsp 
<a href="news.php">Vijesti</a> &nbsp 
<a href="logout.php">Logout</a>
<br>
<br>
<a href="../index.php">Povratak na sajt</a>