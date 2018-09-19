<?php

	session_start();
	if(!isset($_SESSION['status'])||$_SESSION['status']!=3){
		header("location: index.html");
	}
	
	require "../config.php";
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	$selected_id = -1;
	$selected_name = "";
	$selected_description = "";

	if(isset($_GET['cid'])&&$_GET['cid']!=1){
		$q = mysqli_query($conn,"select * from kategorija where id={$_GET['cid']}");
		$rw = mysqli_fetch_object($q);
		if($rw){
			$selected_id = $rw->id;
			$selected_name = $rw->naziv;
			$selected_description = $rw->opis;
		}
	}

	if(isset($_POST['btn_insert'])){
		$selected_name = $_POST['tb_name'];
		$selected_description = $_POST['tb_description'];
		mysqli_query($conn,"insert into kategorija values (null,'{$selected_name}','{$selected_description}')");
		$selected_id = mysqli_insert_id($conn);
	}

	if(isset($_POST['btn_update'])){
		$selected_name = $_POST['tb_name'];
		$selected_description = $_POST['tb_description'];
		$selected_id = $_POST['selCategory'];
		mysqli_query($conn,"update kategorija set naziv='{$selected_name}',opis='{$selected_description}' where id={$selected_id} ");
	}


	if(isset($_POST['btn_delete'])){
		//$selected_id = $_POST['cid'];
		$selected_name = $_POST['tb_name'];
		mysqli_query($conn,"delete from kategorija where naziv='{$selected_name}' ");
	}

?>

<form method="post" action="">
	<?php
		$q = mysqli_query($conn,"select * from kategorija");
	?>
	<select onchange="window.location='?cid='+this.value" name="selCategory">
		<option value="-1">Izaberi kategoriju</option>
		<?php
		while ($rw=mysqli_fetch_object($q)){
			if($rw->id == 1){
				echo "<option value='$rw->id'>--</option>";
			}else{
				echo "<option ".($selected_id==$rw->id?"selected":"")." value='{$rw->id}'>{$rw->naziv}</option>";
			}
		}
		?>
	</select>
	<br>
	Naslov:<br>
	<input type="text" name="tb_name" value="<?php echo $selected_name; ?>"><br>
	Tekst:<br>
	 <input type="textbox" name="tb_description" value="<?php echo $selected_description; ?>">
	 <br><br>
	 <input type="submit" name="btn_insert" value="Dodaj">
	 <input type="submit" name="btn_update" value="Azuriraj">
	 <input type="submit" name="btn_delete" value="Izbrisi">
</form>

<br>

<a href="index.php">povratak</a>