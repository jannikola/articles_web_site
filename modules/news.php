<?php
//$conn = mysqli_connect("localhost","root","","vijesti");
$category = isset($_GET['cid'])&&is_numeric($_GET['cid'])?$_GET['cid']:1;
if($category==1){
	$q = mysqli_query($conn,"select * from vijest");
}else{
	$q = mysqli_query($conn,"select * from vijest where kategorija=$category");
}

while($rw=mysqli_fetch_object($q)){

?>

<div class ="<?php $i=0; echo (($i+1)%2==0)?"rightbox":"leftbox"; ?>" >
	<h3><?php echo $rw->naziv; ?></h3>
	<img src="images/<?php echo $rw->slika; ?>" width="300" height="100">
	<p><?php echo $rw->tekst; ?></p>
</div>



<?php
}
?>

<footer id= "footer">
		
</footer>