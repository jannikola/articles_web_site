<?php
require "config.php";
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Sportske vijesti</title>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<a href="admin/index.html" style="color:white;">Administrator</a>
<div id= "wrapper">
		<header id= "header">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
		<a href= "index.html">
		
		</a>
		<div id="users">
			
			<br>
			

			<a href="logout.php">Logout</a>

			<br>
			
			
			
		</div>

		</header>

		<nav id= "nav">
		<ul>
			<?php
			$q = mysqli_query($conn,"select * from kategorija");
			while ($rw=mysqli_fetch_object($q)){
			?>
			<li><a href="index.php?cid=<?php echo $rw->id; ?>"><?php echo $rw->naziv; ?></a></li>
			<?php
			}
			?>
		</ul>
		</nav>
		

		<div id= "main">
			<?php
			$default_page = (isset($_GET['page']))?$_GET['page']:1;

			$pages = array(
				"1"=>"news.php",
				"2"=>"register.php"
			);

			if(isset($pages[$default_page])){
				include "modules/".$pages[$default_page];
			}else{
				include "modules/".$pages['1'];
			}

			

			?>
		</div>

		
	
</div>

</body>
</html>
