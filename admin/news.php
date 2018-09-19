<?php

	session_start();
	if(!isset($_SESSION['status'])||$_SESSION['status']!=3){
		header("location: index.html");
	}

require "../config.php";
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$selected_id = -1;
$selected_title = "";
$selected_image = "";
$selected_text = "";
$selected_category = 0;

	if(isset($_GET['mid'])){
		$q = mysqli_query($conn,"select * from vijest where id={$_GET['mid']}");
		$rw = mysqli_fetch_object($q);
		if($rw){
			$selected_id = $rw->id;
			$selected_title = $rw->naziv;
			$selected_image = $rw->slika;
			$selected_text = $rw->tekst;
			$selected_category = $rw->kategorija;
		}
	}

	if(isset($_POST['btn_insert'])){
			$selected_title = $_POST['tb_title'];

			if(isset($_FILES['fup_image'])){
				move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
				$selected_image = $_FILES['fup_image']['name'];
			}
			$selected_text = $_POST['tb_text'];
			$selected_category = $_POST['sel_category'];
		mysqli_query($conn,"insert into vijest values (null,'{$selected_title}','{$selected_image}','{$selected_text}','{$selected_category}')");
		$selected_id = mysqli_insert_id($conn);
	}

	if(isset($_POST['btn_delete'])){
		//$selected_id = $_POST['cid'];
		$selected_title = $_POST['tb_title'];
		mysqli_query($conn,"delete from vijest where naziv='{$selected_title}' ");
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<select onchange="window.location='?mid='+this.value" name="selNews">
		<option value="-1">Izaberi vijest</option>
		<?php
		$q = mysqli_query($conn,"select * from vijest");
		?>
		<?php
		while ($rw=mysqli_fetch_object($q)){
			
				echo "<option ".($selected_id==$rw->id?"selected":"")." value='{$rw->id}'>{$rw->naziv}</option>";
			
		}
		?>
	</select>
	<br><br>
	Naslov:<br>
	<input type="text" name="tb_title" value="<?php echo $selected_title; ?>">
	<br>
	<br>
	Tekst:<br>
	<input type="text" name="tb_text" value="<?php echo $selected_text; ?>">
	<br>
	<br>
	Kategorija:<br>
	<?php
		$q = mysqli_query($conn,"select * from kategorija");
	?>
	<select name="sel_category">
		<option value="-1">Izaberi kategoriju</option>
		<?php
		while ($rw=mysqli_fetch_object($q)){
			if($rw->id == 1){
				echo "<option value='$rw->id'>--</option>";
			}else{
				echo "<option ".($selected_category==$rw->id?"selected":"")." value='{$rw->id}'>{$rw->naziv}</option>";
			}
		}
		?>
	</select>
	<br>
	<img src="../images/<?php echo $selected_image; ?>" width="300" height="100">
	<input type="file" name="fup_image">
	<br><br>
	<input type="submit" name="btn_insert" value="Dodaj">
	<input type="submit" name="btn_update" value="Azuriraj">
	<input type="submit" name="btn_delete" value="Izbrisi">
</form>

<br>

<a href="index.php">povratak</a>